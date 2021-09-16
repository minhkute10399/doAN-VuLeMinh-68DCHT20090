<?php

namespace App\Http\Controllers;

use App\Events\CommentNotification;
use App\Http\Requests\StoreCommentCourse;
use App\Models\Comment;
use App\Models\Courses;
use App\Models\User;
use App\Notifications\NotificationComment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
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
        $teacher = User::findOrFail($request->teacher_id);
        $countUnreadNotifications = $teacher->unreadNotifications()->count();
        $user = Auth::user();
        $data = [
            "message" => trans("message.success"),
        ];
        if ($teacher->id === $user->id) {
            $check = Comment::create([
                'content' => $request->content,
                'course_id' => $request->course_id,
                'user_id' => $user->id,
            ]);
        } else {
            $check = Comment::create([
                'content' => $request->content,
                'course_id' => $request->course_id,
                'user_id' => $user->id,
            ]);
            $channel = [
                'id' => $request->teacher_id,
                'title' => trans('message.title_notify'),
                'course_name' => $course->name,
                'images' => $user->images,
                'user' => $user->name,
                'count_unread_notify' => $countUnreadNotifications,
                'course_id' => $course->id,
            ];
            event(new CommentNotification($channel));
            $sendNotification = $teacher->notify(new NotificationComment($channel));
        }
        if ($check) {
            $data['message'] = trans('message.success');
            $data['content'] = $request->content;
            $data['users'] = $user->name;
            $data['images'] = $user->images;
            $data['created_at'] = $check->created_at;

            return view('website.frontend.storeCommentAjax', compact('data'));
        }

        return response()->json([
            'data' => $data,
            'channel' => $channel,
        ]);
    }

    public function getCurrentUser()
    {
        return response()->json([
            'id' => Auth::id(),
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
