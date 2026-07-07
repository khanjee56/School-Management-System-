<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\SchoolClass;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Notice;
use Illuminate\Support\Facades\Hash;
class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

    // Admin User
    User::create([
        'name' => 'Admin',
        'email' => 'admin@school.com',
        'password' => Hash::make('123456'),
        'role' => 'admin',
    ]);

    // School Classes
    SchoolClass::create([
        'name' => 'Class 1',
        'section' => 'A',
        'capacity' => 30,
    ]);

    SchoolClass::create([
        'name' => 'Class 2',
        'section' => 'A',
        'capacity' => 30,
    ]);

    SchoolClass::create([
        'name' => 'Class 3',
        'section' => 'A',
        'capacity' => 30,
    ]);

    // Subjects for Class 1
    Subject::create([
        'name' => 'Math',
        'code' => 'MATH01',
        'class_id' => 1,
    ]);

    Subject::create([
        'name' => 'Science',
        'code' => 'SCI01',
        'class_id' => 1,
    ]);

    Subject::create([
        'name' => 'English',
        'code' => 'ENG01',
        'class_id' => 1,
    ]);

    Subject::create([
        'name' => 'Urdu',
        'code' => 'URD01',
        'class_id' => 1,
    ]);

    Subject::create([
        'name' => 'Islamiat',
        'code' => 'ISL01',
        'class_id' => 1,
    ]);

// Teacher User
$teacher1 = User::create([
    'name' => 'Teacher 1',
    'email' => 'teacher1@school.com',
    'password' => Hash::make('123456'),
    'role' => 'teacher',
]);

$teacher2 = User::create([
    'name' => 'Teacher 2',
    'email' => 'teacher2@school.com',
    'password' => Hash::make('123456'),
    'role' => 'teacher',
]);

Teacher::create([
    'user_id' => $teacher1->id,
    'employee_code' => 'EMP001',
    'phone_number' => '03001234567',
    'adress' => 'Karachi',
    'joining_date' => now(),
]);

Teacher::create([
    'user_id' => $teacher2->id,
    'employee_code' => 'EMP002',
    'phone_number' => '03007654321',
    'adress' => 'Karachi',
    'joining_date' => now(),
]);

// Student User 1
$student1 = User::create([
    'name' => 'Student 1',
    'email' => 'student1@school.com',
    'password' => Hash::make('123456'),
    'role' => 'student',
]);

Student::create([
    'user_id' => $student1->id,
    'class_id' => 1,
    'roll_number' => 'ST001',
    'date_of_birth' => '2012-01-10',
    'gender' => 'Male',
    'phone' => '03111111111',
    'address' => 'Karachi',
    'parent_name' => 'Ahmed Khan',
    'parent_phone' => '03211111111',
    'parent_email' => 'parent1@gmail.com',
]);

// Student User 2
$student2 = User::create([
    'name' => 'Student 2',
    'email' => 'student2@school.com',
    'password' => Hash::make('123456'),
    'role' => 'student',
]);

Student::create([
    'user_id' => $student2->id,
    'class_id' => 2,
    'roll_number' => 'ST002',
    'date_of_birth' => '2011-08-15',
    'gender' => 'Female',
    'phone' => '03112222222',
    'address' => 'Karachi',
    'parent_name' => 'Ali Khan',
    'parent_phone' => '03212222222',
    'parent_email' => 'parent2@gmail.com',
]);

// Student User 3
$student3 = User::create([
    'name' => 'Student 3',
    'email' => 'student3@school.com',
    'password' => Hash::make('123456'),
    'role' => 'student',
]);

Student::create([
    'user_id' => $student3->id,
    'class_id' => 3,
    'roll_number' => 'ST003',
    'date_of_birth' => '2012-05-20',
    'gender' => 'Male',
    'phone' => '03113333333',
    'address' => 'Karachi',
    'parent_name' => 'Usman Khan',
    'parent_phone' => '03213333333',
    'parent_email' => 'parent3@gmail.com',
]);

Notice::create([
    'title' => 'Welcome',
    'content' => 'Welcome to our School Management System.',
    'posted_by' => 1, // Admin User ID
    'for_role' => 'all',
]);

Notice::create([
    'title' => 'Teachers Meeting',
    'content' => 'Teachers meeting on Monday at 10:00 AM.',
    'posted_by' => 1,
    'for_role' => 'teacher',
]);

Notice::create([
    'title' => 'Monthly Test',
    'content' => 'Monthly test will start next week.',
    'posted_by' => 1,
    'for_role' => 'student',
]);

}
 }

