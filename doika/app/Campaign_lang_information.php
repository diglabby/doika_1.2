<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign_lang_information extends Model
{
    //����� ������ ����-��-������ � ������� ��� �������� ��������
    public function campaign(){
        return $this->belongsTo('App\Campaign');
    }
}
