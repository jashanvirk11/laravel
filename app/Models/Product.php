<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Cart;
use App\Models\product;
use App\Models\Wlist;
use Session;

class Product extends Model
{
    use HasFactory;
     
      public function images(){
		return $this->hasMany(Image::class);
	}
	
	public function category()
    {
    	return $this->belongsTo(Category::class);
    }
    
    public function subcategory()
    {
    	return $this->belongsTo(SubCategory::class);
    }
    
     public function categoryName($subcategory_id)
    {
        $subcategory = SubCategory::where('id',$subcategory_id)->first();
        $category = Category::where('id',$subcategory->category_id)->first();
    	return $category->name;
    }
    
     public function subcategoryName($id)
    {
        $category = SubCategory::findOrFail($id);
    	return $category->name;
    }
    
    public function isCart($id) {
        $response = Cart::where([['status','!=','ordered'],['user_id',Session::get('user_session')->id],['product_id',$id]])->first();
        // dd(Session::get('user_session')->id);
        if($response)
        {
            return true;
            
        }else{
            
            return false;
        }
    }
    
   
    
    public function getAllProductsByCategoryId($id_to_gt_products,$subcategory_id){
        $subcategory = SubCategory::where('id',$subcategory_id)->first();
         if(!$subcategory){
             
            return false;
        }
        
       else{
           if($subcategory->category_id == $id_to_gt_products){
               return true;
           }else{
              return false;  
           }
           
        }
        
    }
    
      public function getAllProductsBySubCategoryId($id_to_gt_products , $subcategory_id){
          
          $subcategory_exits  =  SubCategory::where('id',$subcategory_id)->first();
          
          if(!$subcategory_exits){
              return false;
          }
          
          if($subcategory_exits->id == $id_to_gt_products ){
              return true;
          }else{
              return false;  
           }
          
      }
      public function wishlist($product_id){
          if(session()->has('user_session')){
              
              $product = Wlist::where([['product_id',$product_id],['user_id',session()->get('user_session')->id]])->first();
              if($product){
                  return true;
              }
              else{
                  return false;
              }
        }else{
            return false;
        }
      }
}
