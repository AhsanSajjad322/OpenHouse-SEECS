<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Location;
use App\Models\Project;
use App\Models\Evaluator;
use App\Models\Evaluation;
use App\Models\Student;
use App\Models\Admin;

class SeederDB extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['name' => 'AppDev']);
        Category::create(['name' => 'WebDev']);
        Category::create(['name' => 'GameDev']);
        // Add more categories as needed

        Admin::create(['name' => 'Ali A1', 'email' => 'ali@example.com', 'password' => 'ali']);

        Evaluator::create(['name' => 'Ahsan E1', 'email' => 'ahsan@example.com', 'preference' => 'WebDev','password' => 'ahsan']);
        Evaluator::create(['name' => 'Asad E2', 'email' => 'asad@example.com', 'preference' => 'AppDev', 'password' => 'asad']);
        Evaluator::create(['name' => 'Momin E3', 'email' => 'momin@example.com', 'preference' => 'GameDev', 'password' => 'momin']);

        Location::create(['name' => 'A']);
        Location::create(['name' => 'B']);
        Location::create(['name' => 'C']);

        Project::create([
            'name' => 'UniBase Web P1 ',
            'detail' => 'A website for university students to interact with each other',
            'marks' => 100.0,
            'status' => 'Marked',
            'location_id' => 1,
            'category_id' => 2,
        ]);

        Project::create([
            'name' => 'Fitness App P2',
            'detail' => 'Fitness app for daily life use',
            'marks' => 95.5,
            'status' => 'In Progress',
            'location_id' => 2,
            'category_id' => 1,
        ]);


        Student::create(['name' => 'Ahmed S1', 'email' => 'ahmed@example.com', 'password' => 'ahmed', 'project_id' => 1]);

        Student::create(['name' => 'Akram S2', 'email' => 'akram@example.com', 'password' => 'akram', 'project_id' => 2]);

        Evaluation::create(['evaluator_id' => 1, 'project_id' => 1, 'marks' => 9.0]);
        Evaluation::create(['evaluator_id' => 2, 'project_id' => 2, 'marks' => 8]);
    }
}
