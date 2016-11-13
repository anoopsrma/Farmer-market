<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Review;
use Auth;
use App\User;
use App\Product;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
   public function postReview(Request $request, $id)
    {
    	$this->validate($request, [
            'title' => 'required|max:120',
            'description' => 'required|max:500',
        ]);


        $product = DB::table('products')->where('id', $id)->value('name');
    	$review = new Review();
    	$review->title = $request['title'];
    	$review->body = $request['description'];
    	$review->product_id = $id;
    	$review->user_id = Auth::user()->id;
        $review->username = Auth::user()->name;
        $review->userimage = Auth::user()->avatar;
        $review->productname=
    	$review->save();
        return Redirect::back();
 		
    	
}

    public function getReview()
    {
        $reviews = Review::latest();
        return view('/product/review', compact('reviews'));
    }
}
