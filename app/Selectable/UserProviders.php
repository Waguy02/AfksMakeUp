<?php

namespace App\Selectable;

use App\UserProvider;
use Encore\Admin\Grid\Filter;
use Encore\Admin\Grid\Selectable;

class UserProviders extends Selectable
{
    public $model = UserProvider::class;

    public function make()
    {
        $this->column('provider_id');
        $this->column('owner_firstname');
        $this->column('owner_email');
        $this->column('price_home');

        
        $this->column('created_at');

        $this->filter(function (Filter $filter) {
            $filter->like('owner_firstname');
        });
    }
}