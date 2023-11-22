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
        $grid->column('fish', __('Fish'));
        $grid->column('image', __('Image'));       
        $grid->column('custom_ball', __('Custom ball'));
        $grid->column('status', __('Status'));
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
        $show = new Show(Professor::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('fish', __('Fish'));
        $show->field('image', __('Image'));
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

        $form->text('fish', __('Professor F.I.SH'));
        $form->image('image')->image();   
        $form->decimal('custom_ball', __('To\'plagan bali'));
        $form->switch('status', __('Status'));

        return $form;
    }
}
