<?php

namespace Database\Seeders;

use App\Models\GrantCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GrantCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'uuid' => str()->uuid(),
                'name' => 'Program Funding',
                'slug' => 'program-funding',
                'description' => 'Support for developing or expanding educational, cultural, or social programs.',
                'status' => 'Active'
            ],
            [
                'uuid' => str()->uuid(),
                'name' => 'Equipment Funding',
                'slug' => 'equipment-funding',
                'description' => 'Support for purchasing necessary equipment or technology.',
                'status' => 'Active'
            ],
            [
                'uuid' => str()->uuid(),
                'name' => 'Research Funding',
                'slug' => 'research-funding',
                'description' => 'Support for conducting research or studies in your field.',
                'status' => 'Active'
            ],
            [
                'uuid' => str()->uuid(),
                'name' => 'Training Funding',
                'slug' => 'training-funding',
                'description' => 'Support for providing training programs or workshops.',
                'status' => 'Active'
            ],
            [
                'uuid' => str()->uuid(),
                'name' => 'Community Outreach',
                'slug' => 'Support for activities that benefit local communities or undeserved populations.',
                'description' => 'Support for any other type of funding.',
                'status' => 'Active'
            ]
        ];

        foreach ($data as $value) {
            GrantCategory::create($value);
        }
    }
}
