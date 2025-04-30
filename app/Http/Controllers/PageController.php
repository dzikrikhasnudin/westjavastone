<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        $pageExists = Page::where('slug', 'about-us')->exists();

        if($pageExists) {
            $page = Page::where('slug', 'about-us')->first();
            return view('page.about', compact('page'));
        } else {
            return abort(404);
        }
    }

    public function blog()
    {
        return view('page.blog');
    }
    public function blogPost(BlogPost $post)
    {
        return view('page.blog_post');
    }
}
