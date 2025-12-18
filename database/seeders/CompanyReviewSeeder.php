<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\CompanyReview;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanyReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Pastikan ada user
        if (User::count() < 3) {
            User::factory()->count(5)->create();
        }

        $users = User::all();

        $positions = [
            'Software Engineer Intern',
            'Backend Developer Intern',
            'Frontend Developer Intern',
            'UI/UX Designer Intern',
            'Data Analyst Intern',
        ];

        $durations = ['3 months', '6 months', '1 year'];

        $reviewTexts = [
            'Great learning environment with supportive mentors and challenging projects that helped me grow my skills significantly.',
            'Challenging tasks but very rewarding experience that prepared me well for my future career in tech.',
            'Good company culture and friendly team members made my internship enjoyable and productive.',
            'Learned many real-world skills during the internship that textbooks couldn\'t teach. Highly recommend!',
            'Highly recommended for students looking for experience in the tech industry. The projects were meaningful and impactful.',
        ];

        foreach (Company::all() as $company) {
            $reviewCount = rand(5, 15);

            $totalRating = 0;

            for ($i = 0; $i < $reviewCount; $i++) {
                $rating = rand(3, 5);
                $totalRating += $rating;

                CompanyReview::create([
                    'company_id' => $company->id,
                    'user_id' => $users->random()->id,
                    'rating' => $rating,
                    'position' => $positions[array_rand($positions)],
                    'duration' => $durations[array_rand($durations)],
                    'content' => $reviewTexts[array_rand($reviewTexts)],
                    'is_anonymous' => rand(0, 1),
                ]);
            }

            // Update company aggregate rating
            $company->update([
                'average_rating' => round($totalRating / $reviewCount, 1),
                'reviews_count' => $reviewCount,
            ]);
        }
    }
}
