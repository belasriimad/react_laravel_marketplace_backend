<?php

namespace App\Http\Controllers\Api;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;

class ReviewController extends Controller
{
    /**
     * Store new review
     */
    public function store(Request $request) 
    {
        $review = Review::where([
            'picture_id' => $request->picture_id,
            'user_id' => $request->user_id,
        ])->first();

        $order = Order::where([
            'picture_id' => $request->picture_id,
            'user_id' => $request->user_id,
        ])->first();

        if($review) {
            return response()->json([
                'error' => 'You have already reviewed this picture.'
            ]);
        }else if(!$order) {
            return response()->json([
                'error' => 'You can review only the pictures that you bought.'
            ]);
        }else {
            Review::create([
                'picture_id' => $request->picture_id,
                'user_id' => $request->user_id,
                'comment' => $request->comment,
                'rating' => $request->rating
            ]);
            return response()->json([
                'message' => 'You review has been added and will be published soon.'
            ]);
        }
    }

    /**
     * Update a review
     */
    public function updateReview(Request $request)
    {
        $review = Review::where([
            'picture_id' => $request->picture_id,
            'user_id' => $request->user_id,
        ])->first();

        if($review) {
            $review->update([
                'comment' => $request->comment,
                'rating' => $request->rating,
                'approved' => 0
            ]);
            return response()->json([
                'message' => 'You review has been updated and will be published soon.'
            ]);
        }else {
            return response()->json([
                'error' => 'Something went wrong try again later.'
            ]);
        }
    }

    /**
     * Delete review
     */
    public function deleteReview(Request $request)
    {
        $review = Review::where([
            'picture_id' => $request->picture_id,
            'user_id' => $request->user_id,
        ])->first();

        if($review) {
            $review->delete();
            return response()->json([
                'message' => 'You review has been deleted successfully.'
            ]);
        }else {
            return response()->json([
                'error' => 'Something went wrong try again later.'
            ]);
        }
    }
}
