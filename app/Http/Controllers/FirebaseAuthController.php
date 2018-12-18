<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
Use Redirect;

class FirebaseAuthController extends Controller
{
    private $auth;
    private $firebase;

    public function __construct()
    {
        //TODO: create the middleware
        // $this->middleware('auth')->except('dashboard');
        
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/add-app-9ae19-3c75e31c2721.json');
        
        $this->firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->create();

        $this->auth = $this->firebase->getAuth();
    }

    public function index() {
        $this->auth = $this->firebase->getAuth();
        $users = $this->auth->listUsers($defaultMaxResults = 1000, $defaultBatchSize = 1000);
        foreach ($users as $user) {
            /** @var \Kreait\Firebase\Auth\UserRecord $user */
            dd($user);
        }
    }

    public function login(Request $request) {

        try {
            $user = $this->auth->verifyPassword($request['email'], $request['password']);
            
            if ($user->uid != null) {
                echo($user->uid);
                return Redirect::route('dashboard')->with( ['user' => $user->email] );
            } else {
                return redirect()->back()->with('msg', 'login failed');
            }
        } catch (Kreait\Firebase\Exception\Auth\InvalidPassword $e) {
            echo $e->getMessage();
        }
    }

    public function logout() {
        // echo($this->auth->getUser());
        // return Redirect::route('home');
    }
}
