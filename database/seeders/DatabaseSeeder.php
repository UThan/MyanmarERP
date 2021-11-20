<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use App\Models\Level;
use App\Models\Series;
use App\Models\Setting;
use App\Models\Author;
use App\Models\MemberStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create();
        $category = Category::factory()->count(2)->state(new Sequence(
            ['name' => 'LRS'],
            ['name' => 'CRS']
        ))->create();
        $memberstatus = MemberStatus::factory()->count(3)->state(new Sequence(
            ['name' => 'Active'],
            ['name' => 'Deactived'],
            ['name' => 'Unverified'],
        ))->create();
        // $level = Level::factory()->create();
        // $setting = Setting::factory()->create();
        // $series = Series::factory()->create();
        // Book::factory()->count(10)->has(Author::factory()->count(2))->for(Category::all()->random())->for($level)->for($setting)->for($series)->create();
    }
}
