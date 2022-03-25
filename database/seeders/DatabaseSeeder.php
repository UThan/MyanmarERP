<?php

namespace Database\Seeders;

use App\Models\Audience;
use App\Models\Book;
use App\Models\BookStatus;
use App\Models\Category;
use App\Models\Feedback;
use App\Models\InstitutionType;
use App\Models\MemberStatus;
use App\Models\Region;
use App\Models\RentStatus;
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
        $memberstatus = MemberStatus::factory()->count(3)->state(new Sequence(
            ['name' => 'Active'],
            ['name' => 'Deactived'],
            ['name' => 'Unverified'],
        ))->create();
        $bookstatus = BookStatus::factory()->count(3)->state(new Sequence(
            ['name' => 'production'],
            ['name' => 'printed'],
            ['name' => 'reserved'],
        ))->create();
        $rentstatus = RentStatus::factory()->count(3)->state(new Sequence(
            ['name' => 'Rented'],
            ['name' => 'Dued'],
            ['name' => 'Returned'],
        ))->create();
        $institutiontype = InstitutionType::factory()->count(3)->state(new Sequence(
            ['name' => 'University'],
            ['name' => 'Collage'],
            ['name' => 'Highschool'],
        ))->create();
        $region = Region::factory()->count(3)->state(new Sequence(
            ['name' => 'Yangon'],
            ['name' => 'Mandalay'],
            ['name' => 'Bago'],
            ['name' => 'Pathein'],
            ['name' => 'Mawlamyaine'],
        ))->create();
        $audience = Audience::factory()->count(3)->state(new Sequence(
            ['name' => 'Adult'],
            ['name' => 'Youth'],
            ['name' => 'Beginner'],
            ['name' => 'Intermediate'],
            ['name' => 'Advance'],
        ))->create();


        // $level = Level::factory()->create();
        // $setting = Setting::factory()->create();
        // $series = Series::factory()->create();
        // Book::factory()->count(10)->has(Author::factory()->count(2))->for(Category::all()->random())->for($level)->for($setting)->for($series)->create();
    }
}
