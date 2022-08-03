<?php

namespace App\Admin\Controllers;

use App\Models\Payment;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PaymentController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Payment';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Payment());

        $grid->column('id', __('Id'));
        $grid->column('user_id', __('User id'));
        $grid->column('order_id', __('Order id'));
        $grid->column('transaction_id', __('Transaction id'));
        $grid->column('method', __('Method'));
        $grid->column('amount', __('Amount'));
        $grid->column('status', __('Status'));
        // $grid->column('bank', __('Bank'));
        $grid->column('isCaptured', __('IsCaptured'));
        // $grid->column('amount_refunded', __('Amount refunded'));
        // $grid->column('refund_status', __('Refund status'));
        // $grid->column('description', __('Description'));
        // $grid->column('wallet', __('Wallet'));
        // $grid->column('vpa', __('Vpa'));
        // // $grid->column('fee', __('Fee'));
        // $grid->column('tax', __('Tax'));
        // $grid->column('error_code', __('Error code'));
        // $grid->column('deleted_at', __('Deleted at'));
        // $grid->column('created_at', __('Created at'));
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
        $show = new Show(Payment::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user_id', __('User id'));
        $show->field('order_id', __('Order id'));
        $show->field('transaction_id', __('Transaction id'));
        $show->field('method', __('Method'));
        $show->field('amount', __('Amount'));
        $show->field('status', __('Status'));
        $show->field('bank', __('Bank'));
        $show->field('isCaptured', __('IsCaptured'));
        $show->field('amount_refunded', __('Amount refunded'));
        $show->field('refund_status', __('Refund status'));
        $show->field('description', __('Description'));
        $show->field('wallet', __('Wallet'));
        $show->field('vpa', __('Vpa'));
        $show->field('fee', __('Fee'));
        $show->field('tax', __('Tax'));
        $show->field('error_code', __('Error code'));
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
        $form = new Form(new Payment());

        $form->text('user_id', __('User id'));
        $form->text('order_id', __('Order id'));
        $form->text('transaction_id', __('Transaction id'));
        $form->text('method', __('Method'));
        $form->text('amount', __('Amount'));
        $form->text('status', __('Status'));
        $form->text('bank', __('Bank'));
        $form->switch('isCaptured', __('IsCaptured'));
        $form->switch('amount_refunded', __('Amount refunded'));
        $form->text('refund_status', __('Refund status'));
        $form->text('description', __('Description'));
        $form->text('wallet', __('Wallet'));
        $form->text('vpa', __('Vpa'));
        $form->text('fee', __('Fee'));
        $form->text('tax', __('Tax'));
        $form->text('error_code', __('Error code'));

        return $form;
    }
}
