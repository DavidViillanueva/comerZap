<?php 

namespace App\Controllers;

class Dashboard extends BaseController{

    public function index()
    {
        //return view('dashboard/dashboard');
        echo view('header');
        echo view('dashboard/dashboard');
        //echo view('footer');
    }

}

?>