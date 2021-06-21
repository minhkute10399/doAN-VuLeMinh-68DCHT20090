<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Courses;
use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Courses::paginate(7);

        return view('website.backend.course.index', compact('courses'));
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
        //Register course by user
        $course = Courses::findOrFail($request->course_id)->load('users', 'lessons');
        if (!$course->users->contains(Auth::user())) {
            $course->users()->attach([
                'user_id' => Auth::id(),
            ]);
        }
        Alert::success(trans('message.success'));

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Courses::findOrFail($id);
        $course->load('lessons');

        return view('website.backend.lesson.showlesson_course', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Courses::findOrFail($id);
        $user = Auth::user();
        $categories = Category::all();

        return view('website.frontend.edit_course_teacher', compact('course', 'user', 'categories'));
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
        $data = $request->all();
        $result = Courses::findOrFail($id);
        if ($request->images) {
            $file = $data['images'];
            $name = time() . $file->getClientOriginalName();
            $path = public_path(config('image_path.images'));
            $file->move($path, $name);
            $result->update([
                'name' => $data['name'],
                'description' => $data['description'],
                'images' => $name,
            ]);
        } else {
            $result->update([
                'name' => $data['name'],
                'description' => $data['description'],
            ]);
        }
        if ($result) {
            // toastr()->success(trans('message.update_successfully'));
            Alert::success(trans('message.success'));
        } else {
            Alert::success(trans('message.unsuccessful'));
        }

        return redirect()->route('manageCourse.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
