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
        // \App\Models\Skill::truncate(); // Optional: uncomment if you want to clear skills first

        $skills = [
            // Languages
            [
                'name' => 'Python',
                'category' => 'Languages', // Changed from singular "Language" to match user's potential grouping or keep as "Language" for consistency. Let's use "Languages" for multiple.
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

            // AI/ML
            [
                'name' => 'PyTorch',
                'category' => 'AI / Machine Learning',
                'proficiency' => 75,
                'icon' => 'devicon-pytorch-original colored',
                'order' => 5,
            ],
            [
                'name' => 'TensorFlow',
                'category' => 'AI / Machine Learning',
                'proficiency' => 70,
                'icon' => 'devicon-tensorflow-original colored',
                'order' => 6,
            ],
            [
                'name' => 'Scikit-learn',
                'category' => 'AI / Machine Learning',
                'proficiency' => 75,
                'icon' => 'devicon-scikitlearn-plain colored', // Check if exists, fallback?
                'order' => 7,
            ],
            [
                'name' => 'Lightning',
                'category' => 'AI / Machine Learning',
                'proficiency' => 70,
                'icon' => 'fas fa-bolt text-yellow-500', // Fallback for Lightning AI
                'order' => 8,
            ],

            // Web/Mobile
            [
                'name' => 'Laravel',
                'category' => 'Web & Mobile Development',
                'proficiency' => 90,
                'icon' => 'devicon-laravel-original colored',
                'order' => 9,
            ],
            [
                'name' => 'Flutter',
                'category' => 'Web & Mobile Development',
                'proficiency' => 85,
                'icon' => 'devicon-flutter-plain colored',
                'order' => 10,
            ],
            [
                'name' => 'Node.js',
                'category' => 'Web & Mobile Development',
                'proficiency' => 75,
                'icon' => 'devicon-nodejs-plain-wordmark colored',
                'order' => 11,
            ],

            // Database
            [
                'name' => 'PostgreSQL',
                'category' => 'Database',
                'proficiency' => 80,
                'icon' => 'devicon-postgresql-plain colored',
                'order' => 12,
            ],
            [
                'name' => 'Redis',
                'category' => 'Database',
                'proficiency' => 70,
                'icon' => 'devicon-redis-plain colored',
                'order' => 13,
            ],
            [
                'name' => 'MySQL',
                'category' => 'Database',
                'proficiency' => 85,
                'icon' => 'devicon-mysql-plain colored',
                'order' => 14,
            ],
            [
                'name' => 'Firebase',
                'category' => 'Database',
                'proficiency' => 75,
                'icon' => 'devicon-firebase-plain colored',
                'order' => 15,
            ],

            // Hardware/IoT
            [
                'name' => 'Arduino',
                'category' => 'Hardware & IoT',
                'proficiency' => 60,
                'icon' => 'devicon-arduino-plain colored',
                'order' => 16,
            ],
            [
                'name' => 'Raspberry Pi',
                'category' => 'Hardware & IoT',
                'proficiency' => 65,
                'icon' => 'devicon-raspberrypi-line colored',
                'order' => 17,
            ],

            // Tools/DevOps
            [
                'name' => 'Linux',
                'category' => 'Tools & DevOps',
                'proficiency' => 80,
                'icon' => 'devicon-linux-plain colored',
                'order' => 18,
            ],
            [
                'name' => 'Git',
                'category' => 'Tools & DevOps',
                'proficiency' => 90,
                'icon' => 'devicon-git-plain colored',
                'order' => 19,
            ],
            [
                'name' => 'GitHub',
                'category' => 'Tools & DevOps',
                'proficiency' => 90,
                'icon' => 'devicon-github-original colored',
                'order' => 20,
            ],
            [
                'name' => 'VS Code',
                'category' => 'Tools & DevOps',
                'proficiency' => 95,
                'icon' => 'devicon-vscode-plain colored',
                'order' => 21,
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
