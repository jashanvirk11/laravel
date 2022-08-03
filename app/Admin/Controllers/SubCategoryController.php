<?php

namespace App\Admin\Controllers;

use App\Models\SubCategory;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Models\Category;
use App\Models\Product;
Use Encore\Admin\Widgets\Table;

class SubCategoryController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'SubCategory';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new SubCategory());

        $grid->column('id', __('Id'));
        // $grid->column('category_id', __('Category id'));
         $grid->column('name', __('Name'))->expand(function ($model) {
        $data = Product::select('id','name','cover_photo')->where('sub_category_id',$model->id)->get();
            foreach($data as $key => $value) {
       
        $image = 'https://uniqueproducts.ca/unique/public/uploads/'.$data[$key]['cover_photo'];
            $data[$key]['cover_photo'] = "<img src='{$image}'  style='width:100px'";

        $edit_url = route('admin.products.edit',$data[$key]['id']);   
         $destroy_url= route('admin.products.destroy',$data[$key]['id']);
          $show_url= route('admin.products.show',$data[$key]['id']);

       $data[$key]['deleted_at']= "<a  href='$edit_url' class='btn btn-button btn-primary btn-sm'><i class='fa fa-edit'></i></a> <a  href='$show_url' class='btn btn-button btn-success btn-sm'><i class='fa fa-eye'></i></a> <a  href='$destroy_url' class='btn btn-buutton btn-danger btn-sm'><i class='fa fa-trash'></i></a>";
     
        
        }
       $data = $data->toArray();
       
       return new Table(['id', ' Name','Image','Action'],$data); 
        
        });
       
        // $grid->category_id('Category Name')->display(function($categoryid){
        //     return Category::find($categoryid)->name;
        // })->sortable();
        // $grid->column('name', __('Name'));
        $grid->column('additional_info', __('Additional info'));
        $grid->column('image', __('Image'))->image(asset('uploads/'), 100, 100);
        $grid->column('status', __('Status'))->switch();
      
  
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
        $show = new Show(SubCategory::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('category_id', __('Category id'));
        $show->field('name', __('Name'));
        $show->field('additional_info', __('Additional info'));
        $show->field('image', __('Image'));
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
        $form = new Form(new SubCategory());
        
        $category = Category::all();
        $categories = array();
        foreach($category as $category){
            $categories[$category->id] = $category->name;
           
        }
      
        $form->select('category_id', 'Category')->options($categories);
        $form->text('name', __('Name'));
        $form->text('additional_info', __('Additional info'));
        $form->image('image', __('Image'));
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
