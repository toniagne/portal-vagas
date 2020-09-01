<?php

use Illuminate\Database\Seeder;
use App\Models\JobCategory;

class JobCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jobCategories = [
            [
                'name' => 'Software Development',
                'description' => 'Software Engineer, Web / Mobile & More',
                'icon' => 'icon-line-awesome-file-code-o',
                'active' => true,
            ],
            [
                'name' => 'Data Science & Analitycs',
                'description' => 'Data Specialist / Scientist, Data Analyst & More',
                'icon' => 'icon-line-awesome-cloud-upload',
                'active' => true,
            ],
            [
                'name' => 'Accounting & Consulting',
                'description' => 'Auditor, Accountant, Fnancial Analyst & More',
                'icon' => 'icon-line-awesome-suitcase',
                'active' => true,
            ],
            [
                'name' => 'Test Analyst',
                'description' => 'Selenium / JUnit',
                'icon' => 'icon-line-awesome-pencil',
                'active' => true,
            ]
        ];

        JobCategory::insert($jobCategories);
    }
}
