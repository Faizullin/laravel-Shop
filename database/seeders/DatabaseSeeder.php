<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(3)->create();
        if(!\App\Models\User::where('name','admin')->exists()){
            \App\Models\User::factory()->create([
                'name' => 'admin',
                'email' => 'admin@example.com',
                'role'=>2,
                'password'=>Hash::make('12344321'),
            ]);
        }
        \App\Models\Tag::factory(8)->create();
        \App\Models\Category::factory(5)->create();
        \App\Models\Color::factory(5)->create();
        \App\Models\Product::factory(12)->create();
        \App\Models\ProductTag::factory(10)->create();
        \App\Models\ColorProduct::factory(10)->create();
        ////\App\Models\ColorProduct::factory(10)->create();
    }
}
