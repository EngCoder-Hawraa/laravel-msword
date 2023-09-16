<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
//    public function definition(): array
//    {
//        return [
//            'depNameEn' => fake()->depNameEn(),
//            'depName' => fake()->depName(),
//            'toPerson' => fake()->toPerson(),
//            'variableName' => fake()->variableName(),
//            'content' => fake()->content(),
//            'thanks' => fake()->thanks(),
//            'attach' => fake()->attach(),
//            'signatory' => fake()->signatory(),
//            'position' => fake()->position(),
//            'signDate' => fake()->signDate(),
//        ];
//    }

    public function definition(): array
    {
        $faker = \Faker\Factory::create();

        return [
            'creator'      => $faker->word, // Example: Generate a random word for 'creator'
            'depNameEn'    => $faker->word, // Example: Generate a random word for 'depNameEn'
            'depName'      => $faker->word, // Example: Generate a random word for 'depName'
            'toPerson'     => $faker->name, // Example: Generate a random name for 'toPerson'
            'variableName' => $faker->word, // Example: Generate a random word for 'variableName'
            'signDate'     => $faker->dateTime, // Example: Generate a random date and time for 'signDate'
            'content'      => $faker->paragraph, // Example: Generate a random paragraph for 'content'
            'thanks'       => $faker->word, // Example: Generate a random word for 'thanks'
            'greeting'     => $faker->word, // Example: Generate a random word for 'greeting'
            'toDo'         => $faker->word, // Example: Generate a random word for 'toDo'
            'attach'       => $faker->word, // Example: Generate a random word for 'attach'
            'signatory'    => $faker->word, // Example: Generate a random word for 'signatory'
            'image'        => $faker->word, // Example: Generate a random name for 'image'
            'position'     => $faker->text, // Example: Generate random text for 'position'
        ];
    }

}



//use App\Models\Book;
//use Illuminate\Database\Eloquent\Factories\Factory;
//Factory::factoryForModel(Book::class)->count(50)->create();
