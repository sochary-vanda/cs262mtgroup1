<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        $courses = [
            // ── SCIENCE ──────────────────────────────────────────────────────────
            [
                'title'          => 'Fundamentals of Molecular Biology',
                'description'    => 'Explore the building blocks of life. This course covers DNA replication, protein synthesis, gene expression, and modern genomics techniques including CRISPR-Cas9.',
                'category'       => 'Science',
                'level'          => 'intermediate',
                'duration_weeks' => 10,
                'price'          => 0,
                'instructor'     => 'Dr. Sarah Chen',
            ],
            [
                'title'          => 'Astrophysics: From Stars to Galaxies',
                'description'    => 'Journey through the cosmos. Study stellar evolution, black holes, dark matter, gravitational waves, and the large-scale structure of the universe.',
                'category'       => 'Science',
                'level'          => 'advanced',
                'duration_weeks' => 12,
                'price'          => 49.99,
                'instructor'     => 'Prof. James Okafor',
            ],
            [
                'title'          => 'Organic Chemistry Essentials',
                'description'    => 'Master organic reactions, synthesis pathways, stereochemistry, and spectroscopic analysis. Includes laboratory simulation modules.',
                'category'       => 'Science',
                'level'          => 'intermediate',
                'duration_weeks' => 8,
                'price'          => 29.99,
                'instructor'     => 'Dr. Maria Santos',
            ],

            // ── TECHNOLOGY ───────────────────────────────────────────────────────
            [
                'title'          => 'Machine Learning with Python',
                'description'    => 'Build intelligent systems from scratch. Covers supervised & unsupervised learning, neural networks, scikit-learn, and real-world project deployment.',
                'category'       => 'Technology',
                'level'          => 'intermediate',
                'duration_weeks' => 14,
                'price'          => 59.99,
                'instructor'     => 'Aisha Patel',
            ],
            [
                'title'          => 'Cybersecurity Fundamentals',
                'description'    => 'Learn to protect systems and networks. Covers threat modeling, cryptography, ethical hacking, penetration testing, and incident response.',
                'category'       => 'Technology',
                'level'          => 'beginner',
                'duration_weeks' => 6,
                'price'          => 0,
                'instructor'     => 'Marcus Webb',
            ],
            [
                'title'          => 'Web Development Bootcamp',
                'description'    => 'Full-stack development from zero to hero. HTML, CSS, JavaScript, React, Node.js, databases, and cloud deployment all in one comprehensive track.',
                'category'       => 'Technology',
                'level'          => 'beginner',
                'duration_weeks' => 16,
                'price'          => 79.99,
                'instructor'     => 'Liu Yang',
            ],

            // ── ENGINEERING ──────────────────────────────────────────────────────
            [
                'title'          => 'Robotics & Automation',
                'description'    => 'Design and program autonomous systems. Study kinematics, sensors, actuators, ROS, and build your own robot projects from concept to prototype.',
                'category'       => 'Engineering',
                'level'          => 'advanced',
                'duration_weeks' => 12,
                'price'          => 69.99,
                'instructor'     => 'Dr. Kenji Tanaka',
            ],
            [
                'title'          => 'Structural Engineering Principles',
                'description'    => 'Understand how structures carry loads. Topics include statics, material properties, beam design, finite element analysis, and earthquake engineering.',
                'category'       => 'Engineering',
                'level'          => 'intermediate',
                'duration_weeks' => 10,
                'price'          => 39.99,
                'instructor'     => 'Prof. Elena Vasquez',
            ],
            [
                'title'          => 'Electronics & Circuit Design',
                'description'    => 'From Ohm\'s law to complex circuits. Build amplifiers, oscillators, and microcontroller projects while learning simulation tools like LTSpice.',
                'category'       => 'Engineering',
                'level'          => 'beginner',
                'duration_weeks' => 8,
                'price'          => 0,
                'instructor'     => 'Ahmed Al-Rashid',
            ],

            // ── MATH ─────────────────────────────────────────────────────────────
            [
                'title'          => 'Calculus for the Modern Scientist',
                'description'    => 'Rigorous yet intuitive approach to single and multivariable calculus. Includes real-world applications in physics, economics, and data science.',
                'category'       => 'Math',
                'level'          => 'beginner',
                'duration_weeks' => 12,
                'price'          => 0,
                'instructor'     => 'Dr. Nora Johansson',
            ],
            [
                'title'          => 'Linear Algebra & Matrices',
                'description'    => 'The mathematical backbone of machine learning and computer graphics. Vectors, transformations, eigenvalues, SVD, and applications in data analysis.',
                'category'       => 'Math',
                'level'          => 'intermediate',
                'duration_weeks' => 8,
                'price'          => 24.99,
                'instructor'     => 'Prof. David Kimura',
            ],
            [
                'title'          => 'Statistics & Probability Theory',
                'description'    => 'Master statistical thinking from basic probability to Bayesian inference, hypothesis testing, regression, and Monte Carlo simulations.',
                'category'       => 'Math',
                'level'          => 'intermediate',
                'duration_weeks' => 10,
                'price'          => 34.99,
                'instructor'     => 'Dr. Fatima Hassan',
            ],
        ];

        foreach ($courses as $course) {
            Course::firstOrCreate(['title' => $course['title']], $course);
        }
    }
}
