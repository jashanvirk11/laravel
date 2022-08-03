<?php

namespace App\Admin\Controllers;

use App\Models\Review;
use App\Models\Product;
use App\Models\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ReviewController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Review';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Review());

        $grid->column('id', __('Id'));
         $grid->product_id('Product Name')->display(function($product_id){
            return Product::find($product_id)['name'];
        })->sortable();
        $grid->user_id('Customer Name')->display(function($customer_id){
            return User::find($customer_id)->name;
        })->sortable();
        $grid->column('message', __('Message'));
        $grid->column('rating', __('Rating'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(Review::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user_id', __('User id'));
        $show->field('product_id', __('Product id'));
        $show->field('message', __('Message'));
        $show->field('rating', __('Rating'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Review());
        
        $product = Product::all();
        $products = array();
        foreach($product as $product){
            $products[$product->id] = $product->name;
           
        }
        $customer = User::all();
        $customers = array();
        foreach($customer as $customer){
            $customers[$customer->id] = $customer->name;
           
        }
        $form->select('user_id', 'Customer')->options($customers)->required();
        $form->select('product_id', 'Product')->options($products)->required();
        
        
        // $form->number('user_id', __('User id'));
        // $form->number('product_id', __('Product id'));
        $form->text('message', __('Message'));
        $form->number('rating', __('Rating'));

        return $form;
    }
}
