<?php

namespace Blog\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display the user dashboard.
     *
     * @author Connor Freeman
     *
     * @return Response
     */
    public function profile()
    {
        $posts = Auth::user()->posts()->latest('published_at')->published()->get();

        $page_title = 'Profile';

        return view('user.profile', compact('posts', 'page_title'));
    }
}
