<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'Adrian',
            'username' => 'adrian',
            'type_document' => 'type_document_here',
            'document_id' => 123456789,
            'email' => 'adrianmarrero18@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password

            'telephone' => 1526312,
            'website' => 'website',
            'instagram' => 'instagram',
            'facebook' => 'facebook',
            'twitter' => 'twitter',
            'snapchat' => 'snapchat',
            'tiktok' => 'tiktok',

            'address' => 'address',
            'second_address' => 'second_address',
            'zip_code' => 123456,
            'country' => 'country',
            'state' => 'state',

            'is_admin' => 1,
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
