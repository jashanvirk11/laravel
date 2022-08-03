<?php

namespace App\Admin\Controllers;

use App\Models\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class UsersController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'User';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('email', __('Email'));
        $grid->column('phone', __('Phone'));
        $grid->column('password', __('Password'));
        $grid->column('verification_code', __('Verification code'));
        $grid->column('verify', __('Verify'));
        $grid->column('profile', __('Profile'));
        $grid->column('dob', __('Dob'));
        $grid->column('country', __('Country'));
        $grid->column('state', __('State'));
        $grid->column('city', __('City'));
        $grid->column('zip', __('Zip'));
        $grid->column('street', __('Street'));
        $grid->column('landmark', __('Landmark'));
        $grid->column('last_seen', __('Last seen'));
        $grid->column('status', __('Status'));
        $grid->column('agent', __('Agent'));
        $grid->column('agent_id', __('Agent id'));
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
        $show = new Show(User::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('email', __('Email'));
        $show->field('phone', __('Phone'));
        $show->field('password', __('Password'));
        $show->field('verification_code', __('Verification code'));
        $show->field('verify', __('Verify'));
        $show->field('profile', __('Profile'));
        $show->field('dob', __('Dob'));
        $show->field('country', __('Country'));
        $show->field('state', __('State'));
        $show->field('city', __('City'));
        $show->field('zip', __('Zip'));
        $show->field('street', __('Street'));
        $show->field('landmark', __('Landmark'));
        $show->field('last_seen', __('Last seen'));
        $show->field('status', __('Status'));
        $show->field('agent', __('Agent'));
        $show->field('agent_id', __('Agent id'));
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
        $form = new Form(new User());

        $form->text('name', __('Name'));
        $form->email('email', __('Email'));
        $form->mobile('phone', __('Phone'));
        $form->password('password', __('Password'));
        $form->text('verification_code', __('Verification code'));
        $form->switch('verify', __('Verify'));
        $form->text('profile', __('Profile'));
        $form->text('dob', __('Dob'));
        $form->text('country', __('Country'));
        $form->text('state', __('State'));
        $form->text('city', __('City'));
        $form->text('zip', __('Zip'));
        $form->text('street', __('Street'));
        $form->text('landmark', __('Landmark'));
        $form->text('last_seen', __('Last seen'));
        $form->text('status', __('Status'))->default('active');
        $form->switch('agent', __('Agent'));
        $form->switch('agent_id', __('Agent id'));

        return $form;
    }
}
