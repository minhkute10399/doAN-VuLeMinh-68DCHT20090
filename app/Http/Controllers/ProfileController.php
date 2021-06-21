<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCourseRequest;
use App\Http\Requests\AddExerciseRequest;
use App\Http\Requests\UpdateEmailUser;
use App\Http\Requests\UpdateLessonRequest;
use App\Models\Category;
use App\Models\Courses;
use App\Models\Exercise;
use App\Models\Lesson;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;


class ProfileController extends Controller
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
        $user = User::findOrFail(Auth::user()->id)->load('role', 'courses');

        return view('website.frontend.profile', compact('user'));
    }

    public function manageCourseByTeacher()
    {
        $teacher = User::findOrFail(Auth::user()->id)->load(['courses' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }]);

        return view('website.frontend.my_course', compact('teacher'));
    }

    public function getUserWithRole()
    {
        $user = Auth::user();
        $user->load('role');

        return $user;
    }

    public function getDataUserChart()
    {
        // $lessons = Lesson::->load('lessons')
        //     ->get()
        //     ->groupBy(function($query) {
        //         return Carbon::parse($query->created_at)->format('m');
        //     });
        // foreach ($lessons as $key => $item) {
        //     $lessons[$key] = $item->count();
        // }
        $data = [];
        $month = Carbon::now()->month();
        $lessonsOfUser = Auth::user()->load(['lessons' => function($query) use ($month){
            $query->where('lesson_user.created_at', $month);
        }]);
        return response()->json(compact('lessonsOfUser'));
    }

    public function showEmail() {
        $user = $this->getUserWithRole();

        return view('website.frontend.show_emailUser', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = $this->getUserWithRole();
        $categories = Category::all();
        $categories->load('children');

        return view('website.frontend.add_course', compact('user', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddCourseRequest $request, Courses $course)
    {
        //Teacher created course can continue
        $user = User::findOrFail(Auth::user()->id);

        if ($request->hasFile('images')) {
            $file = $request->file("images");
            $name = time() . $file->getClientOriginalName();
            $path = public_path(config('image_path.images'));
            $file->move($path, $name);
            $result = $course->create([
                'name' => $request->name,
                'description' => $request->description,
                'category_id' => $request->category_id,
                'images' => $name,
            ]);
            $user->courses()->attach([
                'course_id' => $result->id,
            ]);
            Alert::success(trans('message.success'));

            return redirect()->route('courses');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Teacher show detail course to change
        $course = Courses::findOrFail($id)->load(['users' => function ($query) {
            $query->where('role_id', config('role.teacher'));
        }]);

        return view('website.frontend.show_detail_my_course', compact('course'));
    }

    public function showExerciseByTeacher($id)
    {
        $lesson = Lesson::findOrFail($id)->load('exercises');

        return view('website.frontend.show_exercise_by_teacher', compact('lesson'));
    }

    public function addLessonByTeacher(Request $request)
    {
        $result = Lesson::create([
            'title' => $request->title,
            'description' => $request->description,
            'course_id' => $request->course_id,
            'video_url' => $request->video_url,
        ]);
        if ($result) {
            Alert::success(trans('message.success'));
        }

        return redirect()->route('profile.show', $request->course_id);
    }

    public function addExerciseByTeacher(AddExerciseRequest $request)
    {
        $result = Exercise::create([
            'title' => $request->title,
            'url' => $request->url,
            'lesson_id' => $request->lesson_id,
        ]);
        if ($result) {
            Alert::success(trans('message.success'));
        } else {
            Alert::error(trans('message.error'));
        }

        return redirect()->route('exercises', [$request->lesson_id]);
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
        $user = User::findOrFail($id);
        if ($request->hasFile("images")) {
            $file = $request->file("images");
            $name = time() . $file->getClientOriginalName();
            $path = public_path(config('image_path.images'));
            $file->move($path, $name);
            $user->update([
                'images' => $name,
            ]);
        }

        return redirect()->route('profile.index');
    }

    public function updateCoursebyTeacher(Request $request, $id)
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

        return redirect()->route('courses');
    }

    public function updateLesson (UpdateLessonRequest $request, $id)
    {
        $lesson = Lesson::findOrFail($id);
        $result = $lesson->update([
            'title' => $request->title,
            'description' => $request->description,
            'video_url' => $request->video_url,
        ]);

        if($result) {
            Alert::success(trans('message.success'));
        }else {
            Alert::error(trans('message.error'));
        }

        return redirect()->back();
    }

    public function updateEmailUser(UpdateEmailUser $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        Alert::success(trans('message.success'));

        return redirect()->route('profile.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Delete course by teacher
        $course = Courses::findOrFail($id);
        $course->delete();
        Alert::success(trans('message.success'));

        return redirect()->route('courses');
    }

    public function destroyLesson($id)
    {
        $lesson = Lesson::findOrFail($id);
        $lesson->delete();
        Alert::success(trans('message.success'));

        return redirect()->back();
    }

    public function directBackExerciseToShow()
    {
        return redirect()->back();
    }
}
