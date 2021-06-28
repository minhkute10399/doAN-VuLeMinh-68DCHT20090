<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchAccountAdminRequest;
use App\Http\Requests\SearchCourseRequest;
use App\Http\Requests\StoreCommentCourse;
use App\Models\Courses;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('status', config('status.active'))->paginate(7);

        return view('website.backend.users.index', compact('users'));
    }

    public function searchAccountAdmin(SearchAccountAdminRequest $request)
    {
        $user = User::where('name', 'LIKE', '%' .$request->search_account. '%')->get();

        return view('website.backend.users.search', compact('user'));
    }

    public function getBlackListUser()
    {
        $now = Carbon::now();
        $banned_user = User::where('status', config('status.inactive'))->paginate(7);

        foreach($banned_user as $user) {
            if ($user->banned_until <= $now) {
                $user->update([
                    'status' => config('status.active'),
                    'banned_until' => null,
                ]);
            }
        }
        return view('website.backend.users.banned_user', compact('banned_user'));
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
        $user = User::findOrFail($id);

        if ($user->banned_until != null) {
            $user->update([
                'banned_until' => null,
                'status' => config('status.active'),
            ]);
            toastr()->success(trans('message.update_successfully'));

            return redirect()->back();
        }
        $user->update([
            'banned_until' => $request->banned_until,
            'status' => config('status.inactive'),
        ]);
        toastr()->success(trans('message.update_successfully'));

        return redirect()->route('manageUser.index');
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
