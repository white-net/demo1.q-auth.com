<?php

namespace App\Http\Controllers;

// use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App;
use App\Customer;
use Session;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;

class AjaxController extends Controller
{
    function __construct()
    {
        App::setLocale(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2));
    }

    public function genSsid(Request $request)
    {

        if ($request->has('m')) {
            $MODE = $request->input('m');
        } else {
            $MODE = '00';
        }
        // $MODE = $m;
        $CommonController = new CommonController();

        $qrid = $CommonController->sessionID(env('COMPANY_CD'), $MODE);

        return $qrid;
    }

    public function chkAuth(Request $request)
    {
        $CommonController = new CommonController();

        $rData = $request->input('rData');

        $reqData = array('QRID' => $rData, 'TIMEOUT' => env('MAX_WAIT_TIME'));

        $rtnValue = $CommonController->getApiDataCurl(env('GETDEVID_URL'), $reqData);
        if (strlen($rtnValue) > 0) {

            $rtnData = json_decode($rtnValue);
            $msg = urldecode($rtnData->{'msg'});

            if ($rtnData->{'status'} == "00") {
                $customer = new Customer();
                if ($customer->isDevidDB($msg)) {

                    while (Session::exists('DEVID')) {
                        Session::forget('DEVID');
                    }

                    while (!Session::has('DEVID')) {
                        Session::put('DEVID', $msg);
                    }


                    echo json_encode(array("status" => "OK", "msg" => "/user/profile"));
                } else {
                    // "本サイトを利用するには会員登録が必要です。"
                    echo json_encode(array("status" => "NG", "msg" => Lang::get('display.reg notReg')));
                }
            } else {
                $procMsg = Lang::get('display.auth server msg ' . $rtnData->{'status'});
                echo json_encode(array("status" => "NG", "msg" => $procMsg));
            }
        }
    }

    public function getRegID(Request $request)
    {
        $CommonController = new CommonController();

        $rData = $request->input('rData');

        $reqData = array('QRID' => $rData, 'TIMEOUT' => env('MAX_WAIT_TIME'));

        $rtnValue = $CommonController->getApiDataCurl(env('GETDEVID_URL'), $reqData);

        if (strlen($rtnValue) > 0) {
            $rtnData = json_decode($rtnValue);
            $msg = urldecode($rtnData->{'msg'});

            if ($rtnData->{'status'} == "00") {
                $customer = new Customer();
                if (!$customer->isDevidDB($msg)) {

                    while (Session::exists('TMPDEVID')) {
                        Session::forget('TMPDEVID');
                    }

                    while (!Session::has('TMPDEVID')) {
                        Session::put('TMPDEVID', $msg);
                    }
                    // 確認済
                    echo json_encode(array("status" => "OK", "msg" => Lang::get('display.reg mobileChk holderOK')));
                } else {
                    // " 既に登録されています。"
                    echo json_encode(array("status" => "NG", "msg" =>  Lang::get('display.reg alread')));
                }
            } else {
                $procMsg = Lang::get('display.auth server msg ' . $rtnData->{'status'});
                echo json_encode(array("status" => "NG", "msg" => $procMsg));
            }
        }
    }


    public function restartDevID(Request $request)
    {
        $CommonController = new CommonController();

        $rData = $request->input('rData');
        $reqToken = $request->input('reqToken');


        $reqData = array('QRID' => $rData, 'TIMEOUT' => env('MAX_WAIT_TIME'));

        $rtnValue = $CommonController->getApiDataCurl(env('GETDEVID_URL'), $reqData);

        if (strlen($rtnValue) > 0) {
            $rtnData = json_decode($rtnValue);
            $msg = urldecode($rtnData->{'msg'});

            if ($rtnData->{'status'} == "00") {
                $customer = new Customer();

                if ($customer->isDevidTokenDB($msg, $reqToken)) {

                    while (Session::exists('TMPDEVID')) {
                        Session::forget('TMPDEVID');
                    }
                    while (!Session::has('TMPDEVID')) {
                        Session::put('TMPDEVID', $msg);
                    }

                    // 確認済
                    echo json_encode(array("status" => "OK", "msg" => Lang::get('display.reg mobileChk holderOK')));
                } else {
                    // 検証コードに一致する機器ではないです。
                    echo json_encode(array("status" => "NG", "msg" =>  Lang::get('display.restart notReg')));
                }
            } else {
                $procMsg = Lang::get('display.auth server msg ' . $rtnData->{'status'});
                echo json_encode(array("status" => "NG", "msg" => $procMsg));
            }
        }
    }

    public function getChangeID(Request $request)
    {
        $CommonController = new CommonController();

        $rData = $request->input('rData');

        $reqData = array('QRID' => $rData, 'TIMEOUT' => env('MAX_WAIT_TIME'));

        $rtnValue = $CommonController->getApiDataCurl(env('GETDEVID_URL'), $reqData);

        if (strlen($rtnValue) > 0) {
            $rtnData = json_decode($rtnValue);
            $msg = urldecode($rtnData->{'msg'});

            if ($rtnData->{'status'} == "00") {
                $customer = new Customer();

                if (!$customer->isDevidDB($msg)) {

                    while (Session::exists('TMPDEVID')) {
                        Session::forget('TMPDEVID');
                    }

                    while (!Session::has('TMPDEVID')) {
                        Session::put('TMPDEVID', $msg);
                    }
                    // 確認済
                    echo json_encode(array("status" => "OK", "msg" => Lang::get('display.reg mobileChk holderOK')));
                } else {
                    // 検証コードに一致する機器ではないです。
                    echo json_encode(array("status" => "NG", "msg" =>  Lang::get('display.change already Reg')));
                }
            } else {
                $procMsg = Lang::get('display.auth server msg ' . $rtnData->{'status'});
                echo json_encode(array("status" => "NG", "msg" => $procMsg));
            }
        }
    }


    /**
     * スマホかどうか判定
     * @return bool
     */
    public function isSmartPhone()
    {
        $ua = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';

        if (
            stripos($ua, 'iphone') !== false || // iphone
            stripos($ua, 'ipod') !== false || // ipod
            stripos($ua, 'ipad') !== false || // ipad
            (stripos($ua, 'android') !== false) || // android
            (stripos($ua, 'windows') !== false && stripos($ua, 'mobile') !== false) || // windows phone
            (stripos($ua, 'firefox') !== false && stripos($ua, 'mobile') !== false) || // firefox phone
            (stripos($ua, 'bb10') !== false && stripos($ua, 'mobile') !== false) || // blackberry 10
            (stripos($ua, 'blackberry') !== false) // blackberry
        ) {
            $isSmartPhone = true;
        } else {
            $isSmartPhone = false;
        }

        return $isSmartPhone;
    }

    public function SmartPhoneLabel()
    {
        $rtn = "";
        if ($this->isSmartPhone()) {
            // '<div><font color="red">*</font> 認証に登録されている機器の場合、QRを<b>タップ</b>して下さい。</div>'
            $rtn = Lang::get('display.login mobile');
        }
        return $rtn;
    }

    public function SmartPhoneLink()
    {
        $rtn = "";
        if ($this->isSmartPhone()) {
            $rtn = "<a href='' id='mobileLink'><div id='qrcode'></div></a>";
        } else {
            $rtn = "<div id='qrcode'></div>";
        }
        return $rtn;
    }
}
