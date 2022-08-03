<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\User;
use Session;

class ProductController extends Controller
{
    public function getProductsByCategoryId($id) {
      
      
        //  $id = str_replace('-',' ',$id);
        // $id= ucwords($id);
        $category = Category::where('id',$id)->first(); 
 
         return view('shop.shop',['slug'=>$category,'page'=>'categorywise']);   
    }
    
     public function getProductsBySubCategoryId($id) {
     
        // $id = str_replace('-',' ',$id);
        // $id= ucwords($id);
        $category = SubCategory::distinct()->where('id',$id)->first();
        $product = Product::distinct()->where('sub_category_id',$category->id)->get(); 
 
         return view('shop.shop',['slug'=>$category,'product1'=>$product,'page'=>'subcategorywise']);
    }
    
    public function getProductById($id) {
     
        //  $id = str_replace('-',' ',$id);
        
        // $id= ucwords($id);
    
        if($id)
        { 
         
            $product = Product::where('id',$id)->first();
          
            return view('shop.product',['product'=>$product]);
        }else{
           
            return view('shop-all-product');
        }
       
    }
    // public function addToWishlist($id){
    //     Cart::instance('wishlist')->add($id)->associate('App\Models\Product');
    // }
    
    public function getAllProducts() {
        // $product = Product::findOrFail();
          return view('shop-all-product');
    }
    
}
