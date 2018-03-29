<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Company;
//use App\Company_configuration;
//use App\Company_lang_information;
use App\ConfigurationPageAdmin;

use App\CompanyPageAdmin;

class CompanyPageClient extends Model
{
    static public function getJSONArrCompany($id){
        
        $company = Company::find($id);
        if(!$company){
            return "Company not find!";
        }
        $lang = CompanyPageAdmin::getLangDefault();
        
        $companyConfigurations = $company->company_configurations()->first();
        $companyInformations = $company->company_lang_informations()
                ->where('company_lang',$lang)
                ->first();
        
        
        //return $companyConfigurations;
        
        $arrCompany = [
            "height" => 200, //высота модуля
            "width" => 300, //ширина модуля

            "backgroundColor" => "rgba(231, 238, 244, 1)", //цвет фона модуля
            "buttonColor" => "rgba(148, 200, 64, 0.34)", //цвет кнопок и подсветки поля

            "titleTextColor" => "#31383e", //цвет шрифта заголовка
            "titleFontSize" => "22px", //размер шрифта заголовка

            "descriptionTextColor" => "#31383e", //цвет шрифта описания
            "descriptionFontSize" => "13px", //размер шрифта заголовка

            "buttonTextColor" => "#f7fafc", //цвет шрифта на кнопках
            "buttonFontSize" => "20px", //размер шрифта заголовка

            "color_top_banner" => ConfigurationPageAdmin::getConfiguration('color_top_banner',true),
            "color_button_help" => ConfigurationPageAdmin::getConfiguration('color_button_help',true),
            "color_button_amount" => ConfigurationPageAdmin::getConfiguration('color_button_amount',true),
            
            "currency" => 'руб.', //валюта

            "currentFunds" => self::getCurrentFunds($id), //собрано на данный момент средств, число
            "expectedFunds" => $companyConfigurations->required_amount, //необходимо собрать средств, число	

            "minDonateAmount" => 1, //минимальная сумма доната
            "maxDonateAmount" => 200, //максимальная сумма доната	

            "innerText" => [
                    "locale" => $lang, // язык текста
                    "titleImage" => $companyConfigurations->photo, //путь до главного изображения, строка
                    "companyTitle" => $companyInformations->company_title_lang, //Заголовок компании, строка 
                    "companyDescription" => $companyInformations->company_description_lang, //Описание компании, строка
                    "acceptButtonText" => $companyInformations->donate_lang, //текст на кнопке отправки
                    "resultsText" => 'Сабрана <span class="summ__highlight">'.self::getCurrentFunds($id).'</span> из <span class="goal__highlight">'.$companyConfigurations->required_amount.'</span>', //текст, показывающий, сколько собрано, разметка упростит стилизацию
                    "textInputPlaceholder" => $companyInformations->other_amount_lang, //текст плейсхолдера в поле ввода суммы
                    "paymentDescriptionTitle" => $companyInformations->payment_title_lang, //текст самой ссылки
                    "paymentDescriptionText" => $companyInformations->payment_description_lang,
                    "successfulPaymentMessage" => "Текст при удачном платеже",
                    "errorPaymentMessage" => "Текст при неудачном платеже"
            ]
            
            
            
        ];
        $arrJSON = json_encode($arrCompany);
        return $arrJSON;        
        
    }
    static private function getCurrentFunds($id){
        $company = Company::find($id);
        if(isset($company->payments)){
            $payments = $company->payments->sum('amount');
            return $payments;
       }
       return 0;
    }
}

