<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Certificate;
use Carbon\Carbon;

class CertificateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Truncate existing certificates
        // Certificate::truncate();

        $certificates = [
            // IBM Certificates
            [
                'title' => 'Exploratory Data Analysis for Machine Learning',
                'issuer' => 'IBM',
                'issued_at' => '2025-11-01',
                'credential_url' => null,
                'image' => null,
            ],
            [
                'title' => 'IBM Deep Learning with PyTorch, Keras and Tensorflow',
                'issuer' => 'IBM',
                'issued_at' => '2025-11-01',
                'credential_url' => null,
                'image' => null,
            ],
            [
                'title' => 'IBM Generative AI Engineering',
                'issuer' => 'IBM',
                'issued_at' => '2025-11-01',
                'credential_url' => null,
                'image' => null,
            ],
            [
                'title' => 'IBM AI Engineering',
                'issuer' => 'IBM',
                'issued_at' => '2025-11-01',
                'credential_url' => null,
                'image' => null,
            ],
            [
                'title' => 'Generative AI: Prompt Engineering Basics',
                'issuer' => 'IBM',
                'issued_at' => '2025-11-01',
                'credential_url' => null,
                'image' => null,
            ],
            [
                'title' => 'Generative AI: Introduction and Applications',
                'issuer' => 'IBM',
                'issued_at' => '2025-11-01',
                'credential_url' => null,
                'image' => null,
            ],
            [
                'title' => 'Python for Data Science, AI & Development',
                'issuer' => 'IBM',
                'issued_at' => '2025-11-01',
                'credential_url' => null,
                'image' => null,
            ],
            [
                'title' => 'Developing AI Applications with Python and Flask',
                'issuer' => 'IBM',
                'issued_at' => '2025-11-01',
                'credential_url' => null,
                'image' => null,
            ],
            [
                'title' => 'Data Analysis with Python',
                'issuer' => 'IBM',
                'issued_at' => '2025-11-01',
                'credential_url' => null,
                'image' => null,
            ],
            [
                'title' => 'Building Generative AI-Powered Applications with Python',
                'issuer' => 'IBM',
                'issued_at' => '2025-11-01',
                'credential_url' => null,
                'image' => null,
            ],
            [
                'title' => 'Develop Generative AI Applications: Get Started',
                'issuer' => 'IBM',
                'issued_at' => '2025-11-01',
                'credential_url' => null,
                'image' => null,
            ],
            [
                'title' => 'Project: Generative AI Applications with RAG and LangChain',
                'issuer' => 'IBM',
                'issued_at' => '2025-11-01',
                'credential_url' => null,
                'image' => null,
            ],
            [
                'title' => 'Deep Learning with PyTorch',
                'issuer' => 'IBM',
                'issued_at' => '2025-11-01',
                'credential_url' => null,
                'image' => null,
            ],
            [
                'title' => 'Generative AI Advance Fine-Tuning for LLMs',
                'issuer' => 'IBM',
                'issued_at' => '2025-11-01',
                'credential_url' => null,
                'image' => null,
            ],
            [
                'title' => 'Gen AI Foundational Models for NLP & Language Understanding',
                'issuer' => 'IBM',
                'issued_at' => '2025-11-01',
                'credential_url' => null,
                'image' => null,
            ],
            [
                'title' => 'Generative AI and LLMs: Architecture and Data Preparation',
                'issuer' => 'IBM',
                'issued_at' => '2025-11-01',
                'credential_url' => null,
                'image' => null,
            ],
            [
                'title' => 'Generative AI Language Modeling with Transformers',
                'issuer' => 'IBM',
                'issued_at' => '2025-11-01',
                'credential_url' => null,
                'image' => null,
            ],
            [
                'title' => 'Generative AI Engineering and Fine-Tuning Transformers',
                'issuer' => 'IBM',
                'issued_at' => '2025-11-01',
                'credential_url' => null,
                'image' => null,
            ],
            [
                'title' => 'AI Capstone Project with Deep Learning',
                'issuer' => 'IBM',
                'issued_at' => '2025-11-01',
                'credential_url' => null,
                'image' => null,
            ],
            [
                'title' => 'Fundamentals of AI Agents Using RAG and LangChain',
                'issuer' => 'IBM',
                'issued_at' => '2025-11-01',
                'credential_url' => null,
                'image' => null,
            ],
            [
                'title' => 'Introduction to Artificial Intelligence (AI)',
                'issuer' => 'IBM',
                'issued_at' => '2025-11-01',
                'credential_url' => null,
                'image' => null,
            ],

            // University of Pennsylvania Certificates
            [
                'title' => 'Machine Learning Essentials',
                'issuer' => 'University of Pennsylvania',
                'issued_at' => '2025-11-01',
                'credential_url' => null,
                'image' => null,
            ],
            [
                'title' => 'Artificial Intelligence Essentials',
                'issuer' => 'University of Pennsylvania',
                'issued_at' => '2025-11-01',
                'credential_url' => null,
                'image' => null,
            ],
            [
                'title' => 'Statistics for Data Science Essentials',
                'issuer' => 'University of Pennsylvania',
                'issued_at' => '2025-11-01',
                'credential_url' => null,
                'image' => null,
            ],

            // Google Certificates
            [
                'title' => 'Use AI as a Creative or Expert Partner',
                'issuer' => 'Google',
                'issued_at' => '2025-11-01',
                'credential_url' => null,
                'image' => null,
            ],
            [
                'title' => 'Design Prompts for Everyday Work Tasks',
                'issuer' => 'Google',
                'issued_at' => '2025-11-01',
                'credential_url' => null,
                'image' => null,
            ],
            [
                'title' => 'Start Writing Prompts like a Pro',
                'issuer' => 'Google',
                'issued_at' => '2025-11-01',
                'credential_url' => null,
                'image' => null,
            ],
            [
                'title' => 'Introduction to AI',
                'issuer' => 'Google',
                'issued_at' => '2025-11-01',
                'credential_url' => null,
                'image' => null,
            ],

            // Dicoding Academy Certificates
            [
                'title' => 'Memulai Pemrograman dengan Python',
                'issuer' => 'Dicoding Academy',
                'issued_at' => '2025-10-01',
                'credential_url' => 'https://www.dicoding.com/certificates/L4PQ22K32ZO1',
                'image' => null,
            ],
            [
                'title' => 'Belajar Dasar Pemrograman JavaScript',
                'issuer' => 'Dicoding Academy',
                'issued_at' => '2025-10-01',
                'credential_url' => 'https://www.dicoding.com/certificates/6RPNGGWD8Z2M',
                'image' => null,
            ],
            [
                'title' => 'Belajar Membuat Front-End Web untuk Pemula',
                'issuer' => 'Dicoding Academy',
                'issued_at' => '2025-10-01',
                'credential_url' => 'https://www.dicoding.com/certificates/ERZR22K9QPYV',
                'image' => null,
            ],
            [
                'title' => 'Belajar Dasar AI',
                'issuer' => 'Dicoding Academy',
                'issued_at' => '2025-09-01',
                'credential_url' => 'https://www.dicoding.com/certificates/0LZ05Q63NX65',
                'image' => null,
            ],
        ];

        foreach ($certificates as $cert) {
            Certificate::updateOrCreate(
                ['title' => $cert['title']],
                $cert
            );
        }
    }
}
