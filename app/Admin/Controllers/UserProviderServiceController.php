<?php

namespace App\Admin\Controllers;

use App\UserProvider;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class UserProviderServiceController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Comptes prestataires';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new UserProvider());

        $grid->column('provider_id', __('Provider id'));
        
        
        $grid->column('account_id', __('Account id'));
        $grid->column('status', __('Etat du compte'))->display(function($status)
        {
            return $status?"actif":"inactif";

        });
    
        $grid->column('owner_firstname', __('Nom'));
        $grid->column('owner_lastname', __('Prneom'));
        $grid->column('owner_email', __('email'));
        $grid->column('owner_phone', __('Telephone'));
        //$grid->column('is_available', __('Is available'));
        
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
        $show = new Show(UserProvider::findOrFail($id));

        $show->field('provider_id', __('Provider id'));
        $show->field('account_id', __('Account id'));
        $show->field('owner_firstname', __('Owner firstname'));
        $show->field('owner_lastname', __('Owner lastname'));
        $show->field('owner_email', __('Email'));
        $show->field('owner_phone', __('Telephone'));
        $show->field('password', __('Password'));
        $show->field('remember_token', __('Remember token'));
        $show->field('status', __('Status'));
        $show->field('name', __('Name'));
        $show->field('is_available', __('Is available'));
        $show->providers('Services', function ($providers) {
            $providers->resource('/admin/services');
            
            $providers->column('service_id', __('ID'));

            $providers->column('name', __('Nom'));
            $providers->column('description', __('Description'));
            
            
        }) ;   
            
           
   

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new UserProvider());

        $form->number('account_id', __('Account id'));
        $form->textarea('owner_firstname', __('Owner firstname'));
        $form->textarea('owner_lastname', __('Owner lastname'));
        $form->textarea('owner_email', __('Owner email'));
        $form->textarea('owner_phone', __('Owner phone'));
        $form->textarea('password', __('Password'));
        $form->text('remember_token', __('Remember token'));
        $form->switch('Etat du compte', __('Status'));
        $form->textarea('name', __('Name'));
        $form->switch('is_available', __('Is available'));

        return $form;
    }
}
