<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display all the reviews
     */
    public function index()
    {
        $reviews = Review::latest()->get();
        return view('admin.reviews.index')->with([
            'reviews' => $reviews
        ]);
    }

    /**
     * Approve and disapprove reviews
     */
    public function toggleReviewStatus(Review $review, $status)
    {
        $review->update([
            'approved' => $status
        ]);

        return redirect()->route('admin.reviews.index')->with([
            'success' => 'Review has been updated successfully'
        ]);
    }

    /**
     * Delete review
     */
    public function destroy(Review $review)
    {
        $review->delete();

        return redirect()->route('admin.reviews.index')->with([
            'success' => 'Review has been deleted successfully'
        ]);
    }
}
