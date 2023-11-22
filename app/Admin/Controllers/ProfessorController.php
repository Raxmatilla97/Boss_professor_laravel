<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Professor;

class ProfessorController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Professor';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Professor());

        $grid->column('id', __('Id'));
        $grid->column('fish', __('Familya ism sharifi'));
        $grid->column('image', __("Surat"))->image('', 100, 100);        
       
        $grid->column('custom_ball', __("Ballari"))->label('success');
        $grid->column('status')->using([
            0 => 'Aktiv emas!',
            1 => 'Aktiv holatda!'           
        ], 'Unknown')->dot([
            0 => 'danger',
            1 => 'info',          
        ], 'warning');
        $grid->column('created_at', __('Yaratilgan vaqt'))->dateFormat('Y-m-d');
        $grid->column('updated_at', __('Yangilangan vaqt'))->dateFormat('Y-m-d');

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
        $show = new Show(Professor::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('fish', __('Fish'));
        $show->field('image', __('Image'));
        $show->field('slug', __('Slug'));
        $show->field('small_desc', __('Small desc'));
        $show->field('custom_ball', __('Custom ball'));
        $show->field('status', __('Status'));
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
        $form = new Form(new Professor());       
        
        $form->tab("Asosiy professor haqidagi ma'lumotlar", function ($form) {

            $form->text('fish', __('Professor familya ismi'));
            $form->image('image', __('Surati'));
            // $form->text('slug', __('Slug'));
            $form->textarea('small_desc', __('Professor haqida qisqacha'));
            $form->decimal('custom_ball', __("Ball qo'shish"));
            $form->switch('status', __('Status holati'));

        
        })->tab("Moderator qo'shish", function ($form) {
        
            $form->text('fish', __('Fish'));
        
        })->tab('Image', function ($form) {
        
            $form->text('fish', __('Fish'));
        
        });


        return $form;
    }
}
