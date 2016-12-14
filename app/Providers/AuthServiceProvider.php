<?php

namespace App\Providers;
use Illuminate\Auth\Access\Gate;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
/**
* The policy mappings for the application.
*
* @var array
*/
     protected $policies = [
     'App\Model' => 'App\Policies\ModelPolicy',
     ];

/**
* Register any application authentication / authorization services.
*
* @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
* @return void
*/
public function boot(GateContract $gate)
{
     $this->registerPolicies($gate);
     $gate->define('orgs', function ($users){
     return $users->auth_name=='manager';});
     $gate->define('client', function ($users){
     return $users->auth_name=='manager';});

     $gate->define('show',function ($users){

     return $users->auth_name=='user' || $users->auth_name=='manager'; });

     }
}
