<?php
namespace App\Http\Controllers;
use \Illuminate\Http\Request;

class MasterController extends Controller {

    public function vform(Request $request){
        $this->validate($request, [
            'username'=>'required'
            'password'=>'required'
         ]);

        return view('login');

    }

















}
