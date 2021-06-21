<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentCourse;
use App\Models\Comment;
use App\Models\Courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
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
    public function store(StoreCommentCourse $request)
    {
        $course = Courses::findOrFail($request->course_id);
        $data = [
            "message" => trans("message.success"),
        ];
        $storeComment = Comment::create([
            'content' => $request->content,
            'course_id' => $request->course_id,
            'user_id' => Auth::id(),
        ]);

        if ($storeComment) {
            $data['message'] = trans('message.success');
            $data['content'] = $request->content;
            $data['users'] = Auth::user()->name;
            $data['images'] = Auth::user()->images;
            $data['created_at'] = $storeComment->created_at;

            return view('website.frontend.storeCommentAjax', compact('data'));
        }

        return response()->json([
            'data' => $data,
        ]);
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
