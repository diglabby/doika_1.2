<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //связи один-ко-многим, где модель является главной
    public function company_configurations(){
        return $this->hasMany('App\Company_configuration');
    }
    public function company_lang_informations(){
        return $this->hasMany('App\Company_lang_information');
    }
    public function payments(){
        return $this->hasMany('App\Payment');
    }
    
}
