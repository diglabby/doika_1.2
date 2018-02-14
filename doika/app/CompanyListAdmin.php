<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyListAdmin extends Model
{
    //Формируем массив данных компаний
    static public function getListAdminPage(){
        $companies = Company::all();
        $companiesArr = [];
        foreach($companies as $company){
            $Arr['title']=$company->company_title;
            $Arr['id']=$company->id;
            if($company->company_active){
                $Arr['active']='On';
            }else{
                $Arr['active']='Off';
            }
            $Arr['required_amount']=$company->company_configurations()
                    ->first()->required_amount;
            $Arr['time_start']=$company->company_configurations()
                    ->first()->time_start;
            $Arr['time_start']= date('d.m.Y', strtotime($Arr['time_start']));
            $Arr['time_end']=$company->company_configurations()
                    ->first()->time_end;
            $Arr['time_end']=date('d.m.Y', strtotime($Arr['time_end']));
            
            $companiesArr['companies'][]=$Arr;
        }
        return $companiesArr; 
    }
}
