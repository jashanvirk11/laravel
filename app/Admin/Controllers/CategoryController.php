<?php

namespace App\Admin\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use Encore\Admin\Controllers\AdminController;
Use Encore\Admin\Widgets\Table;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CategoryController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Category';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
       $grid = new Grid(new Category());

        $grid->column('id', __('Id'));
       
        $grid->column('name', __('Name'))->expand(function ($model) {
        $data = SubCategory::select('id','name','image','deleted_at')->where('category_id',$model->id)->get();
          
        foreach($data as $key => $value) {
        $image =env('APP_URL').'/unique/public/uploads/'.$data[$key]['image'];
    
            $data[$key]['image'] = "<img src='{$image}' style='width:70px'";  
             
        $edit_url = route('admin.sub-categories.edit',$data[$key]['id']);   
         $destroy_url= route('admin.sub-categories.destroy',$data[$key]['id']);
          $show_url= route('admin.sub-categories.show',$data[$key]['id']);

       $data[$key]['deleted_at']= "<a  href='$edit_url' class='btn btn-button btn-primary btn-sm'><i class='fa fa-edit'></i></a> <a  href='$show_url' class='btn btn-button btn-success btn-sm'><i class='fa fa-eye'></i></a> <a  href='$destroy_url' class='btn btn-buutton btn-danger btn-sm'><i class='fa fa-trash'></i></a>";
     
        
        }
       $data = $data->toArray();
   
        return new Table(['id', ' Name','Image','Action'],$data); 
        
        });
       

        $grid->column('image', __('Image'))->image(asset('uploads/'), 100, 100);
        // $grid->column('image', __('Image'));
        $grid->column('additional_info', __('Additional info'));
        $grid->column('status', __('Status'));
        // $grid->column('deleted_at', __('Deleted at'));
        // $grid->column('created_at', __('Created at'));
        // $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(Category::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->image('image', __('Image'));
        $show->field('additional_info', __('Additional info'));
        $show->field('status', __('Status'));
        // $show->field('deleted_at', __('Deleted at'));
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
        $form = new Form(new Category());

        $form->text('name', __('Name'));
        $form->file('image', __('Image'));
        $form->text('additional_info', __('Additional info'));
        $form->switch('status', __('Status'))->default(1);

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
