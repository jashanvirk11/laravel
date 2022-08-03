<?php

namespace App\Admin\Controllers;

use App\Models\Product;
use App\Models\Order;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Models\SubCategory;
use Encore\Admin\Admin;
Use Encore\Admin\Widgets\Table;

class ProductController extends AdminController
{ 
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Product';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */ 
    protected function grid()
    {
        $grid = new Grid(new Product());
        
        // $grid->sub_category_id('SubCategory Name')->display(function($sub_category_id) {
        //     return SubCategory::find($sub_category_id)->name;
        // });
        
        $grid->column('name', __('Name'));
        $grid->column('cover_photo', __('cover_photo'))->image(asset('uploads/'), 100, 100);
        $grid->column('price', __('Price'));
        $grid->column('offer_price', __('Offer price'));
        $grid->column('dealer_price', __('Dealer price'));
        // $grid->column('weight', __('Weight ( gm )'));
        $grid->column('gst', __('GST %'));
        $grid->column('qty', __('Qty'));
        $grid->column('total_qty', __('Total QTY')); 
        $grid->column('remaining_qty', __('Remaining QTY')); 
        
        $grid->filter(function($filter){
        
        // Remove the default id filter
        $filter->disableIdFilter();
        
        // Add a column filter
        $filter->like('name', __('Name'));
        
        $subcategoryArray =[];
        $subcategory = subcategory::all();
        foreach($subcategory as $subcategory){
        $subcategoryArray[$subcategory->id] = $subcategory->name;
        }
        $filter->in('sub_category_id', 'Sub Category')->multipleSelect($subcategoryArray);
        
        });
        
        $grid->column('popular')->bool();
        $grid->column('status', __('Status'));
        
        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Product::findOrFail($id));

        
         $show->sub_category_id('SubCategory Name')->display(function($sub_category_id) {
            return SubCategory::find($sub_category_id)->name;
        });
        $show->field('name', __('Name'));
        $show->image('cover_photo', __('Cover photo'));
        $show->field('price', __('Price'));
        $show->field('offer_price', __('Offer price'));
        $show->field('dealer_price', __('Dealer price'));
        $show->field('weight', __('Weight'));
        $show->field('qty', __('Qty'));
        $show->field('total_qty', __('Total qty'));
        $show->field('slug', __('Slug'));
        $show->field('additonal_info', __('Additonal info'));
        $show->field('status', __('Status'));
  

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Product());

        $category = SubCategory::all();
        $categories = array();
        foreach($category as $category){
            $categories[$category->id] = $category->name;
           
        }
        
        
        $form->select('sub_category_id', 'Category')->options($categories)->required();
        $form->text('name', __('Name'))->required();
        $form->image('cover_photo', __('Cover photo'))->required();
        $form->image('image.image1');
        $form->image('image.image2');
        $form->image('image.image3');
        $form->image('image.image4');
        $form->text('price', __('Price'))->default('0');
        // $form->text('offer_price', __('Offer price'));
        $form->text('dealer_price', __('Dealer price'));
        // $form->text('weight', __('Weight in Grams'))->required();
        $form->text('qty', __('Qty'))->rules('required|regex:/^\d+$/', ['regex' => 'field must be numbers',]);
        $form->text('total_qty', __('Total qty'))->required();
        $form->hidden('remaining_qty');
        $form->text('slug', __('Slug')); 
        $form->text('popular', __('Popular'))->placeholder('Please 0 for non popular and 1 for popular product');;
        $form->textarea('additonal_info', __('Additonal info'));
        $form->text('status', __('Status'))->default('active');
        //   $form->text('discount', __('discount'));
        $form->text('description1', __('description1'));
        $form->text('description2', __('description2'));
        $form->text('description3', __('description3'));
        // $form->text('description4', __('description4')); 
        // callback before save
       
            $form->saving(function (Form $form) {
                 if($form->isCreating()){
                     $form->remaining_qty =  $form->total_qty;
                 }
                 if($form->isEditing()){
                     $form->remaining_qty =  $form->total_qty;
                 }
            });
    
        
        
         $form->footer(function ($footer) {

        // disable reset btn
        $footer->disableReset();
    
        // disable `View` checkbox
        $footer->disableViewCheck();
    
        // disable `Continue editing` checkbox
        $footer->disableEditingCheck();
    
        // disable `Continue Creating` checkbox
        $footer->disableCreatingCheck();
    
      });
        

        return $form;
    }
}
