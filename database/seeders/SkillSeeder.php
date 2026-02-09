<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Truncate existing skills to start fresh
        // \App\Models\Skill::truncate(); 

        $skills = [
            // Languages
            [
                'name' => 'Python',
                'category' => 'Languages',
                'proficiency' => 90,
                'icon' => 'devicon-python-plain colored',
                'order' => 1,
            ],
            [
                'name' => 'PHP',
                'category' => 'Languages',
                'proficiency' => 85,
                'icon' => 'devicon-php-plain colored',
                'order' => 2,
            ],
            [
                'name' => 'Dart',
                'category' => 'Languages',
                'proficiency' => 80,
                'icon' => 'devicon-dart-plain colored',
                'order' => 3,
            ],
            [
                'name' => 'JavaScript',
                'category' => 'Languages',
                'proficiency' => 85,
                'icon' => 'devicon-javascript-plain colored',
                'order' => 4,
            ],

            // Frameworks & Libraries (combining AI/ML + Web/Mobile for simpler categories if desired, but sticking to detailed categories is safer)
            [
                'name' => 'PyTorch',
                'category' => 'Frameworks & Libraries',
                'proficiency' => 75,
                'icon' => 'devicon-pytorch-original colored',
                'order' => 5,
            ],
            [
                'name' => 'TensorFlow',
                'category' => 'Frameworks & Libraries',
                'proficiency' => 70,
                'icon' => 'devicon-tensorflow-original colored',
                'order' => 6,
            ],
            [
                'name' => 'Scikit-learn',
                'category' => 'Frameworks & Libraries',
                'proficiency' => 75,
                'icon' => 'devicon-scikitlearn-plain colored',
                'order' => 7,
            ],
            [
                'name' => 'Laravel',
                'category' => 'Frameworks & Libraries',
                'proficiency' => 90,
                'icon' => 'devicon-laravel-original colored',
                'order' => 8,
            ],
            [
                'name' => 'Flutter',
                'category' => 'Frameworks & Libraries',
                'proficiency' => 85,
                'icon' => 'devicon-flutter-plain colored',
                'order' => 9,
            ],
            [
                'name' => 'Node.js',
                'category' => 'Frameworks & Libraries',
                'proficiency' => 75,
                'icon' => 'devicon-nodejs-plain-wordmark colored',
                'order' => 10,
            ],

            // Tools & Platforms
            [
                'name' => 'PostgreSQL',
                'category' => 'Tools & Platforms',
                'proficiency' => 80,
                'icon' => 'devicon-postgresql-plain colored',
                'order' => 11,
            ],
            [
                'name' => 'Redis',
                'category' => 'Tools & Platforms',
                'proficiency' => 70,
                'icon' => 'devicon-redis-plain colored',
                'order' => 12,
            ],
            [
                'name' => 'MySQL',
                'category' => 'Tools & Platforms',
                'proficiency' => 85,
                'icon' => 'devicon-mysql-plain colored',
                'order' => 13,
            ],
            [
                'name' => 'Firebase',
                'category' => 'Tools & Platforms',
                'proficiency' => 75,
                'icon' => 'devicon-firebase-plain colored',
                'order' => 14,
            ],
            [
                'name' => 'Arduino',
                'category' => 'Tools & Platforms',
                'proficiency' => 60,
                'icon' => 'devicon-arduino-plain colored',
                'order' => 15,
            ],
            [
                'name' => 'Raspberry Pi',
                'category' => 'Tools & Platforms',
                'proficiency' => 65,
                'icon' => 'devicon-raspberrypi-line colored',
                'order' => 16,
            ],
            [
                'name' => 'Linux',
                'category' => 'Tools & Platforms',
                'proficiency' => 80,
                'icon' => 'devicon-linux-plain colored',
                'order' => 17,
            ],
            [
                'name' => 'Git',
                'category' => 'Tools & Platforms',
                'proficiency' => 90,
                'icon' => 'devicon-git-plain colored',
                'order' => 18,
            ],
            [
                'name' => 'GitHub',
                'category' => 'Tools & Platforms',
                'proficiency' => 90,
                'icon' => 'devicon-github-original colored',
                'order' => 19,
            ],
            [
                'name' => 'VS Code',
                'category' => 'Tools & Platforms',
                'proficiency' => 95,
                'icon' => 'devicon-vscode-plain colored',
                'order' => 20,
            ],
        ];

        foreach ($skills as $skill) {
            \App\Models\Skill::updateOrCreate(
                ['name' => $skill['name']],
                $skill
            );
        }
    }
}
