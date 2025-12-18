<?php

namespace Database\Seeders;

use App\Models\Salary;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class SalarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $users = User::all();

        if ($users->isEmpty()) {
            return;
        }

        $jobs = [
            'Software Engineer Intern',
            'Backend Developer Intern',
            'Frontend Developer Intern',
            'UI/UX Designer Intern',
            'Data Analyst Intern',
            'Mobile Developer Intern',
            'DevOps Intern',
        ];

        $companies = [
            'Apple Developer Academy',
            'Tokopedia',
            'Gojek',
            'Shopee',
            'Traveloka',
            'Bukalapak',
            'Telkom Indonesia',
            'BCA',
        ];

        $locations = [
            'Jakarta',
            'Bandung',
            'Tangerang',
            'Surabaya',
            'Yogyakarta',
        ];

        $types = ['On-Site', 'Hybrid', 'Remote'];

        foreach (range(1, 25) as $i) {
            $baseSalary = rand(2500000, 6000000);
            $min = $baseSalary - rand(300000, 800000);
            $max = $baseSalary + rand(300000, 1000000);

            Salary::create([
                'user_id' => $users->random()->id,
                'job_title' => $jobs[array_rand($jobs)],
                'company_name' => $companies[array_rand($companies)],
                'location' => $locations[array_rand($locations)],
                'type' => $types[array_rand($types)],
                'salary' => $baseSalary,
                'min_salary' => $min,
                'max_salary' => $max,
                'average_salary' => intval(($min + $max) / 2),
                'is_anonymous' => rand(0, 1),
                'created_at' => Carbon::now()->subDays(rand(1, 60)),
                'updated_at' => now(),
            ]);
        }
    }
}
