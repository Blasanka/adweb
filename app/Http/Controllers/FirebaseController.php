<?php

namespace App\Http\Controllers;

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class FirebaseController extends Controller
{
    private $serviceAccount;
    private $firebase;
    private $database;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->serviceAccount = ServiceAccount::fromJsonFile(__DIR__ . '/add-app-9ae19-3c75e31c2721.json');
        $this->firebase = (new Factory)
            ->withServiceAccount($this->serviceAccount)
            ->withDatabaseUri('https://add-app-9ae19.firebaseio.com/')
            ->create();

        $this->database = $this->firebase->getDatabase();
    }

    public function index()
    {
        $ads = $this->database
            ->getReference('add-app/ad')->getSnapshot()->getvalue();
        // echo '<pre>';
        // print_r($newPost->getvalue());
        return view('welcome', ['ads' => $ads]);
    }

    public function showAd($title)
    {
        $ad = $this->database
            ->getReference('add-app/ad')->orderByChild('title')->equalTo($title)->getSnapshot()->getvalue();
        // echo '<pre>';
        // print_r($newPost->getvalue());
        return view('partials.single-ad', ['ad' => $ad]);
    }

    public function save()
    {
        $newPost = $this->database
            ->getReference('add-app/ad')
            ->push([
                'title' => 'Laravel FireBase Tutorial',
                'category' => 'Laravel',
            ]);
        echo '<pre>';
        print_r($newPost->getvalue());
    }
}
