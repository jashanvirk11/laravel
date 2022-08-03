<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
use App\Models\TempCart;
use App\Models\Cart;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\Order;
use App\Models\Wlist;
use App\Models\User;
use App\Models\Payment;
use App\Models\Setting;
use App\Models\Slider;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

      Paginator::useBootstrap();
         Schema::defaultStringLength(191); 
          
        View::composer('*', function ($view) {            
            if(session()->has('user_session')){
               $cart = Cart::where([['status','!=','ordered'],['user_id',session()->get('user_session')->id]])->get(); 
               $orders = Order::where([['user_id',session()->get('user_session')->id]])->get(); 
               $count = Cart::where([['status','!=','ordered'],['user_id',session()->get('user_session')->id]])->count(); 
            //   dd($count);
            $view->with(['cart'=>$cart,'count'=>$count,'orders'=>$orders]);  
            }
            
            
            
            
            $temp_cart = TempCart::all();
            $categories = Category::all();
            $subcategories = SubCategory::all();
            $products = Product::inRandomOrder()->paginate(12);
            $popular_product =   Product::where('popular','=','1')->get();
            $popular_product1 =   Product::where('popular','=','1')->get();
            $currency ="CAD";
           $date = date("y-12-31");
            $order_count = Order::count();
            $user_count = User::count();
            $product_count = Product::select('name')->distinct()->count();
            $payment_count = Payment::count();
    
     
            $view->with(['payment_count'=>$payment_count,'order_count'=>$order_count,'product_count'=>$product_count,'user_count'=>$user_count,'currency'=>$currency,'date'=>$date,'popular_product1'=>$popular_product1,'popular_product'=>$popular_product,'categories'=>$categories,'subcategories'=>$subcategories,'products'=>$products]);
           
        });
    }
}
