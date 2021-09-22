<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function StoreReview(Request $request)
    {
        $product = $request->product_id;

        $request->validate([
            'summary' => 'required',
            'comment' => 'required',
        ]);

        Review::insert([
            'product_id' => $product,
            'user_id' => Auth::id(),
            'rating' => $request->rating,
            'comment' => $request->comment,
            'summary' => $request->summary,
            'created_at' => Carbon::now(),
        ]);

        $notification = [
            'message' => 'Product Review Submitted Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }

    // backend for admin
    public function PendingReview()
    {
        $review = Review::where('status', 0)->orderBy('id', 'DESC')->get();
        return view('backend.reviews.pending_reviews', compact('review'));
    }

    public function ReviewApprove($id)
    {
        Review::where('id', $id)->update(['status' => 1]);

        $notification = [
            'message' => 'Review Approved Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }

    public function ReviewDelete($id)
    {
        Review::where('id', $id)->delete();
        $notification = [
            'message' => 'Review Deleted Successfully',
            'alert-type' => 'info',
        ];

        return redirect()->back()->with($notification);
    }

    public function PublishReview()
    {
        $review = Review::where('status', 1)->orderBy('id', 'DESC')->paginate(6);
        return view('backend.reviews.publish_reviews', compact('review'));
    }
}
