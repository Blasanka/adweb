<?php

namespace App\Http\Controllers;

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class FirebaseController extends Controller
{
    private $serviceAccount;
    private $firebase;
    private $database;
<<<<<<< HEAD
=======
    private $user;
>>>>>>> f84831e2a64af15656a8f3797b32d30cf62786f0

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
<<<<<<< HEAD
=======
        $this->auth = $this->firebase->getAuth();
        $this->user = $this->auth->getUser('p1bQX9UPhCUwDiQESgb4D23QgUF2');
>>>>>>> f84831e2a64af15656a8f3797b32d30cf62786f0
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
<<<<<<< HEAD
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
=======
        return view('partials.single-ad', ['user' => $this->user, 'ad' => $ad]);
    }

    public function showUser($email)
    {
        $member = $this->database->getReference('add-app/users')->orderByChild('email')
            ->equalTo($email)->getSnapshot()->getvalue();

        foreach ($member as $key => $val) {
            $memberKey = $key;
        }

        if (!empty($memberKey)) {
            $memberMetadata = $this->auth->getUser($memberKey);

            foreach ($memberMetadata->metadata as $key => $meta) {
                if (!empty($meta)) {
                    $dateTime = new \DateTime();
                    $date = $dateTime->setTimestamp($meta->getTimestamp());
                    $result = $date->format('Y-m-d H:i:s');
                    $dates[$key] = $result;
                }
            }
        } else {
            $memberMetadata = '';
            $dates['createdAt'] = '';
            $dates['lastLoginAt'] = '';
        }

        $userAds = $this->database
            ->getReference('add-app/ad')->orderByChild('email')->equalTo($email)->getSnapshot()->getvalue();
        // echo '<pre>';
        // print_r($newPost->getvalue());
        return view('partials.single-user', ['user' => $this->user, 'member' => $member, 'memberMetadata' => $memberMetadata, 'dates' => $dates, 'ads' => $userAds]);
    }

    public function disableAd($title)
    {
        $adDb = $this->database->getReference('add-app/ad')->orderByChild('title')
            ->equalTo($title)->getSnapshot()->getValue();
        // dd($adDb);
        $key = array_keys($adDb);
        $values = end($adDb);

        if (!empty($values['disabled'])) {
            if ($values['disabled']) {
                $this->database->getReference('add-app/ad/' . $key[0] . '/disabled')->set('false');
            } elseif (!$values['disabled']) {
                $this->database->getReference('add-app/ad/' . $key[0] . '/disabled')->set('true');
            }
        } else {
            $this->database->getReference('add-app/ad/' . $key[0] . '/disabled')->set('true');
        }
        return redirect()->back();
    }

    public function disableUser($memberKey)
    {
        $userDb = $this->database->getReference('add-app/users/' . $memberKey);
        $memberMetadata = $this->auth->getUser($memberKey);
        if ($memberMetadata->disabled) {
            $userDb->update(['disabled' => 'false']);
            $updatedUser = $this->auth->enableUser($memberKey);
        } else {
            $userDb->update(['disabled' => 'true']);
            $updatedUser = $this->auth->disableUser($memberKey);
        }
        return redirect()->back();
    }

    public function deleteUser($memberKey)
    {
        $userDb = $this->database->getReference('add-app/users/' . $memberKey)->remove();
        $memberMetadata = $this->auth->deleteUser($memberKey);
        return redirect()->route('dashboard.users');
    }

    public function deleteAd($title)
    {
        $this->database->getReference('add-app/ad/' . $title)->remove();
        return redirect()->route('dashboard.ads');
    }

    // public function save()
    // {
    //     $newPost = $this->database
    //         ->getReference('add-app/ad')
    //         ->push([
    //             'title' => 'Laravel FireBase Tutorial',
    //             'category' => 'Laravel',
    //         ]);
    //     echo '<pre>';
    //     print_r($newPost->getvalue());
    // }
>>>>>>> f84831e2a64af15656a8f3797b32d30cf62786f0
}
