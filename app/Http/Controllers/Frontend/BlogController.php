<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog\BlogPostCategory;
use App\Models\BlogComments;
use App\Models\BlogPost;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function CategoryBlog($category_id)
    {

        $blogcategory =  BlogPostCategory::latest()->get();
        $blogpost = BlogPost::where('category_id', $category_id)->orderBy('id', 'DESC')->get();
        return view('frontend.blog.category_blog', compact('blogcategory', 'blogpost'));
    }

    public function BlogComment(Request $request)
    {
        BlogComments::insert([
            'user_id' => Auth::user()->name,
            'comment' => $request->comment,
            'created_at' => Carbon::now(),
        ]);

        $notification = [
            'message' => 'Comment Send Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }
}
