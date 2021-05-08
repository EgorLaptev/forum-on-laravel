<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function delete($user_id)
    {

        $user = User::find($user_id);

        /* Admin can't delete himself & user can delete only himself*/
        if (($user['id'] == $user_id && $user['role_id'] != 3) || (Auth::user()['role_id'] >= 2 && Auth::id() != $user_id && $user['role_id'] != 3)) {

            if($user['role_id'] == Auth::user()['role_id']) abort(403);

            /* Deleting user's comments */
            foreach ( $user->comments()->get() as $comment ) {
                app()->call('App\Http\Controllers\CommentController@delete', ['comment_id' => $comment['id']]);
            }

            /* Deleting a user */
            $user->delete();

            return back();

        } else abort(403);

    }

    public function demote($user_id)
    {

        $user = User::find($user_id);

        $this->authorize('demote', $user);

        if($user['role_id'] > 0) {

            $user['role_id'] -= 1;
            $user->save();

        }

        return back();

    }

    public function empowerment($user_id)
    {

        $user = User::find($user_id);

        $this->authorize('empowerment', $user);

        if($user['role_id'] < 3) {

            $user['role_id'] += 1;
            $user->save();

        }

        return back();

    }

    public function index()
    {
        if (Gate::allows('moder')) return [User::all(), Role::all()];
        else abort(403);
    }

}
