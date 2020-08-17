<?php

namespace App\Admin\Controllers;

use App\Service;

use App\UserProvider;
use App\Selectable\UserProviders;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ServiceController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Service';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Service());

        $grid->disableColumnSelector();
        $grid->column('service_id', __('ID'));
        //$grid->column('image','Image')->image();
        $grid->column('name', __('Nom du service'));
        $grid->column('description', __('Description'));
        

    
        
        
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
        $show = new Show(Service::findOrFail($id));

        $show->field('service_id', __('Service id'));
        $show->field('cat_id', __('Cat id'));
        $show->field('name', __('Name'));
        $show->field('image', __('Image'));
        $show->field('description', __('Description'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));


        $show->providers('Prestataires', function ($providers) {
            $providers->resource('/admin/user-providers');
            
            $providers->column('provider_id', __('ID'));

            $providers->column('price_home', __('Prix de base'));
            $providers->column('owner_firstname', __('Nom'));
            $providers->column('owner_lastname', __('Prenom'));
            
            
            
           
   

        });
        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Service());

        $form->number('cat_id', __('Cat id'));
        $form->textarea('name', __('Name'));
        $form->textarea('image', __('Image'));
        $form->textarea('description', __('Description'));

        
        $form->belongsToMany('providers',UserProviders::class,'Prestataire');

        return $form;
    }
}
