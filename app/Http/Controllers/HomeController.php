<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\News;
use App\Course;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $news = News::all();
        $questions = [
            "Điều kiện tuyển sinh của Viện Đào tạo CNTT Quốc tế I-Tech là gì?",
            "Trình độ Tiếng Anh chưa tốt có đủ điều kiện học tại Viện Đào tạo CNTT Quốc
            tế I-Tech không?",
            "Khi đã có người thân học tại Viện Đào tạo CNTT Quốc tế I-Tech thì khi nhập
            học có được giảm học phí không?",
            "Trong chương trình học có kỳ thực tập doanh nghiệp không? Em sẽ được tự
            chọn chỗ thực tập không hay nhà trường sắp xếp? Và thực tập có lương hay không?",
            "Tại Viện Đào tạo CNTT Quốc tế I-Tech, mỗi lớp có bao nhiêu sinh viên?",
            "Ngành Quản trị và bảo mật hệ thống mạng sinh viên học tại Viện Đào tạo CNTT
            Quốc tế I-Tech có điểm gì nổi bật so với những Trường khác?",
            "Học lập trình tại Viện Đào tạo CNTT Quốc tế I-Tech ra trường làm những công
            việc gì?",
            "Giữa Phần mềm và An toàn thông tin, ngành nào khó học hơn, ngành nào dễ
            kiếm việc hơn?",
            "Ngành Thiết kế đồ họa sinh viên học tại Viện Đào tạo CNTT Quốc tế I-Tech
            có nơi để thực tập không?",
            "Sinh viên học tại Viện Đào tạo CNTT Quốc tế I-Tech có thể đi du học ở nước
            ngoài được không?"
        ];
        return view('home', [
            'questions' => $questions,
            'news' => $news,
            'courses' => $courses
        ]);
    }

    public function showLandingPages(Request $request, $courseId)
    {
        $course = Course::where("course_id", $courseId)->first();
        return view('client.landing.pages', compact('course'));
    }
}
