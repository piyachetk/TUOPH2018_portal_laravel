<?php

namespace App\Http\Controllers;

use \App\Account;
use \Illuminate\Http\Request;

class UserController extends Controller
{
    public function loginFacebook(Request $request){
        $code = $request->get('code');
        $facebookService = \OAuth::consumer('Facebook');

        if (!is_null($code)) {
            $token = $facebookService->requestAccessToken($code);

            // Send a request with it
            $data = json_decode($facebookService->request('/me'), true);
            $data['picture']['data']['url'] = 'https://graph.facebook.com/' . $data['id'] . '/picture?type=large&width=720&height=720';

            //Do something with user
            $user = Account::where('ref_no', '=', 'fb' . ':' . $data['id'])->first();
            if ($user == null) {
                $user = Account::create([
                    'firstName' => array_key_exists('first_name', $data) ? $data['first_name'] : null,
                    'lastName' => array_key_exists('last_name', $data) ? $data['last_name'] : null,
                    'gender' => array_key_exists('gender', $data) ? $data['gender'] : null,
                    'email' => array_key_exists('email', $data) ? $data['email'] : null,
                    'picture' => array_key_exists('picture', $data) ? $data['picture']['data']['url'] : null,
                    'ref_no' => 'fb' . ':' . $data['id'],
                    'scanned' => []
                ]);
            } else {
                $user->fill([
                    'picture' => array_key_exists('picture', $data) ? $data['picture']['data']['url'] : null
                ]);
                $user->save();
            }

            $request->session()->put('id', $user->id);

            return redirect('/');
        }
        else {
            $url = $facebookService->getAuthorizationUri();
            return redirect((string)$url);
        }
    }

    public function loginGoogle(Request $request){
        $code = $request->get('code');
        $googleService = \OAuth::consumer('Google');

        if (!is_null($code)) {
            $token = $googleService->requestAccessToken($code);

            // Send a request with it
            $json = json_decode($googleService->request('https://www.googleapis.com/oauth2/v1/userinfo'), true);

            //Do something with $result
            $data = [];

            $data['id'] = $json['id'];
            $data['first_name'] = $json['given_name'];
            $data['last_name'] = $json['family_name'];
            $data['gender'] = $json['gender'];

            $data['picture'] = [
                'data' => [
                    'url' => $json['picture']
                ]
            ];

            $data['email'] = $json['email'];

            //Do something with user
            $user = Account::where('ref_no', '=', 'google' . ':' . $data['id'])->first();
            if ($user == null) {
                $user = Account::create([
                    'firstName' => array_key_exists('first_name', $data) ? $data['first_name'] : null,
                    'lastName' => array_key_exists('last_name', $data) ? $data['last_name'] : null,
                    'gender' => array_key_exists('gender', $data) ? $data['gender'] : null,
                    'email' => array_key_exists('email', $data) ? $data['email'] : null,
                    'picture' => array_key_exists('picture', $data) ? $data['picture']['data']['url'] : null,
                    'ref_no' => 'google' . ':' . $data['id'],
                    'scanned' => []
                ]);
            } else {
                $user->fill([
                    'picture' => array_key_exists('picture', $data) ? $data['picture']['data']['url'] : null
                ]);
                $user->save();
            }

            $request->session()->put('id', $user->id);

            return redirect('/');
        }
        else {
            $url = $googleService->getAuthorizationUri();
            return redirect((string)$url);
        }
    }
}