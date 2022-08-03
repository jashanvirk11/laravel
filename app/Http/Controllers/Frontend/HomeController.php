<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\SubCategory;
use App\Models\User;
use App\Models\Review;
use Seshac\Shiprocket\Shiprocket;

class HomeController extends Controller
{
    public function index() {
              $reviews = Review::all();
          
        return view('home',['reviews'=>$reviews]);
    } 
    
    // public function about() {
    //     return view('pages.about');
    // }
    
    // public function benefit() {
    //     return view('pages.benefit');
    // }
    
    
    // public function privacy(){
    //     return view('privacy-policy');
    // }
    
    // public function terms(){
    //     return view('terms-and-condition');
    // }
}

