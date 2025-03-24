<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $blogs = Blog::all();
        return view('Blog.index', compact('blogs'));
    }

    /// function blog landing page///
    public function blogging(){

        // $data = Blog::all()->map(function ($blog) {
        //     $blog->description = strip_tags($blog->description);
        //     $blog->description = Str::limit($blog->description, 150, '...'); // Batasi deskripsi
        //     return $blog;
        // });

        return view ('LandingPage.BlogPage');
        // , compact('data')
    }

}
