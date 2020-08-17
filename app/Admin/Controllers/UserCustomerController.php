<?php

namespace App\Admin\Controllers;

use App\UserCustomer;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class UserCustomerController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Comptes utilisateur';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {

        $grid = new Grid(new UserCustomer());


        $grid->column('customer_id', __('ID'))->sortable();
 
        $grid->column('status', __('Etat du compte'))->display(function($status)
        {
            return $status?"actif":"inactif";

        }
    
    )
    
    ;
        $grid->column('first_name', __('Nom'));
        $grid->column('last_name', __('Prenom'));
        $grid->column('email', __('Email'));
        $grid->column('phone_number', __('Numero de téléphone'));
        

        $grid->column('password', __('Password'));
        $grid->column('remember_token', __('Remember token'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        
        $grid->filter(function($filter){
            $filter->like('first_name', 'Nom');
            $filter->like('last_name', 'Prenom');
            $filter->like('last_name', 'Prenom');
            $filter->in('status')->checkbox([
                true    => 'Actif',
                false    => 'Inactif',
                null=>'Non attribué'
            ]);
        
        });
        






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
        $show = new Show(UserCustomer::findOrFail($id));



        $show->field('customer_id', __('ID'));

        $show->field('first_name', __('Nom'));
        $show->field('last_name', __('Prenom'));
        $show->field('email', __('Email'));
        $show->field('phone_number', __('Numero de téléphone'));
        
        
        










        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new UserCustomer());


        
        

        $form->number('customer_id', __('ID'))->readonly();
        $form->text('first_name', __('Nom'))->readonly();
        $form->text('last_name', __('Prenom'))->readonly();
        $form->text('email', __('Email'))->readonly();
        $form->text('phone_number', __('Numero de téléphone'))->readonly();
        
        
        $form->switch('Etat du compte', __('Status'));

        
        $form->confirm('Voulez-vous vraiment modifier ce compte utilisateur?', 'edit');       

        return $form;
    }
}
