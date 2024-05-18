<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'job' => $this->faker->jobTitle,
            'company' => $this->faker->company,
            'country' => $this->faker->country,
            'address' => $this->faker->address,
            'birthdate' => $this->faker->date(),
            'zip' => substr($this->faker->postcode , 0 , 5),
            'city' => $this->faker->city,
            'division' => $this->faker->state,
            'user_id' => 2,
            'note' => $this->faker->paragraph,
        ];
    }
}
