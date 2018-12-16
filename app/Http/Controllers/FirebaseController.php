<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class FirebaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/adapp-df2ae-bff1ac7f17ad.json');
        $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->withDatabaseUri('https://adapp-df2ae.firebaseio.com/')
        ->create();

        $database = $firebase->getDatabase();

        $ads = $database
        ->getReference('add-app/ad')->getSnapshot()->getvalue();
        // echo '<pre>';
        // print_r($newPost->getvalue());
        return view('welcome', ['ads' => $ads]);
    }


    public function save() {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/adapp-df2ae-bff1ac7f17ad.json');
        $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->withDatabaseUri('https://adapp-df2ae.firebaseio.com/')
        ->create();

        $database = $firebase->getDatabase();

        $newPost = $database
        ->getReference('addapp/posts')
        ->push([
        'title' => 'Laravel FireBase Tutorial' ,
        'category' => 'Laravel'
        ]);
        echo '<pre>';
        print_r($newPost->getvalue());
    }
}