<?php

namespace Database\Seeders;

use App\Models\CommunityPost;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class CommunityPostSeeder extends Seeder
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

        $titles = [
            'Internship Experience at Tech Company',
            'Tips Lolos Interview Internship',
            'Apakah Internship Remote Worth It?',
            'Pengalaman Magang di Startup',
            'Cara Balance Kuliah dan Magang',
            'Gaji Intern di Jakarta',
            'Internship IT vs Non-IT',
            'Magang di Corporate vs Startup',
        ];

        $contents = [
            'Just finished my 3-month internship at a tech startup. The experience was amazing! Great mentorship, real projects, and wonderful team culture. Highly recommend this company for aspiring developers!',
            'I recently had a phone screening for a job. At the end of the screening, I was asked if I prayed. I asked why? The interviewer said it\'s a smaller company and the owners believe in prayer before company meetings...',
            'This is the best internship I have ever had! The team was supportive, and I got to work on exciting projects that made a real impact. Plus, the office snacks were top-notch!',
            'I found difficulties balancing my coursework with my internship responsibilities. Too many workloads made it hard to keep up with both. Any tips from fellow interns on managing time effectively?',
            'Keep updating your skills and learning new technologies. The tech industry is always evolving, and staying current will make you a valuable asset to any team.',
            'Salary range for intern positions in Jakarta typically falls between IDR 1,500,000 to IDR 4,000,000 per month, depending on the company and your skill set.',
        ];

        foreach (range(1, 3) as $i) {
            CommunityPost::create([
                'user_id' => $users->random()->id,
                'title' => $titles[array_rand($titles)],
                'content' => $contents[array_rand($contents)],
                'created_at' => Carbon::now()->subDays(rand(1, 45)),
                'updated_at' => now(),
            ]);
        }
    }
}
