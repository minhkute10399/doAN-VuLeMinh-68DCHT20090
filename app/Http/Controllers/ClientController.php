<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchCourseRequest;
use App\Models\Category;
use App\Models\Courses;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Courses::orderBy('created_at', 'desc')->latest()->take(6)->get();
        $courses->load('users');
        $student = User::where('role_id', config('role.student'))->get();

        return view('website.frontend.index', compact('courses', 'student'));
    }

    public function getNotification()
    {
        $notifications = Auth::user()->notifications;
        if ($notifications) {
            return view('website.frontend.ajaxNotification', compact('notifications'));
        }

        return response()->json([
            'notifications' => $notifications,
        ]);
    }

    public function countUnreadNotification()
    {
        $countUnreadNotifications = Auth::user()->unreadNotifications()->count();

        return response()->json([
            'countUnreadNotification' => $countUnreadNotifications,
        ]);
    }

    public function viewAllCourses()
    {
        $courses = Courses::orderBy('created_at', 'desc')->paginate(config('paginateHome.paginateHome'));
        $categories = Category::all()->load('children');

        return view('website.frontend.all_courses', compact('courses', 'categories'));
    }

    public function viewCategory($id)
    {
        $category = Category::findOrFail($id)->load('courses');
        $categories = Category::all()->load('children');

        return view('website.frontend.view_category', compact('category', 'categories'));
    }

    public function searchCourse(SearchCourseRequest $request)
    {
        $search = $request->search;
        $course = Courses::where('name', 'LIKE', '%' .$search. '%')->paginate(config('paginateHome.paginateHome'));
        $categories = Category::all()->load('children');

        return view('website.frontend.search_course', compact('course', 'categories', 'search'));
    }

    public function allTeacher()
    {
        $teachers = User::where('role_id', config('role.teacher'))->paginate(config('paginateHome.paginateHome'));
        $teachers->load('courses');

        return view('website.frontend.all_teacher', compact('teachers'));
    }

    public function searchTeacher(Request $request) {
        if ($request->ajax()) {
            $data = User::where('role_id', config('role.teacher'))
                ->where('name', 'like', '%' .$request->searchInput. '%')
                ->get();
        }
        if ($data) {
            return view('website.frontend.search_ajax_teacher', compact('data'));
        }

        return response()->json([
            'data' => $data,
        ]);
    }

    public function showSingleCourse($id)
    {
        //Show single course detail
        $course = Courses::findOrFail($id)->load(['comments', 'users']);

        return view('website.frontend.single_course', compact('course'));
    }

    public function viewCourseNotification($id, $notyid)
    {
        $unReadNotification = Auth::user()->notifications->where('id', $notyid)->first();
        $course = Courses::findOrFail($id)->id;
        if ($unReadNotification) {
            $unReadNotification->markAsRead();

            return redirect()->route('singleCourse', [$course]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
