<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ConfigurationPageAdmin;

class ConfigurationAdminController extends Controller
{
    //
    public function showConfigurations(){
        $data = ConfigurationPageAdmin::getConfigurations();
        return view('admin.configuration',$data);
        
        
    }
    public function saveConfigurations(Request $request){
        ConfigurationPageAdmin::createOrUpdateConfigurations($request);
        return redirect('/doika/show-configurations');
    }
}
