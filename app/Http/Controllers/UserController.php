<?php

namespace App\Http\Controllers;

use OAuth\OAuth2\Token\StdOAuth2Token;
use \Illuminate\Http\Request;

class UserController extends Controller
{

    public static function httpGet($url)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $output = curl_exec($ch);

        curl_close($ch);
        return $output;
    }

    public static function httpPost($url, $params)
    {
        $postData = '';
        //create name value pairs seperated by &
        foreach ($params as $k => $v) {
            $postData .= $k . '=' . $v . '&';
        }
        $postData = rtrim($postData, '&');

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, count($postData));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);

        $output = curl_exec($ch);

        curl_close($ch);
        return $output;

    }

    public function loginFacebook(Request $request){
        $code = $request->get('code');
        $facebookService = \OAuth::consumer('Facebook');

        if (!is_null($code)) {
            $token = $facebookService->requestAccessToken($code);

            $fb_access_token = $token->getAccessToken();

            $result = self::httpGet('https://openhouse.buffalolarity.com/api/token?type=fb&access_token=' . $fb_access_token);
            $json = json_decode($result, true);
            $access_token = $json['access_token'];

            session()->put('access_token', $access_token);

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

            $google_access_token = $token->getAccessToken();

            $result = self::httpGet('https://openhouse.buffalolarity.com/api/token?type=fb&access_token=' . $google_access_token);
            $json = json_decode($result, true);
            $access_token = $json['access_token'];

            session()->put('access_token', $access_token);

            return redirect('/');
        }
        else {
            $url = $googleService->getAuthorizationUri();
            return redirect((string)$url);
        }
    }

    public static function isLoggedIn(){
        $access_token = session()->get('access_token');
        \Log::info($access_token);
        return !is_null($access_token);
    }

    public static function getUserData(){
        $access_token = session()->get('access_token');

        if (is_null($access_token)) return null;

        $result = self::httpGet('https://openhouse.buffalolarity.com/api/me?access_token=' . $access_token);
        $json = json_decode($result, true);
        return $json;
    }

    public function register(Request $request){
        $accountType = $request->get('accountType');
        switch($accountType){
            case 'student':
                $this->validate($request, [
                    'prefix' => 'required|in:mr,mrs,miss,master-boy,master-girl',
                    'firstName' => 'required|max:255',
                    'lastName' => 'required|max:255',
                    'email' => 'required|email|max:255',
                    'interests.*' => 'max:64',
                    'studentYear' => 'required|in:p1-3,p4-6,m1,m2,m3,m4,m5,m6',
                    'school' => 'required|max:255',
                ]);
                $result = self::httpPost('https://openhouse.buffalolarity.com/api/register', [
                    'prefix' => $request->get('prefix'),
                    'firstName' => $request->get('firstName'),
                    'lastName' => $request->get('lastName'),
                    'email' => $request->get('email'),
                    'accountType' => $request->get('accountType'),
                    'interests' => $request->get('interests'),
                    'studentYear' => $request->get('prefix'),
                    'school' => $request->get('school'),
                ]);
                break;
            case 'teacher':
                $this->validate($request, [
                    'prefix' => 'required|in:mr,mrs,miss,master-boy,master-girl',
                    'firstName' => 'required|max:255',
                    'lastName' => 'required|max:255',
                    'email' => 'required|email|max:255',
                    'interests.*' => 'max:64',
                    'school' => 'required|max:255',
                ]);
                $result = self::httpPost('https://openhouse.buffalolarity.com/api/register', [
                    'prefix' => $request->get('prefix'),
                    'firstName' => $request->get('firstName'),
                    'lastName' => $request->get('lastName'),
                    'email' => $request->get('email'),
                    'accountType' => $request->get('accountType'),
                    'interests' => $request->get('interests'),
                    'school' => $request->get('school'),
                ]);
                break;
            default:
                return redirect()->back()->withErrors([
                    'accountType' => 'ประเภทของบัญชีไม่ตรงรูปแบบบ'
                ]);
        }

        return array_key_exists('error', $result) ? redirect()->back() : redirect('/register/success');
    }
}