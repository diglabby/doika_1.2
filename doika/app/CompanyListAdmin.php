<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyListAdmin extends Model
{
    //Формируем массив данных компаний
    static public function getListAdminPage($companies = 0){
        if($companies === 0){
           $companies = Company::all();
        
        }
        $companiesArr = [];
        foreach($companies as $company){
            $Arr['title']=$company->company_title;
            $Arr['id']=$company->id;
            if($company->company_active){
                $Arr['active']='On';
            }else{
                $Arr['active']='Off';
            }
            $Arr['collected_amount']= $company->payments()->sum('amount');
            $Arr['required_amount']=$company->company_configurations()
                    ->first()->required_amount;
            $Arr['count_payments']= $company->payments()->count();
            $Arr['avg_payment']= $company->payments()->avg('amount');
           
            $Arr['time_start']=$company->company_configurations()
                    ->first()->time_start;      
            $Arr['time_start']= date('d.m.Y', strtotime($Arr['time_start']));
            $Arr['time_end']=$company->company_configurations()
                    ->first()->time_end;
            $Arr['time_end']=date('d.m.Y', strtotime($Arr['time_end']));
            
            $currentTime = time();
            $timeEnd = explode('.',$Arr['time_end']);
            
            $timeEnd = mktime(0,0,0,$timeEnd[1],$timeEnd[0],$timeEnd[2]);
            $timeToEnd =  $timeEnd - $currentTime;
            $timeToEnd = round($timeToEnd/86400, 0, PHP_ROUND_HALF_UP);
            
            if($timeToEnd > 0) {
                $Arr['time_to_end'] = $timeToEnd;
            } else {
                $Arr['time_to_end'] = 'РЎРєРѕРЅС‡Р°РЅР°';
            
            }
            $companiesArr['companies'][]=$Arr;
        }
        return $companiesArr; 
    }
    static public function getListAdminPageConditions($id){
        if($id == 1){
            $companies = Company::where('company_active', 1)->get();
            return self::getListAdminPage($companies);
        }
        if($id == 2){
            $companies = Company::where('company_active', 0)->get();
            return self::getListAdminPage($companies);
                    
       }
       if($id == 3){
           $companies = Company::all();
           $companiesIsEnded = [];
           foreach($companies as $company){
              $timeEnd = $company->company_configurations()
                    ->first()->time_end;
              $timeToEnd =  date('Ymd',strtotime($timeEnd)) - date('Ymd');
              if($timeToEnd < 0){
                  $companiesIsEnded[] = $company;
              }
           }
           return self::getListAdminPage($companiesIsEnded);
       
       }
    }
}
