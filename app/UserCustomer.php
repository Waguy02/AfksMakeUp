<?php

namespace App;


use Illuminate\Database\Eloquent\Model;


class UserCustomer extends Model
{
        protected $table='users_customer';
        protected $primaryKey = 'customer_id';
}
