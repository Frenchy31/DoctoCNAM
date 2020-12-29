<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property integer $id
 * @property integer $address_id
 * @property string $datetime
 * @property string $created_at
 * @property string $updated_at
 * @property Adresses $adresse
 */
class Meeting extends Model
{
    use HasFactory;
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['address_id', 'datetime', 'symptome', 'created_at', 'updated_at'];

    /**
     * @return BelongsTo
     */
    public function adresse()
    {
        return $this->belongsTo(Adresses::class,'address_id');
    }

    /**
     * Users related
     * @return BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany( User::class, 'pivot_users_meetings', 'meeting_id', 'user_id');
    }
}
