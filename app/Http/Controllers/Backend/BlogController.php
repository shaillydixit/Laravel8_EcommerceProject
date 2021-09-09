<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog\BlogPostCategory;
use App\Models\BlogPost;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    public function BlogCategory()
    {
        $blogCategory = BlogPostCategory::latest()->get();
        return view('backend.blog.category.blog_category', compact('blogCategory'));
    }

    public function StoreBlogCategory(Request $request)
    {
        $request->validate([
            'blog_category_name' => 'required'
        ]);

        BlogPostCategory::insert([
            'blog_category_name' => $request->blog_category_name,
            'blog_category_slug' => strtolower(str_replace(' ', '-', $request->blog_category_name)),
            'created_at' => Carbon::now(),
        ]);

        $notification = [
            'message' => 'Blog category added successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }

    public function EditBlogCategory($id)
    {
        $blogCategory = BlogPostCategory::findOrFail($id);
        return view('backend.blog.category.blog_category_edit', compact('blogCategory'));
    }

    public function UpdateBlogCategory(Request $request, $id)
    {
        BlogPostCategory::findOrFail($id)->update([
            'blog_category_name' => $request->blog_category_name,
            'blog_category_slug' => strtolower(str_replace(' ', '-', $request->blog_category_name)),
            'updated_at' => Carbon::now(),
        ]);


        $notification = [
            'message' => 'Blog category updated successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('blog.category')->with($notification);
    }

    public function DeleteBlogCategory($id)
    {
        BlogPostCategory::findOrFail($id)->delete();

        $notification = [
            'message' => 'Blog category deleted successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }

    public function AddBlogPost()
    {
        $blogCategory = BlogPostCategory::latest()->get();
        $blogpost = BlogPost::latest()->get();
        return view('backend.blog.post.post_view', compact('blogpost', 'blogCategory'));
    }

    public function ListBlogPost()
    {
        $blogpost = BlogPost::with('blogcategory')->latest()->get();
        return view('backend.blog.post.post_list', compact('blogpost'));
    }

    public function StoreBlogPost(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'post_title' => 'required',
            'post_image' => 'required',
        ]);
        $image = $request->file('post_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(780, 433)->save('upload/blog/' . $name_gen);
        $save_url = 'upload/blog/' . $name_gen;

        BlogPost::insert([
            'category_id' => $request->category_id,
            'post_title' => $request->post_title,
            'post_slug' => strtolower(str_replace(' ', '-', $request->post_title)),
            'post_image' => $save_url,
            'post_details' => $request->post_details,
            'created_at' => Carbon::now(),
        ]);

        $notification = [
            'message' => 'Blog Post listed successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('list.blog.post')->with($notification);
    }

    public function EditBlogPost($id)
    {
        $blogCategory = BlogPostCategory::latest()->get();
        $blogpost = BlogPost::findOrFail($id);
        return view('backend.blog.post.post_edit', compact('blogpost', 'blogCategory'));
    }

    public function UpdateBlogPost(Request $request, $id)
    {
        $old_img = $request->old_image;
        if ($request->file('post_image')) {
            unlink($old_img);
            $image = $request->file('post_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(780, 433)->save('upload/blog/' . $name_gen);
            $save_url = 'upload/blog/' . $name_gen;
            BlogPost::findOrFail($id)->update([
                'category_id' => $request->category_id,
                'post_title' => $request->post_title,
                'post_slug' => strtolower(str_replace(' ', '-', $request->post_title)),
                'post_image' => $save_url,
                'post_details' => $request->post_details,
                'updated_at' => Carbon::now(),
            ]);
            $notification = [
                'message' => 'Blog Post Updated Successfully!',
                'alert-type' => 'warning'
            ];

            return redirect()->route('list.blog.post')->with($notification);
        } else {
            BlogPost::findOrFail($id)->update([
                'category_id' => $request->category_id,
                'post_title' => $request->post_title,
                'post_slug' => strtolower(str_replace(' ', '-', $request->post_title)),
                'post_details' => $request->post_details,
                'updated_at' => Carbon::now(),
            ]);
            $notification = [
                'message' => 'Blog Post Updated Successfully!',
                'alert-type' => 'warning'
            ];

            return redirect()->route('list.blog.post')->with($notification);
        }
    }

    public function DeleteBlogPost($id)
    {
        $blogpost = BlogPost::findOrFail($id);
        $img = $blogpost->post_image;
        unlink($img);

        BlogPost::findOrFail($id)->delete();

        $notification = [
            'message' => 'Blog Post Deleted Successfully!',
            'alert-type' => 'error'
        ];

        return redirect()->back()->with($notification);
    }
}
