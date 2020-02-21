<?php

use Illuminate\Database\Seeder;
use App\Course;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::create([
            'course_id' => 'ccna',
            'name' => 'Giải pháp hạ tầng mạng trong doanh nghiệp (CCNA)'
        ]);
        Course::create([
            'course_id' => 'mcsa',
            'name' => 'Giải pháp dịch vụ mạng trong doanh nghiệp (MCSA)'
        ]);
        Course::create([
            'course_id' => 'linux',
            'name' => 'Quản trị server Linux'
        ]);
        Course::create([
            'course_id' => 'ceh',
            'name' => 'Hacker mũ trắng (CEH)'
        ]);
        Course::create([
            'course_id' => 'chfi',
            'name' => 'Chuyên gia điều tra tội phạm mạng (CHFI)'
        ]);
        Course::create([
            'course_id' => 'php',
            'name' => 'Lập trình PHP'
        ]);
        Course::create([
            'course_id' => 'android',
            'name' => 'Lập trình Android'
        ]);
        Course::create([
            'course_id' => 'graphic',
            'name' => 'Thiết kế đồ hoạ'
        ]);
    }
}
