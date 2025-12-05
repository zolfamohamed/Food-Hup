<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Meal;

class MealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void
    {
        Meal::create([
            'name' => 'Margherita Pizza',
            'description' => 'Classic pizza with tomato sauce, mozzarella & basil.',
            'price' => 120.50,
            'image' => 'pizza.jpg'
        ]);

        Meal::create([
            'name' => 'Cheeseburger',
            'description' => 'Juicy beef burger with cheddar cheese, lettuce & pickles.',
            'price' => 85.00,
            'image' => 'burger.jpg'
        ]);

        Meal::create([
            'name' => 'Chicken Alfredo Pasta',
            'description' => 'Creamy Alfredo pasta topped with grilled chicken.',
            'price' => 140.00,
            'image' => 'pasta.jpg'
        ]);

        Meal::create([
            'name' => 'Grilled Chicken',
            'description' => 'Grilled chicken breast served with veggies.',
            'price' => 150.00,
            'image' => 'grilled_chicken.jpg'
        ]);

        Meal::create([
            'name' => 'French Fries',
            'description' => 'Crispy seasoned potato fries.',
            'price' => 35.00,
            'image' => 'fries.jpg'
        ]);

        Meal::create([
            'name' => 'Tacos',
            'description' => 'Mexican tacos with beef & fresh vegetables.',
            'price' => 90.00,
            'image' => 'tacos.jpg'
        ]);

        Meal::create([
            'name' => 'Chocolate Cake',
            'description' => 'Rich chocolate layered cake served with cream.',
            'price' => 65.00,
            'image' => 'cake.jpg'
        ]);

        Meal::create([
            'name' => 'Fresh Orange Juice',
            'description' => 'Natural orange juice with no additives.',
            'price' => 30.00,
            'image' => 'orange_juice.jpg'
        ]);
    }
}
