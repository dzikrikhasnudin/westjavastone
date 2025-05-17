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
        $pageExists = Page::where('slug', 'contact-us')->exists();

        if ($pageExists) {
            $page = Page::where('slug', 'contact-us')->first();
            return view('page.contact', compact('page'));
        } else {
            return abort(404);
        }
    }

    public function blog()
    {
        $articles = BlogPost::latest()->get();

        return view('page.blog', compact('articles'));
    }

    public function article($slug)
    {
        $post = BlogPost::where('slug', $slug)->first();
        // dd($post);
        return view('page.article', compact('post'));
    }
}
