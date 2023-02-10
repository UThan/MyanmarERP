<?php

namespace Database\Seeders;

use App\Models\Audience;
use App\Models\Book;
use App\Models\BookStatus;
use App\Models\Category;
use App\Models\Feedback;
use App\Models\InstitutionType;
use App\Models\MemberStatus;
use App\Models\Institution;
use App\Models\Region;
use App\Models\RentStatus;
use App\Models\MainCharacter;
use App\Models\User;
use App\Models\Series;
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
        $region = Region::factory()->count(5)->state(new Sequence(
            ['name' => 'Yangon'],
            ['name' => 'Mandalay'],
            ['name' => 'Bago'],
            ['name' => 'Pathein'],
            ['name' => 'Mawlamyaine'],
        ))->create();
        $audience = Audience::factory()->count(5)->state(new Sequence(
            ['name' => 'Adult'],
            ['name' => 'Youth'],
            ['name' => 'Beginner'],
            ['name' => 'Intermediate'],
            ['name' => 'Advance'],
        ))->create();
        $maincharacter = MainCharacter::factory()->count(6)->state(new Sequence(
            ['name' => 'Adult Male'],
            ['name' => 'Young Male'],
            ['name' => 'Adult Female'],
            ['name' => 'Young Female'],
            ['name' => 'Adult Male & Female'],
            ['name' => 'Young Male & Female'],
        ))->create();
        $booklocation = Institution::factory()->count(6)->state(new Sequence(
            ['name' => 'Yangon University'],
            ['name' => 'Mandalay University'],
            ['name' => 'West Yangon University'],
            ['name' => 'East Yangon University'],
            ['name' => 'Insein Technical Collage'],
            ['name' => 'Maubin University'],
        ))->create();
       
        $series = Series::factory()->count(39)->state(new Sequence(
            ['name' => 'CERS'	,'description' => 'Collins English Readers Starter Level'],
            ['name' => 'CER1'	,'description' => 'Collins English Readers Level 1'],
            ['name' => 'CER2'	,'description' => 'Collins English Readers Level 2'],
            ['name' => 'CER3'	,'description' => 'Collins English Readers Level 3'],
            ['name' => 'CER4'	,'description' => 'Collins English Readers Level 4'],
            ['name' => 'CER5'	,'description' => 'Collins English Readers Level 5'],
            ['name' => 'CER6'	,'description' => 'Collins English Readers Level 6'],
            ['name' => 'LF'     ,'description' => ' Longman  Fiction'],
            ['name' => 'LSR1'	,'description' => 'Longman Structural Readers Level 1'],
            ['name' => 'LSR2'	,'description' => 'Longman Structural Readers Level 2'],
            ['name' => 'LSR3'	,'description' => 'Longman Structural Readers Level 3'],
            ['name' => 'LSR4'	,'description' => 'Longman Structural Readers Level 4'],
            ['name' => 'MRB'    ,'description' => 'Macmillan Readers Beginner Level'],
            ['name' => 'MRS'    ,'description' => 'Macmillan Readers Starter Level'],
            ['name' => 'MR1'    ,'description' => 'Macmillan Readers Level 1'],
            ['name' => 'MR2'    ,'description' => 'Macmillan Readers Level 2'],
            ['name' => 'MR3'    ,'description' => 'Macmillan Readers Level 3'],
            ['name' => 'MR5'    ,'description' => 'Macmillan Readers Level 5'],
            ['name' => 'MR6'    ,'description' => 'Macmillan Readers Level 6'],
            ['name' => 'NSR'    ,'description' => 'Nelson Streamline Readers'],
            ['name' => 'NR1'    ,'description' => 'Nelson Readers Level 1'],
            ['name' => 'NR2'    ,'description' => 'Nelson Readers Level 2'],
            ['name' => 'NR4'    ,'description' => 'Nelson Readers Level 4'],
            ['name' => 'NR6'    ,'description' => 'Nelson Readers Level 6'],
            ['name' => 'OBWS'	,'description' => 'Oxford Bookworms Starter Level'],
            ['name' => 'OBW1'	,'description' => 'Oxford Bookworms Level 1'],
            ['name' => 'OBW2'	,'description' => 'Oxford Bookworms Level 2'],
            ['name' => 'OBW3'	,'description' => 'Oxford Bookworms Level 3'],
            ['name' => 'OBW4'	,'description' => 'Oxford Bookworms Level 4'],
            ['name' => 'OBW5'	,'description' => 'Oxford Bookworms Level 5'],
            ['name' => 'OBW6'	,'description' => 'Oxford Bookworms Level 6'],
            ['name' => 'OSL1'	,'description' => 'Oxford Storyline Level 1'],
            ['name' => 'PRE'    ,'description' => 'Penguin Readers Easystarts'],
            ['name' => 'PR1'	,'description' => 'Penguin Readers Level 1'],
            ['name' => 'PR2'	,'description' => 'Penguin Readers Level 2'],
            ['name' => 'PR3'	,'description' => 'Penguin Readers Level 3'],
            ['name' => 'PR4'	,'description' => 'Penguin Readers Level 4'],
            ['name' => 'PR5'	,'description' => 'Penguin Readers Level 5'],
            ['name' => 'PR6'    ,'description' => 'Penguin Readers Level 6'],
        ))->create();
        
    }

        // $level = Level::factory()->create();
        // $series = Series::factory()->create();
        // Book::factory()->count(10)->has(Author::factory()->count(2))->for(Category::all()->random())->for($level)->for($setting)->for($series)->create();
    }

