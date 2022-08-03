<?php

namespace App\Admin\Controllers;

use App\Models\Order;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class OrderController extends AdminController
{
  /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Order';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Order());

        $grid->column('id', __('Id'));
        $grid->column('user_id', __('User id'));
        $grid->column('payment_id', __('Payment id'));
        $grid->column('product_ids', __('Product ids'));
        $grid->column('product_order_id', __('Order Id'));
        $grid->column('billing_customer_name', __('Name'));
        $grid->column('billing_email', __('Email'));
        $grid->column('billing_phone', __('Mobile'));
        $grid->column('qty', __('Qty'));
        $grid->column('weight', __('Weight'));
        $grid->column('shipping_charges', __('Delivery charges'));
        $grid->column('sub_total', __('Sub total'));
        $grid->column('gst', __('GST % '));
        $grid->column('total', __('Total'));
        
        // $grid->column('deleted_at', __('Deleted at'));
           $grid->column('created_at', __('Date:Time'));
        // $grid->column('updated_at', __('Updated at'));
        
        $grid->disableCreateButton();

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
        $show = new Show(Order::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user_id', __('User id'));
        $show->field('payment_id', __('Payment id'));
        $show->field('product_id', __('Product id'));
        $show->field('name', __('Name'));
        $show->field('sub_total', __('Sub total'));
        $show->field('qty', __('Qty'));
        $show->field('delivery_charge', __('Delivery charge'));
        $show->field('weight', __('Weight'));
        $show->field('status', __('Status'));
        $show->field('deleted_at', __('Deleted at'));
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
        $form = new Form(new Order());

    
        // $form->text('status', __('Status'));
        $directors = [
            'Inprogress'  => 'Inprogress',
            'Canceled' => 'Canceled',
            'Delivered'  => 'Delivered',
        ];

        $form->select('status', 'Status')->options($directors);
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