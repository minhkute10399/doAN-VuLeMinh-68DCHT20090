<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendExerciseStudentRequest;
use App\Models\Exercise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ExerciseController extends Controller
{
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
    public function store(SendExerciseStudentRequest $request)
    {
        //store exercise and update exsiting of student pivot
        $exercise = Exercise::findOrFail($request->exercise_id)->load('users');
        if (!$exercise->users->contains(Auth::user())) {
            $exercise->users()->attach(Auth::id(),[
                'url' => $request->url,
            ]);
        } else {
            $exercise->users()->updateExistingPivot(Auth::id(), [
                'url' => $request->url,
            ]);
        }
        Alert::success(trans('message.success'));

        return redirect()->route('lessons.show', [$request->lesson_id]);
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
