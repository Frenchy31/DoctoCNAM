<?php

namespace Database\Factories;

use App\Models\Adresses;
use App\Models\Meeting;
use App\Models\User;
use DateTime;
use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;

class MeetingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Meeting::class;

    /**
     * Define the model's default state.
     * @return array
     * @throws Exception
     */
    public function definition()
    {
        return [
            'address_id' => rand(Adresses::first()->id,AdressesFactory::$nbRowsToCreate),
            'datetime' => $this->generateValidDate(),
            'symptome' => $this->faker->text(300)
        ];
    }

    public function configure()
    {
        return $this->afterMaking(function (Meeting $meeting){
            // ...
        })->afterCreating(function (Meeting $meeting){
            $meeting->users()->attach($this->getAvailableDoctorId($meeting->datetime));
            $meeting->users()->attach($this->getAvailablePatientId($meeting->datetime));
            $meeting->save();
        });
    }

    /**
     * Génère une date aléatoire entre aujourd'hui et 6 mois plus tard
     * avec un horaire arrondi à l'heure compris entre 8 et 19 h
     * @return false|string La date générée au format Y-m-d H:00:00
     * @throws Exception
     */
    private function generateValidDate()
    {
        $randomDateTime = $this->faker->dateTimeBetween('now', '+6 months');
        while (intval($randomDateTime->format('H')) < 8 || intval($randomDateTime->format('H')) > 18){
            $randomDateTime = $this->faker->dateTimeBetween('now', '+6 months');
        }
        $randomDateTime = $randomDateTime->format('Y-m-d H:00:00');
        return new DateTime($randomDateTime);
    }

    /**
     * Retourne l'identifiant d'un patient disponible à la date en paramètre
     * @param string $datetime
     */
    private function getAvailablePatientId(DateTime $datetime)
    {
        $patient= User::where('role_id', 9)->get()->random();
        while (!$patient->available($datetime)) {
            $patient = User::where('role_id', 9)->get()->random();
        }
        return $patient->id;
    }

    /**
     * Retourne l'identifiant d'un docteur disponible à la date en paramètre
     * @param string $datetime
     */
    private function getAvailableDoctorId(DateTime $datetime)
    {
        $doctor = User::where('role_id', rand(10,16))->get()->random();
        while (!$doctor->available($datetime)) {
            $doctor = User::where('role_id', rand(10,16))->get()->random();
        }
        return $doctor->id;
    }
}
