<?php

namespace App\Models;

use DateTime;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\VerifyEmail;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    public const WORKING_HOURS = array(8,9,10,11,12,13,14,15,16,17,18);

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function role()
    {
        return $this->hasOne(Role::class, 'id', 'role_id');
    }

    /**
     * Meetings related
     */
    public function meetings()
    {
        return $this->belongsToMany(Meeting::class,'pivot_users_meetings', 'user_id', 'meeting_id');
    }

    public function adresse()
    {
        return $this->belongsTo(Adresses::class, 'address_id');
    }

    /**
     * Vérifie si l'utilisateur est disponible
     * @param DateTime $dateTime Horaire à vérifier
     * @return bool true | false Disponible | Occupé
     */
    public function available(DateTime $dateTime)
    {
        if ( $this->meetings()->count() !== 0) {
            foreach ($this->meetings as $meeting) {
                if ($dateTime !== $meeting->dateTime)
                    return true;
            }
        } else return true;
        return false;
    }

    /**
     * Récupère la liste des horaires disponibles dans la journée
     * @param DateTime $dateTime Date à vérifier
     * @return array Heures disponibles dans la journée en paramètres
     */
    public function getFreeHours(DateTime $dateTime)
    {
        $freeHours = self::WORKING_HOURS;
        if ( $this->meetings()->count() !== 0) {
            $meetings = $this->meetings()->where('datetime','LIKE',$dateTime->format('Y-m-d').'%')->get();
            foreach ($meetings as $meeting) {
                $meetingHour = (new DateTime($meeting->datetime))->format('H');
                $freeHours = array_diff($freeHours, array(intval($meetingHour)));
            }
        }
        return $freeHours;
    }
}
