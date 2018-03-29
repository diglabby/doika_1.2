<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Doika_configuration;

class ConfigurationPageAdmin extends Model
{
    //получение одной конфигурации
    static public function getConfiguration($configurationName,$getString){
        $configuration = Doika_configuration::where('configuration_name',$configurationName)
                ->first(); 
        if($configuration && $getString){
           
                $configuration = $configuration->configuration_value;
            
        }
        return $configuration;
        
    }
    //создание или обновление одной конфигурации
    static public function createOrUpdateConfiguration($configurationName,$value){
        
        if(!$value){
            $value = "";
        }
        $configuration = self::getConfiguration($configurationName,false);
        if($configuration){
            $configuration->configuration_value = $value;
            $configuration->save();
        }else{
            $configuration = new Doika_configuration;
            $configuration->configuration_name = $configurationName;
            $configuration->configuration_value = $value;
            $configuration->configuration_active = 1;
            $configuration->save();
            
        }
        
    }

    static public function getConfigurations(){
        //создаем массив конфигураций
        $configurations = [];
        // получаем ключ если он существует
        $configurations['token'] = self::getConfiguration('token',true);
        
        //получаем IdMarket
        $configurations['id_market'] = self::getConfiguration('id_market',true);
        //получаем KeyMarket
        $configurations['key_market'] = self::getConfiguration('key_market',true);
        // получаем цвет модуля
        $configurations['color'] = self::getConfiguration('color',true);
        // РїРѕР»СѓС‡Р°РµРј С†РІРµС‚ С„РѕРЅР° РІРµСЂС…РЅРµРіРѕ Р±Р°РЅРЅРµСЂР°
        $configurations['color_top_banner'] = self::getConfiguration('color_top_banner',true);
        // РїРѕР»СѓС‡Р°РµРј С†РІРµС‚ РєРЅРѕРїРєРё "Р”Р°РїР°РјР°РіС‡С‹"
        $configurations['color_button_help'] = self::getConfiguration('color_button_help',true);
        // РїРѕР»СѓС‡Р°РµРј С†РІРµС‚ РєРЅРѕРїРѕРє СЃ СЃСѓРјРјР°РјРё
        $configurations['color_button_amount'] = self::getConfiguration('color_button_amount',true);
        
        
        
        // отдаем готовый массив с конфигурациями
        
        return $configurations; 
    }
    
    //обновляем конфигурации или записываем новые
    static public function createOrUpdateConfigurations($request){
        
       self::createOrUpdateConfiguration('token',$request->token);
       self::createOrUpdateConfiguration('id_market',$request->id_market);
       self::createOrUpdateConfiguration('key_market',$request->key_market);
       self::createOrUpdateConfiguration('color',$request->color);
       self::createOrUpdateConfiguration('color_top_banner',$request->color_top_banner);
       self::createOrUpdateConfiguration('color_button_help',$request->color_button_help);
       self::createOrUpdateConfiguration('color_button_amount',$request->color_button_amount);
    }
    
    
    
}
