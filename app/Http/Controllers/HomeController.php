<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class HomeController extends Controller
{

    private $database;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/adapp-df2ae-bff1ac7f17ad.json');
        $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->withDatabaseUri('https://adapp-df2ae.firebaseio.com/')
        ->create();

        $this->database = $firebase->getDatabase();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.home');
    }

    public function getAds()
    {
        $ads = $this->database
        ->getReference('add-app/ad')->getSnapshot()->getvalue();
        // echo '<pre>';
        // print_r($newPost->getvalue());
        return view('dashboard.ads', ['ads' => $ads]);
    }

    public function getUsers()
    {
        $users = $this->database
        ->getReference('add-app/users')->getSnapshot()->getvalue();

        return view('dashboard.users', ['users' => $users]);
    }
}
