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
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 'Content-Type: application/json');
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));

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

            // Previous: '/'
            return redirect('/register');
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

            $result = self::httpGet('https://openhouse.buffalolarity.com/api/token?type=google&access_token=' . $google_access_token);
            $json = json_decode($result, true);
            $access_token = $json['access_token'];

            session()->put('access_token', $access_token);

            // Previous: '/'
            return redirect('/register');
        }
        else {
            $url = $googleService->getAuthorizationUri();
            return redirect((string)$url);
        }
    }

    public static function isLoggedIn(){
        $access_token = session()->get('access_token');
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
        if(self::isLoggedIn() && self::getUserData()['registered']){
            session()->flash('error', 'คุณได้ลงทะเบียนเรียบร้อยแล้ว สามารถแก้ไข้อมูลได้ผ่านทางแอปพลิเคชั่นเท่านั้น');
            return redirect()->back();
        }

        $accountType = $request->get('accountType');
        switch($accountType){
            case 'student':
                $this->validate($request, [
                    'prefix' => 'required|in:mr,mrs,miss,master-boy,master-girl',
                    'firstName' => 'required|max:255',
                    'lastName' => 'required|max:255',
                    'email' => 'required|email|max:255',
                    'studentYear' => 'required|in:p1-3,p4-6,m1,m2,m3,m4,m5,m6',
                    'schoolName' => 'required|max:255',
                ]);
                $result = self::httpPost('https://openhouse.buffalolarity.com/api/register', [
                    'prefix' => $request->get('prefix'),
                    'firstName' => $request->get('firstName'),
                    'lastName' => $request->get('lastName'),
                    'email' => $request->get('email'),
                    'accountType' => $request->get('accountType'),
                    'studentYear' => $request->get('studentYear'),
                    'schoolName' => $request->get('schoolName'),
                    'interests' => [],
                    'access_token' => session()->get('access_token'),
                ]);
                break;
            case 'teacher':
                $this->validate($request, [
                    'prefix' => 'required|in:mr,mrs,miss,master-boy,master-girl',
                    'firstName' => 'required|max:255',
                    'lastName' => 'required|max:255',
                    'email' => 'required|email|max:255',
                    'schoolName' => 'required|max:255',
                ]);
                $result = self::httpPost('https://openhouse.buffalolarity.com/api/register', [
                    'prefix' => $request->get('prefix'),
                    'firstName' => $request->get('firstName'),
                    'lastName' => $request->get('lastName'),
                    'email' => $request->get('email'),
                    'accountType' => $request->get('accountType'),
                    'schoolName' => $request->get('schoolName'),
                    'interests' => [],
                    'access_token' => session()->get('access_token'),
                ]);
                break;
            default:
                session()->flash('error', 'ประเภทของบัญชีไม่ถูกรูปแบบ');
                return redirect()->back();
        }

        $json = json_decode($result, true);

        if(array_key_exists('error', $json)){
            session()->flash('error', 'มีข้อผิดพลาดที่ไม่สามารถระบุได้ กรุณาติดต่อผู้ดูแลระบบ');
            return redirect()->back();
        }
        else{
            session()->flash('status', 'ลงทะเบียนสำเร็จ');
            return redirect('/');
        }
    }
}