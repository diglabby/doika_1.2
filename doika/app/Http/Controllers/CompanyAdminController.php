<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateCompany;
use App\CompanyPageAdmin;
use App\CompanyListAdmin;

class CompanyAdminController extends Controller
{
    //
    public function create(CreateCompany $request){
        CompanyPageAdmin::createCompany($request);
        
        return redirect('/doika/show-list');
        
    
    }
    public function show($id){
        $data = CompanyPageAdmin::getCompanyPage($id);
        return view('admin.company', $data);
    }
    public function update($id, CreateCompany $request){
        CompanyPageAdmin::updateCompanyPage($id, $request);
        return back();
    }
    public function delete($id){
        
        CompanyPageAdmin::deleteCompany($id);
        return redirect('/doika/show-list');
        
    }
    public function showList(){
        $data = CompanyListAdmin::getListAdminPage();
        return view('admin.list',$data);
        
    }
     public function showListConditions($id){
        $data = CompanyListAdmin::getListAdminPageConditions($id);
        $data['conditions_id'] = $id;
        return view('admin.list',$data);
       //dump ($data);
    
    }
}
