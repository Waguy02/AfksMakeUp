<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use App\Service;
use App\ServiceProvider;
class UserProvider extends Model
{
        protected $table='users_providers';
        protected $primaryKey = 'provider_id';


        public function services()
        {
            return $this->belongsToMany(Service::class,'serv_service_provider') ->withPivot([
                'price_home',
                'price_provider'
            ]);;
        }
}
