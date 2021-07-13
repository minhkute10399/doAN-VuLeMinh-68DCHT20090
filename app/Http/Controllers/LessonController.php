<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendExerciseStudentRequest;
use App\Models\Courses;
use App\Models\Lesson;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use voku\helper\ASCII;

class LessonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $lesson = Lesson::findOrFail($id)->load(['course']);
        $course = $lesson->course->load('lessons');

        return view('website.frontend.lesson_video', compact('course', 'lesson'));
    }

    public function showVideoLesson($id)
    {
        $lesson = Lesson::findOrFail($id)->load('users', 'course', 'exercises');
        if (!$lesson->users->contains(Auth::id())) {
            $lesson->users()->attach([
                'user_id' => Auth::user()->id,
            ]);
        }

        return response()->json([
            'lesson' => $lesson,
        ]);
    }

    public function detailLessonAdminCheck($id)
    {
        $lesson = Lesson::findOrFail($id);

        return view('website.backend.lesson.detail_lesson', compact('lesson'));
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
