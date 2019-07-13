<?php

use Illuminate\Database\Seeder;
use App\Post;
use Faker\Generator as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run(Faker $faker)
    {
        // foreach (range(1, 100) as $x) {
        //     DB::table('posts')->insert([
        //         'title' => $faker->sentence(3),
        //         'content' => $faker->sentence(10)
        //     ]);
        // }

        factory(App\Post::class, 50)->create();
    }
}
