<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
<<<<<<< HEAD
Use Redirect;
=======
use Redirect;
>>>>>>> f84831e2a64af15656a8f3797b32d30cf62786f0

class FirebaseAuthController extends Controller
{
    private $auth;
    private $firebase;

    public function __construct()
    {
        //TODO: create the middleware
        // $this->middleware('auth')->except('dashboard');
<<<<<<< HEAD
        
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/add-app-9ae19-3c75e31c2721.json');
        
=======

        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__ . '/add-app-9ae19-3c75e31c2721.json');

>>>>>>> f84831e2a64af15656a8f3797b32d30cf62786f0
        $this->firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->create();

        $this->auth = $this->firebase->getAuth();
    }

<<<<<<< HEAD
    public function index() {
        $this->auth = $this->firebase->getAuth();
=======
    public function index()
    {
>>>>>>> f84831e2a64af15656a8f3797b32d30cf62786f0
        $users = $this->auth->listUsers($defaultMaxResults = 1000, $defaultBatchSize = 1000);
        foreach ($users as $user) {
            /** @var \Kreait\Firebase\Auth\UserRecord $user */
            dd($user);
        }
    }

<<<<<<< HEAD
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
=======
    public function login(Request $request)
    {

        try {
            $user = $this->auth->verifyPassword($request['email'], $request['password']);

            if ($user->uid != null) {
                return view('dashboard.home', ['user' => $user]);
            } else {
                return redirect()->back()->with('msg', 'login failed');
            }
        } catch (Kreait\Firebase\Exception\Auth\EmailNotFound $emil) {
            return back()->withError($emil->getMessage())->withInput();
        }
    }

    public function logout()
    {
        $user = $this->auth->getUser('p1bQX9UPhCUwDiQESgb4D23QgUF2');
        // echo($this->auth->getUser());
        return Redirect::route('home');
>>>>>>> f84831e2a64af15656a8f3797b32d30cf62786f0
    }
}
