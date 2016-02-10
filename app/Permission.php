<?php namespace App;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
    public function users(){
        return $this->belongsTo('App\User');
    }
}