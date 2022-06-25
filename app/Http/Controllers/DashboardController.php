<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:dashboard', ['only' => 'dashboard']);
    }

    public function dashboard()
    {
        $data['page_title'] = 'Dashboard';
        $data['breadcumb'] = 'Dashboard';

        return view('dashboard.index', $data);
    }

    public function createModal(){
        $data['test'] = 'test';
        return view('modal-api.modal-create', $data);
    }

    public function storeModal(Request $request){
        
        return view('modal-api.modal-create', $data);
    }
    
   
}
