<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Wlist;

class CartController extends Controller
{
    
    public function addToCart(Request $request,$id) {

        if(($request->city && $request->state &&$request->postcode)){
           Session::put('city',$request->city);
           Session::put('state',$request->state);
           Session::put('postcode',$request->postcode);
        }
        
        // dd(Session::get('postcode'));
        
        // if(!(Session::has('postcode'))){
        //     Session::flash('pin_error','Pin code is required to know delivery availability');
        //     return redirect()->back();
        // }
        
        // if(!($request->city && $request->state &&$request->postcode)){
        //     Session::flash('pin_error','Pin code is required to know delivery availability');
        //     return redirect()->back();
        // }
        $product = Product::findOrFail($id);
         
        if($request->ajax()){
            if(Session::has('user_session'))
            {  
                $message = null;
                
                $product_exists = Cart::where([['user_id',Session::get('user_session')->id],['product_id',$product->id]])->first();
                if($product_exists)
                { 
                     $response = Cart::where('product_id',$product_exists->product_id)->update(['qty'=>$product_exists->qty + 1]);
            
                 $message ='Cart Updated Successfully';
                    
                }else{
                    
                $cart = new Cart;
                $cart->user_id = session()->get('user_session')->id;
                $cart->product_id =$product->id;
                $cart->product_name =$product->name ;
                $cart->price = $product->price;
                $cart->qty = 1;
                $cart->image = $product->cover_photo;
                $cart->save();
                
               $message ='Product added To the Cart Successfully';
                }
             
            $cart = Cart::where('user_id',Session::get('user_session')->id)->get();
            $count =  Cart::where('user_id',Session::get('user_session')->id)->count();
            $amount=0;
            
                $html='';
                $html.='<div class="offcanvas-cap navbar-shadow px-4 mb-2">';
                    $html.='<h5 class="mt-1 mb-0">Your cart1</h5>';
                    $html.='<button class="btn-close lead" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>';
                $html.='</div>';
                $html.=' <div class="offcanvas-body p-4" data-simplebar>';
                
                foreach($cart as $cart)
                {   
                    $single_product_url = route('single.product');
                    $remove_item_url = route('checkout.remove',$cart->id);
                    $image_url = asset('uploads') .'/'.$cart->image;
                    $checkout_url = route('checkout');
                    $amount += $cart->price * $cart->qty;
                    $html.='<div class="d-flex align-items-center mb-3"><a class="d-block flex-shrink-0" href='.$single_product_url.'><img class="rounded" src="'.$image_url.'" alt="Product" width="60"></a>';
                        $html.='<div class="w-100 ps-2 ms-1">';
                            $html.='<div class="d-flex align-items-center justify-content-between">';
                                $html.='<div class="me-3">';
                                    $html.='<h4 class="nav-heading fs-md mb-1"><a class="fw-medium" href="'.$single_product_url.'">'.$cart->product_name.'</a></h4>';
                                    $html.=' <div class="d-flex align-items-center fs-sm">';
                                        $html.='<span class="me-2">$ '.$cart->price.'</span><span class="me-2">x</span>';
                                        $html.='<input class="form-control form-control-sm px-2" type="text" style="max-width: 3.5rem;" min="1" value="'.$cart->qty.'" readonly>';
                                    $html.=' </div>';
                                $html.='</div>';
                                // $html.='<div class="ps-3 border-start"><a class="d-block text-danger text-decoration-none fs-xl" href="'.$remove_item_url.'" data-bs-toggle="tooltip" title="Remove"><i class="ai-x-circle"></i></a></div>';
                                $html .= "<div class='ps-3 border-start'><button type='button' class='btn btn-butto btn-sm bg-white removeProduct' data-id='$cart->id'><i class='ai-x-circle'></i></button></div>";
                            $html.='</div>';
                        $html.=' </div>';
                    $html.='</div>';
                }
            
                $html.='</div>';
                $html.='<div class="offcanvas-cap d-block border-top px-4 mb-2">';
                    $html.='<div class="d-flex justify-content-between mb-4"><span>Total:</span><span class="h6 mb-0">$  '.$amount.' </span></div><a class="btn btn-primary btn-sm d-block w-100" href="'.$checkout_url.'><i class="ai-credit-card fs-base me-2"></i>Checkout</a>';
                $html.='</div>';
            
         
            return response()->json(['data'=>$html,'response'=>'success','message'=>$message,'count'=>$count]); 
                
            }else{
                
                $message = null;
                    
                //  Session::flush();
                //  dd(session()->forget('cart'));
                //  dd(session()->get('cart'));
                //  for($i=1;$i<=count(session()->get('cart'));$i++){
                //      dd();
                //  }
                $cart = session()->get('cart');
               
              // if cart is empty then this the first product
                if(!$cart) {
                  $cart = [
                      $id=>[
                          'product_id'=>$id,
                          'name'=>$product->name,
                          'quantity'=>1,
                          'price'=>$product->price,
                          'image'=>$product->cover_photo,
                          ]
                      
                      ];
                      
                    session()->put('cart',$cart);
                    // dd(session()->get('cart'));
                    
                    // return response()->json(['data'=>'New Product Added To Cart','response'=>'success','message'=>'New Product Added To Cart']);
                    $message = 'New Product Added To Cart';
                }
              
              // if cart not empty then check if this product exist then increment quantity
                if(isset($cart[$id])) {
                //   dd($cart[$id]['quantity']);
                  $cart[$id]['quantity']++;
                 session()->put('cart', $cart);
                    // dd($cart[$id]['quantity']);
                //  return response()->json(['data'=>'Product Quatity added','response'=>'success','message'=>'Product Quantity added To Cart']);
                 $message = 'Product Quantity added To Cart';
                
                }else{
                  
                // if item not exist in cart then add to cart with quantity = 1
                $cart[$id] =[
                        'product_id'=>$id,
                        'name'=>$product->name,
                        'quantity'=>1,
                        'price'=>$product->price,
                        'image'=>$product->cover_photo,
                ];
                
                session()->put('cart', $cart);
                
                // return response()->json(['data'=>'New Product added to cart successfully!','response'=>'success','message'=>'New Product added to cart successfully!']);
                $message = 'New Product added to cart successfully!';
                }
                
               
            $count =  count(Session::get('cart'));
            $amount=0;
            
                $html='';
                $html.='<div class="offcanvas-cap navbar-shadow px-4 mb-2">';
                    $html.='<h5 class="mt-1 mb-0">Your cart2</h5>';
                    $html.='<button class="btn-close lead minus" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>';
                $html.='</div>';
                $html.=' <div class="offcanvas-body p-4" data-simplebar>';
                
                foreach(session()->get('cart') as $key => $value)
                {   
                    $single_product_url = route('single.product');
                    $remove_item_url = route('checkout.remove',session()->get('cart')[$key]['product_id']);
                    $image_url = asset('uploads') .'/'.session()->get('cart')[$key]['image'];
                    $checkout_url = route('checkout');
                    $amount += session()->get('cart')[$key]['price'] * session()->get('cart')[$key]['quantity'];
                    $html.='<div class="d-flex align-items-center mb-3"><a class="d-block flex-shrink-0" href='.$single_product_url.'><img class="rounded" src="'.$image_url.'" alt="Product" width="60"></a>';
                        $html.='<div class="w-100 ps-2 ms-1">';
                            $html.='<div class="d-flex align-items-center justify-content-between">';
                                $html.='<div class="me-3">';
                                        $html.='<h4 class="nav-heading fs-md mb-1"><a class="fw-medium" href="'.$single_product_url.'">'. session()->get('cart')[$key]['name'] .'</a></h4>';
                                    $html.=' <div class="d-flex align-items-center fs-sm">';
                                        $html.='<span class="me-2">$ '.session()->get('cart')[$key]['price'].'</span><span class="me-2">x</span>';
                                        $html.='<input class="form-control form-control-sm px-2" type="text" style="max-width: 3.5rem;" min="1" value="'.session()->get('cart')[$key]['quantity'].'" readonly>';
                                    $html.=' </div>';
                                $html.='</div>';
                                // $html.='<div class="ps-3 border-start"><a class="d-block text-danger text-decoration-none fs-xl" href="'.$remove_item_url.'" data-bs-toggle="tooltip" title="Remove"><i class="ai-x-circle"></i></a></div>';
                                 $html .= "<div class='ps-3 border-start'><button type='button' class='btn btn-butto btn-sm bg-white removeProduct' data-id='session()->get('cart')[$key]['product_id']'><i class='ai-x-circle'></i></button></div>";
                            $html.='</div>';
                        $html.=' </div>';
                    $html.='</div>';
                }
            
                $html.='</div>';
                $html.='<div class="offcanvas-cap d-block border-top px-4 mb-2">';
                    $html.='<div class="d-flex justify-content-between mb-4"><span>Total:</span><span class="h6 mb-0">$  '.$amount.' </span></div><a class="btn btn-primary btn-sm d-block w-100" href="'.$checkout_url.'><i class="ai-credit-card fs-base me-2"></i>Checkout</a>';
                $html.='</div>'; 
                
                
       
            return response()->json(['data'=>$html,'response'=>'success','message'=>$message,'count'=>$count]);
               
            }
            
        }
        
        
        if(Session::has('user_session'))
        {
            // dd($product->id);
            $product_exists = Cart::where([['user_id',Session::get('user_session')->id],['product_id',$product->id]])->first();
            if($product_exists)
            {
                $response = Cart::where('product_id',$product_exists->product_id)->update(['qty'=>$product_exists->qty + 1]);
                if($response){
                    Session::flash('success','Product added To the Cart Successfully');
                    return redirect()->back();
                }else{
                     Session::flash('error','Oops Something went Wrong While Updating Add To cart ');
                    return redirect()->back();
                }
            }else{
                
            $cart = new Cart;
            $cart->user_id = session()->get('user_session')->id;
            $cart->product_id =$product->id;
            $cart->product_name =$product->name ;
            $cart->price = $product->price;
            $cart->qty = $request->quantity ? $request->quantity : '1';
            $cart->image = $product->cover_photo;
            $cart->save();
            
             Session::flash('success','Product added To the Cart Successfully');
                    return redirect()->back();
               
            }
            
            
        }else{
            
        
        //  Session::flush();
        //  dd(session()->forget('cart'));
        //  dd(session()->get('cart'));
        //  for($i=1;$i<=count(session()->get('cart'));$i++){
        //      dd();
        //  }
        $cart = session()->get('cart');
       
      // if cart is empty then this the first product
      if(!$cart) {
          
          $cart = [
              $id=>[
                  'product_id'=>$id,
                  'name'=>$product->name,
                  'quantity'=>$request->quantity ? $request->quantity : '1',
                  'price'=>$product->price,
                  'image'=>$product->cover_photo,
                  ]
              
              ];
              
            session()->put('cart',$cart);
            // dd(session()->get('cart'));
            return redirect()->back()->with('success', 'Product added to cart successfully!');
      }
      
      // if cart not empty then check if this product exist then increment quantity
      if(isset($cart[$id])) {
        //   dd($cart[$id]['quantity']);
          $cart[$id]['quantity']++;
         session()->put('cart', $cart);
            // dd($cart[$id]['quantity']);
        //   dd('cart not empty then check if this product exist then increment quantity');
          return redirect()->back()->with('success', 'Product added to cart successfully!');
      }
      
      // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] =[
                'product_id'=>$id,
                'name'=>$product->name,
                'quantity'=>$request->quantity ? $request->quantity : '1',
                'price'=>$product->price,
                'image'=>$product->cover_photo,
        ];
        
        session()->put('cart', $cart);
        
        //  dd('item not exist in cart then add to cart with quantity = 1');
        return redirect()->back()->with('success', 'Product added to cart successfully!');
       
        }
    }
    
    
    // wishlist
  
     
     
    public function removeCheckout(Request $request ,$id) {
         
        if($request->ajax()){
            if(Session::has('user_session')){
                $html=null;
                $amount = 0;
                $response = Cart::where('id',$id)->delete();
                if($response){
                    
                    $all_cart_data = Cart::where([['status','!=','ordered'],['user_id',Session::get('user_session')->id]])->get();
                    
                    foreach($all_cart_data as $data){
                        $url = route('checkout.remove',$data->id);
                        $amount +=$data->price * $data->qty;
                        $image = asset('uploads').'/'.$data->image;
                        $html .= "<div class='d-flex align-items-center mb-3'>";
                            $html .= "<a class='d-block flex-shrink-0' href=''><img class='rounded' src='$image' alt='Product' width='60'></a>";
                            $html .= "<div class='w-100 ps-2 ms-1'>";
                                $html .= "<div class='d-flex align-items-center justify-content-between'>";
                                    $html .= "<div class='me-3'>";
                                        $html .= " <h4 class='nav-heading fs-md mb-1'><a class='fw-medium' href=''>$data->product_name</a></h4>";
                                         $html .= "<div class='d-flex align-items-center fs-sm'>";
                                            $html .= " <span class='me-2 price'>$ $data->price</span>";
                                            
                                            $html .= " <span class='me-2'>x</span>";
                                            $html .= " <span class='qty'>$data->qty</span>";
                                        $html .= "</div>";
                                    $html .= "</div>";
                                    
                                    $html .= "<div class=''>";
                                        $html .= " <div class='ps-3 border-start'>";
                                            $html .= "<button type='button' class='btn btn-butto btn-sm bg-white minus' data-id='$data->id'><i class='ai-minus'></i></button>";
                                            $html .= "<button type='button' class='btn btn-butto btn-sm bg-white plus' data-id='$data->id'><i class='ai-plus'></i></button>";
                                        $html .= "</div>";
                                    $html .= "</div>";
                               
                                    // $html .= "<div class='ps-3 border-start'><a class='d-block text-danger text-decoration-none fs-xl' href='$url' data-bs-toggle='tooltip' title='Remove'><i class='ai-x-circle'></i></a></div>";
                                    $html .= "<div class='ps-3 border-start'><button type='button' class='btn btn-butto btn-sm bg-white removeProduct' data-id='$data->id'><i class='ai-x-circle'></i></button></div>";
                                     
                                
                                $html .= "</div>";
                            $html .= "</div>";
                        $html .= "</div>";
                    
                    }
                    
                  
                    $tax = (13/100)*$amount;
                    $shipping_cost= $amount >=75 ? 0 : 50;
                    $total = $amount+$tax+$shipping_cost;
                    
                     $html .= " <hr class=mt-0 mb-4>";
                    $html .= " <div class='d-flex justify-content-between mb-3'><span class='h6 mb-0'>Subtotal:</span><span class='text-nav'>$  $amount  </span></div>";
                    $html .= " <div class='d-flex justify-content-between mb-3'><span class='h6 mb-0'>GST:</span><span class='text-nav'> $tax </span></div>";
                    $html .= " <div class='d-flex justify-content-between mb-3'><span class='h6 mb-0'>HST:</span><span class='text-nav'>$  $shipping_cost  </span></div>";
                    $html .= "<div class='d-flex justify-content-between mb-3'><span class='h6 mb-0'>Total:</span><span class='h6 mb-0'>$  $total  </span></div>";
                    $html .= "<button class='btn btn-primary d-block w-100 mt-5' id='#rzp-button1' type='button'>Place order</button>";
                   
                     return response()->json(['data'=>$html,'response'=>'success','message'=>'Cart Updated Successfully']); 
                    
                 }else{
                     
                   return response()->json(['response'=>'error','message'=>'Oops Something Went Wrong While Removing Product From Cart']); 
                }
         
            }else{
                
            $data = Session::get("cart");
            unset($data[$id]);
            // Session::forget('cart');
            Session::put('cart',$data);
            
            $count =  count(Session::get('cart'));
            $amount=0;
            
                $html='';
                $html.='<div class="offcanvas-cap navbar-shadow px-4 mb-2">';
                $html.='<h5 class="mt-1 mb-0">Your cart3</h5>';
                $html.='<button class="btn-close lead" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>';
                $html.='</div>';
                $html.=' <div class="offcanvas-body p-4" data-simplebar>';
                
                foreach(session()->get('cart') as $key => $value)
                {   
                    $single_product_url = route('single.product');
                    $remove_item_url = route('checkout.remove',session()->get('cart')[$key]['product_id']);
                    $image_url = asset('uploads') .'/'.session()->get('cart')[$key]['image'];
                    $checkout_url = route('checkout');
                    $amount += session()->get('cart')[$key]['price'] * session()->get('cart')[$key]['quantity'];
                    $html.='<div class="d-flex align-items-center mb-3"><a class="d-block flex-shrink-0" href='.$single_product_url.'><img class="rounded" src="'.$image_url.'" alt="Product" width="60"></a>';
                        $html.='<div class="w-100 ps-2 ms-1">';
                            $html.='<div class="d-flex align-items-center justify-content-between">';
                                $html.='<div class="me-3">';
                                        $html.='<h4 class="nav-heading fs-md mb-1"><a class="fw-medium" href="'.$single_product_url.'">'. session()->get('cart')[$key]['name'] .'</a></h4>';
                                    $html.=' <div class="d-flex align-items-center fs-sm">';
                                        $html.='<span class="me-2">$ '.session()->get('cart')[$key]['price'].'</span><a class="d-block flex-shrink-0" href='.$remove_item_url.'><span class="me-2">x</span></a>';
                                        $html.='<input class="form-control form-control-sm px-2" type="text" style="max-width: 3.5rem;" min="1" value="'.session()->get('cart')[$key]['quantity'].'" readonly>';
                                    $html.=' </div>';
                                $html.='</div>';
                                // $html.='<div class="ps-3 border-start"><a class="d-block text-danger text-decoration-none fs-xl" href="'.$remove_item_url.'" data-bs-toggle="tooltip" title="Remove"><i class="ai-x-circle"></i></a></div>';
                                 $html .= "<div class='ps-3 border-start'><button type='button' class='btn btn-butto btn-sm bg-white removeProduct' data-id='session()->get('cart')[$key]['product_id']'><i class='ai-x-circle'></i></button></div>";
                            $html.='</div>';
                        $html.=' </div>';
                    $html.='</div>';
                }
            
                $html.='</div>';
                $html.='<div class="offcanvas-cap d-block border-top px-4 mb-2">';
                    $html.='<div class="d-flex justify-content-between mb-4"><span>Total:</span><span class="h6 mb-0">$  '.$amount.' </span></div><a class="btn btn-primary btn-sm d-block w-100" href="'.$checkout_url.'><i class="ai-credit-card fs-base me-2"></i>Checkout</a>';
                $html.='</div>'; 
                
                
       
            return response()->json(['data'=>$html,'response'=>'removedfromsession','message'=>'Item Removed From Cart ','count'=>$count]);
                 
            }    
        }
         
       
        if(Session::has('user_session')){
          
             $response = Cart::where('id',$id)->delete();
            //   dd($response);
              if($response){
                  Session::flash('success','Product Removed From Cart');
              return redirect()->back();
              }else{
                 Session::flash('error','Oops Something Went Wrong While Removing Product From Cart');
              return redirect()->back(); 
              }
              
        }else{
        $data = Session::get("cart");
        unset($data[$id]);
       
        Session::put('cart',$data);
        
        return redirect()->back();
        //  return view('register-login',['checkout'=>true]);
         
        }
        
    }
    
    
    public function decreaseQuantity(Request $request,$id) {
        
         if($request->ajax()){
            $html=null;
            $amount = 0;
            $cart = Cart::findOrFail($id);
            if($cart->qty < 2){
              
                return response()->json(['data'=>'error','message'=>'Sorry , Its minimum Quantity']); 
            }
            $resposne = Cart::where([['id',$id],['user_id',Session::get('user_session')->id]])->update(['qty'=>$cart->qty - 1]);
           
            if($resposne) {

                $all_cart_data = Cart::where([['status','!=','ordered'],['user_id',Session::get('user_session')->id]])->get();
                 
                foreach($all_cart_data as $data){
                    $url = route('checkout.remove',$data->id);
                    $amount +=$data->price * $data->qty;
                    $image = asset('uploads').'/'.$data->image;
                    $html .= "<div class='d-flex align-items-center mb-3'>";
                        $html .= "<a class='d-block flex-shrink-0' href=''><img class='rounded' src='$image' alt='Product' width='60'></a>";
                        $html .= "<div class='w-100 ps-2 ms-1'>";
                            $html .= "<div class='d-flex align-items-center justify-content-between'>";
                                $html .= "<div class='me-3'>";
                                    $html .= " <h4 class='nav-heading fs-md mb-1'><a class='fw-medium' href=''>$data->product_name</a></h4>";
                                     $html .= "<div class='d-flex align-items-center fs-sm'>";
                                        $html .= " <span class='me-2 price'>$ $data->price</span>";
                                        $html .= " <span class='me-2'>x</span>";
                                        $html .= " <span class='qty'>$data->qty</span>";
                                    $html .= "</div>";
                                $html .= "</div>";
                                
                                $html .= "<div class=''>";
                                    $html .= " <div class='ps-3 border-start'>";
                                        $html .= "<button type='button' class='btn btn-butto btn-sm bg-white minus' data-id='$data->id'><i class='ai-minus'></i></button>";
                                        $html .= "<button type='button' class='btn btn-butto btn-sm bg-white plus' data-id='$data->id'><i class='ai-plus'></i></button>";
                                    $html .= "</div>";
                                $html .= "</div>";
                           
                                // $html .= "<div class='ps-3 border-start'><a class='d-block text-danger text-decoration-none fs-xl' href='$url' data-bs-toggle='tooltip' title='Remove'><i class='ai-x-circle'></i></a></div>";
                                 $html .= "<button type='button' class='btn btn-butto btn-sm bg-white removeProduct' data-id='$data->id'><i class='ai-x-circle'></i></button>";
                            
                            $html .= "</div>";
                        $html .= "</div>";
                    $html .= "</div>";
                
                }
                
              
                $tax = (13/100)*$amount;
                $shipping_cost= $amount >=75 ? 0 : 50;
                $total = $amount+$tax+$shipping_cost;
                
                 $html .= " <hr class=mt-0 mb-4>";
                $html .= " <div class='d-flex justify-content-between mb-3'><span class='h6 mb-0'>Subtotal:</span><span class='text-nav'>$  $amount  </span></div>";
                $html .= " <div class='d-flex justify-content-between mb-3'><span class='h6 mb-0'>GST:</span><span class='text-nav'> $tax </span></div>";
                $html .= " <div class='d-flex justify-content-between mb-3'><span class='h6 mb-0'>HST:</span><span class='text-nav'>$  $shipping_cost  </span></div>";
                $html .= "<div class='d-flex justify-content-between mb-3'><span class='h6 mb-0'>Total:</span><span class='h6 mb-0'>$  $total  </span></div>";
                $html .= "<button class='btn btn-primary d-block w-100 mt-5' id='#rzp-button1' type='button'>Place order</button>";
                
                 return response()->json(['data'=>$html,'response'=>'success','message'=>'Cart Updated Successfully']); 
            }
        }
        
        
        $cart = Cart::findOrFail($id);
        if($cart->qty < 2){
           $this->increaseQuantity($id); 
            return redirect()->back();
        }
       $resposne =  Cart::where('id',$id)->update(['qty'=>$cart->qty - 1]);
       if($resposne) {
           Session::flash('success','Cart Updated Successfully');
           return redirect()->back();
       }
        
    }
    
    public function increaseQuantity(Request $request,$id) {
        
        if($request->ajax()){
            $html=null;
            $amount = 0;
            $cart = Cart::findOrFail($id);
             $resposne = Cart::where([['id',$id],['user_id',Session::get('user_session')->id]])->update(['qty'=>$cart->qty + 1]);
           
            if($resposne) {
                
               $all_cart_data = Cart::where([['status','!=','ordered'],['user_id',Session::get('user_session')->id]])->get();
                  
                foreach($all_cart_data as $data){ 
                    
                     $url = route('checkout.remove',$data->id);
                    $amount +=$data->price * $data->qty;
                    $image = asset('uploads').'/'.$data->image;
                    $html .= "<div class='d-flex align-items-center mb-3'>";
                        $html .= "<a class='d-block flex-shrink-0' href=''><img class='rounded' src='$image' alt='Product' width='60'></a>";
                        $html .= "<div class='w-100 ps-2 ms-1'>";
                            $html .= "<div class='d-flex align-items-center justify-content-between'>";
                                $html .= "<div class='me-3'>";
                                    $html .= " <h4 class='nav-heading fs-md mb-1'><a class='fw-medium' href=''>$data->product_name</a></h4>";
                                     $html .= "<div class='d-flex align-items-center fs-sm'>";
                                        $html .= " <span class='me-2 price'>$ $data->price</span>";
                                        $html .= " <span class='me-2'>x</span>";
                                        $html .= " <span class='qty'>$data->qty</span>";
                                    $html .= "</div>";
                                $html .= "</div>";
                                
                                $html .= "<div class=''>";
                                    $html .= " <div class='ps-3 border-start'>";
                                        $html .= "<button type='button' class='btn btn-butto btn-sm bg-white minus' data-id='$data->id'><i class='ai-minus'></i></button>";
                                        $html .= "<button type='button' class='btn btn-butto btn-sm bg-white plus' data-id='$data->id'><i class='ai-plus'></i></button>";
                                    $html .= "</div>";
                                $html .= "</div>";
                           
                                // $html .= "<div class='ps-3 border-start'><a class='d-block text-danger text-decoration-none fs-xl' href='$url' data-bs-toggle='tooltip' title='Remove'><i class='ai-x-circle'></i></a></div>";
                                $html .= "<button type='button' class='btn btn-butto btn-sm bg-white removeProduct' data-id='$data->id'><i class='ai-x-circle'></i></button>";
                            
                            $html .= "</div>";
                        $html .= "</div>";
                    $html .= "</div>";
                
                }
                
              
                $tax = (13/100)*$amount;
                $shipping_cost= $amount >=75 ? 0 : 50;
                $total = $amount+$tax+$shipping_cost;
                
                 $html .= " <hr class=mt-0 mb-4>";
                $html .= " <div class='d-flex justify-content-between mb-3'><span class='h6 mb-0'>Subtotal:</span><span class='text-nav'>$  $amount  </span></div>";
                $html .= " <div class='d-flex justify-content-between mb-3'><span class='h6 mb-0'>GST:</span><span class='text-nav'> $tax </span></div>";
                $html .= " <div class='d-flex justify-content-between mb-3'><span class='h6 mb-0'>HST:</span><span class='text-nav'>$  $shipping_cost  </span></div>";
                $html .= "<div class='d-flex justify-content-between mb-3'><span class='h6 mb-0'>Total:</span><span class='h6 mb-0'>$  $total  </span></div>";
                $html .= "<button class='btn btn-primary d-block w-100 mt-5' id='#rzp-button1' type='button'>Place order</button>";
               
                 return response()->json(['data'=>$html,'response'=>'success','message'=>'Cart Updated Successfully']); 
            }
        }
        
        
        
        
        $cart = Cart::findOrFail($id);
        $resposne = Cart::where('id',$id)->update(['qty'=>$cart->qty + 1]);
        if($resposne) {
             Session::flash('success','Cart Updated Successfully');
           return redirect()->back();
        }
    }
    
    
}
