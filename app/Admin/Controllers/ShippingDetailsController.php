<?php

namespace App\Admin\Controllers;

use App\Models\ShippingDetail;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ShippingDetailsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'ShippingDetail';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new ShippingDetail());

        $grid->column('id', __('Id'));
        $grid->column('user_id', __('User id'));
        $grid->column('order_id', __('Order id'));
        $grid->column('name', __('Name'));
        $grid->column('country', __('Country'));
        $grid->column('state', __('State'));
        $grid->column('city', __('City'));
        $grid->column('address', __('Address'));
        $grid->column('landmark', __('Landmark'));
        $grid->column('postcode', __('Postcode'));
        // $grid->column('description', __('Description'));
        // $grid->column('deleted_at', __('Deleted at'));
        // $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->column('phone', __('Phone'));
        $grid->column('email', __('Email'));

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
        $show = new Show(ShippingDetail::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user_id', __('User id'));
        $show->field('order_id', __('Order id'));
        $show->field('name', __('Name'));
        $show->field('country', __('Country'));
        $show->field('state', __('State'));
        $show->field('city', __('City'));
        $show->field('address', __('Address'));
        $show->field('landmark', __('Landmark'));
        $show->field('postcode', __('Postcode'));
        $show->field('description', __('Description'));
        $show->field('deleted_at', __('Deleted at'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('phone', __('Phone'));
        $show->field('email', __('Email'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new ShippingDetail());

        $form->text('user_id', __('User id'));
        $form->text('order_id', __('Order id'));
        $form->text('name', __('Name'));
        $form->text('country', __('Country'));
        $form->text('state', __('State'));
        $form->text('city', __('City'));
        $form->text('address', __('Address'));
        $form->text('landmark', __('Landmark'));
        $form->text('postcode', __('Postcode'));
        $form->text('description', __('Description'));
        $form->mobile('phone', __('Phone'));
        $form->email('email', __('Email'));

        return $form;
    }
}
