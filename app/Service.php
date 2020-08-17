<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use App\UserProvider;
use App\ServiceProvider;
class Service extends Model
{
        protected $table='serv_service';
        protected $primaryKey = 'service_id';

        public function providers   ()
        {
            return $this->belongsToMany(UserProvider::class,'serv_service_provider','provider_id','service_id')
            ->withPivot([
                'price_home',
                'price_provider'
            ]);
        }



}
