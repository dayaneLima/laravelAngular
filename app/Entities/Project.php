<?php

namespace CodeProject\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Project extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [];

    public function owner(){
        return $this->hasOne('CodeProject\Entities\User','id','owner_id');
    }

    public function client(){
        return $this->hasOne('CodeProject\Entities\Client','id','client_id');
    }

}