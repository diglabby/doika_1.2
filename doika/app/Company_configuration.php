<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company_configuration extends Model
{
    //связи модели один-ко-многим в которых она является дочерней
    public function company(){
        return $this->belongsTo('App\Company');
    }
}
