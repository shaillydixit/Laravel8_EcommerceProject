<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog\BlogPostCategory;
use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function BlogView()
    {
        $blogcategory =  BlogPostCategory::latest()->get();
        $blogpost = BlogPost::latest()->get();
        return view('frontend.blog.blog_view', compact('blogcategory', 'blogpost'));
    }

    public function SingleBlog($id)
    {
        $blogcategory =  BlogPostCategory::latest()->get();
        $blogpostt = BlogPost::latest()->limit(4)->get();
        $blogpost = BlogPost::findOrFail($id);
        return view('frontend.blog.single_blog', compact('blogcategory', 'blogpost', 'blogpostt'));
    }

    
}
