<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

use App\Company;
use App\Company_configuration;
use App\Company_lang_information;
use App\Doika_configuration;
use App\Uploader;

//Модель работающая со страницами компании (создание новой и просмотр/редактирование выбранной)
class CompanyPageAdmin extends Model
{
    static public function getLangDefault(){
        $company_lang = Doika_configuration::where('configuration_name','lang')
                ->first()->configuration_value;
        return $company_lang;
    }
    static public function createCompany($request){
        
        // создание новой компании
        $newCompany = new Company;
        $newCompany->company_title = $request->title;
        if($request->company_active == "on"){
            $newCompany->company_active = 1;
        }else{
            $newCompany->company_active = 0;
        }
        
        $newCompany->save();
        
        // создание конфигурации новой компании
        $newCompanyConfiguration = new Company_configuration; 
        $newCompanyConfiguration->company_id = $newCompany->id;
        
        if($request->company_progress_bar == "on"){
            $newCompanyConfiguration->company_progress_bar = 1;
        }else{
            $newCompanyConfiguration->company_progress_bar = 0;
        }
        
        if($request->hasFile('photo')){
            $newCompanyConfiguration->photo = Uploader::upload($request);
        }else{
            $newCompanyConfiguration->photo = 'default.jpg';
        }
        $newCompanyConfiguration->required_amount = $request->required_amount;       
        $newCompanyConfiguration->time_start = $request->time_start;
        $newCompanyConfiguration->time_end = $request->time_end;
        $newCompanyConfiguration->save();
        
        // создание страницы информации на языке по умолчанию
        $newLangInformation = new Company_lang_information;
        $newLangInformation->company_id = $newCompany->id;
        $newLangInformation->company_lang = self::getLangDefault();
        
        $newLangInformation->company_title_lang = $request->title;
        $newLangInformation->company_description_lang = $request->description;
        
        $newLangInformation->company_currency_lang = 
                Doika_configuration::where('configuration_name','currency_lang')
                ->first()->configuration_value;
        $newLangInformation->required_amount_lang = 
                Doika_configuration::where('configuration_name','required_amount_lang')
                ->first()->configuration_value;
        $newLangInformation->other_amount_lang = 
                Doika_configuration::where('configuration_name','other_amount_lang')
                ->first()->configuration_value;
        $newLangInformation->donate_lang = 
                Doika_configuration::where('configuration_name','donate_lang')
                ->first()->configuration_value;
        $newLangInformation->payment_title_lang = 
                Doika_configuration::where('configuration_name','payment_title_lang')
                ->first()->configuration_value;
        $newLangInformation->payment_description_lang = 
                Doika_configuration::where('configuration_name','payment_description_lang')
                ->first()->configuration_value;
        $newLangInformation->save();
    }
    
    static public function getCompanyPage($id){
        
        $company = Company::find($id);
        $companyArr=[];
        $companyArr['id'] = $company->id;
        $companyArr['name']=$company->company_title;
        if($company->company_active == 1){
           $companyArr['check']='checked'; 
        }
        
         $companyArr['time_start']=$company->company_configurations()->first()
                ->time_start;
        $dateStart = strtotime($companyArr['time_start']);       
                
        $companyArr['time_start']= date('Y-m-d', strtotime($companyArr['time_start']));
        $companyArr['time_end']= $company->company_configurations()->first()
                ->time_end;
        $dateEnd = strtotime($companyArr['time_end']);
        
        $companyArr['time_end']= date('Y-m-d', strtotime($companyArr['time_end']));
        $companyArr['company_progress_bar']=$company->company_configurations()->first()
                ->company_progress_bar;
        $companyArr['required_amount']=$company->company_configurations()->first()
                ->required_amount;
        $companyArr['photo']=$company->company_configurations()->first()
                ->photo;
        $companyArr['description']=$company->company_lang_informations()
                ->where('company_lang',self::getLangDefault())
                ->first()->company_description_lang;
       
        
        $dateNow = time();       
        
        $progress_start = round(($dateNow - $dateStart) / 86400);
        $progress_end = round(($dateEnd - $dateStart) / 86400);
        $companyArr['daysPassed'] = ($progress_start >= 0) ? $progress_start: 0;
        $companyArr['daysToFinish'] = ($progress_end >= 0) ? $progress_end: 0;

        
        return $companyArr;
        
    }
    static public function updateCompanyPage($id,$request){
        
        // обновление данных компании
        $Company = Company::find($id);
        $Company->company_title = $request->title;
        if($request->company_active == "on"){
            $Company->company_active = 1;
        }else{
            $Company->company_active = 0;
        }
        $Company->save();
        
        // обновление конфигурации компании
        $CompanyConfiguration = $Company->company_configurations()->first(); 
        if($request->hasFile('photo')){
            $CompanyConfiguration->photo = Uploader::upload($request);
        }
        $CompanyConfiguration->required_amount = $request->required_amount;
        $CompanyConfiguration->company_progress_bar = $request->company_progress_bar;
        $CompanyConfiguration->time_start = $request->time_start;
        $CompanyConfiguration->time_end = $request->time_end;
        $CompanyConfiguration->save();
        
        // обновление информации компании на языке по умолчанию
        $LangInformation = $Company->company_lang_informations()->where('company_lang',self::getLangDefault())->first();
        $LangInformation->company_title_lang = $request->title;
        $LangInformation->company_description_lang = $request->description;
        $LangInformation->save();
        
        
    }
    static public function deleteCompany($id){
        $company = Company::find($id);
        $company->company_configurations()->delete();
        $company->company_lang_informations()->delete();
        $company->delete();
        
        
    }
    
    
}
