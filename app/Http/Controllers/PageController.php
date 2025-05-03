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

        if ($pageExists) {
            $page = Page::where('slug', 'about-us')->first();
            return view('page.about', compact('page'));
        } else {
            return abort(404);
        }
    }

    public function contact()
    {
        return view('page.contact');
    }

    public function blog()
    {
        $articles = BlogPost::latest()->get();

        return view('page.blog', compact('articles'));
    }
    public function blogPost(BlogPost $post)
    {
        return view('page.blog_post');
    }
}
