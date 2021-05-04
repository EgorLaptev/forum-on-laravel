<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.home', [
            'posts' => Post::simplePaginate(9),
        ]);
    }

    public function cabinet()
    {
        return view('pages.cabinet', [
            'user' => Auth::user()
        ]);
    }
}
