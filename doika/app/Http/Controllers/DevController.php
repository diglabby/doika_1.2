<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DevController extends Controller
{
    //
    public function getListPage(){
        
        return view('admin.list');
    
    
    }
    public function getCompanyPage(){
        
        return view('admin.company');
    
    
    }
    public function getConfigurationPage(){
        
        return view('admin.configuration');
    
    
    }
    public function getCreatePage(){
        
        return view('admin.create');
    
    
    }
}
