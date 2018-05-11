<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CompanyPageClient;

class CompanyClientController extends Controller
{
    //
    public function getCompanyClient($id){
        
        echo CompanyPageClient::getJSONArrCompany($id);
        
    }
}
