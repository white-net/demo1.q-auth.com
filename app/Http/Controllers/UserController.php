<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App;
use Illuminate\Support\Facades\View;
use App\Customer;
use Session;
use Illuminate\Support\Carbon;
use PHPUnit\Framework\MockObject\Stub\Exception;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Mail;


// use Illuminate\Support\Facades\App;

class UserController extends Controller
{

    // public function getSignup()
    // {
    //     return View('user.signup');
    // }
    function __construct()
    {
        App::setLocale(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2));
    }

    public function getProfile()
    {

        if (!$this->chkAuth()) {
            return redirect()->route('user.login');
        }

        $customer = new Customer();
        $profile = $customer->getDevidToRow(Session::get('DEVID'));

        $viewParam = array(
            'name'  => $profile->name,
            'email' => $profile->email
        );

        return view('user.profile')->with($viewParam);
    }

    // public function getSignin()
    // {
    //     return view('user.signin');
    // }

    public function getLogin()
    {
        return view('user.login');
    }

    public function postLogin(Request $request)
    {
        if ($this->chkAuth()) {
            return redirect()->route('user.profile');
        } else {
            return redirect()->back();
        }

        // $this->validate($request, [
        //     'email' => 'email|required',
        //     'password' => 'required|min:4'
        // ]);

        // if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
        //     return redirect()->route('user.profile');
        // }
        // return redirect()->back();
    }

    public function getStopauthmail()
    {
        $viewParam = array(
            'mailTitle'  =>  Lang::get('display.sendMail stop title'),
            'mailMsg' => Lang::get('display.sendMail mail stop'),
            'url' => url()->current()
        );
        return View('user.sendMail')->with($viewParam);
    }

    public function getRestartauthmail()
    {
        $viewParam = array(
            'mailTitle'  =>  Lang::get('display.sendMail restart title'),
            'mailMsg' => Lang::get('display.sendMail mail restart'),
            'url' => url()->current()
        );
        return View('user.sendMail')->with($viewParam);
    }

    public function postStopauthmail(Request $request)
    {
        $customer = new Customer();
        if (!$customer->isMailDB($request->input('Email'))) {
            $viewParam = array(
                'mailTitle'  =>  Lang::get('display.sendMail stop title'),
                'mailMsg' => Lang::get('display.sendMail mail stop'),
                'url' => url()->current(),
                'mailValue' => $request->input('Email'),
                'mailExist' => Lang::get('display.sendMail mailExist error')
            );

            return View('user.sendMail')->with($viewParam);
        } else {

            $this->sendMail($request->input('Email'));

            $viewParam = array(
                'mailTitle'  =>  Lang::get('display.sendMail stop title'),
                'mailSendCompleteMsg' => Lang::get('display.sendMail mailSend complete')
            );

            return View('user.sendMailComplete')->with($viewParam);
        }
    }

    public function postRestartauthmail(Request $request)
    {
        $customer = new Customer();
        if (!$customer->isMailDB($request->input('Email'))) {

            $viewParam = array(
                'mailTitle'  =>  Lang::get('display.sendMail restart title'),
                'mailMsg' => Lang::get('display.sendMail mail restart'),
                'url' => url()->current(),
                'mailValue' => $request->input('Email'),
                'mailExist' => Lang::get('display.sendMail mailExist error')
            );

            return View('user.sendMail')->with($viewParam);
        } else {

            $this->sendMail($request->input('Email'));

            $viewParam = array(
                'mailTitle'  =>  Lang::get('display.sendMail restart title'),
                'mailSendCompleteMsg' => Lang::get('display.sendMail mailSend complete')
            );

            return View('user.sendMailComplete')->with($viewParam);
        }
    }

    public function getLogout()
    {
        if (Session::exists('DEVID'))
            Session::forget('DEVID');
        // Auth::logout();
        return redirect()->route('user.login');
    }

    public function getregUser()
    {
        return View('user.regUser');
    }

    public function postregUser(Request $request)
    {

        $devid = Session::get('TMPDEVID');

        if (Session::exists('TMPDEVID'))
            Session::forget('TMPDEVID');

        try {

            $customer = new Customer();
            if ($customer->isMailDB($request->input('Email'))) {

                $viewParam = array(
                    'nameValue'  =>  $request->input('userName'),
                    'mailValue' => $request->input('Email'),
                    'mailExist' => Lang::get('display.reg mailExist error')
                );

                return view('user.regUser')->with($viewParam);
            }


            $insData = [
                'name' => $request->input('userName'),
                'email' => $request->input('Email'),
                'devid' =>  $devid,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];

            $customer->insCustomer($insData);

            Session::put('DEVID', $devid);

            // return $this->getProfile();
            return redirect()->route('user.profile');
        } catch (Exception $e) {
            return $e;
        }
    }

    public function getStopproc(Request $request)
    {
        $procMsg = "";
        $token = $request->input('tk');
        $customer = new Customer();
        if (!$customer->isTokenCustomer($token)) {
            $procMsg = Lang::get('display.stop proc tokenErr');
        }

        $viewParam = array(
            'procMsg'  =>  $procMsg,
            'token'  =>  $token,
        );

        return view('user.stopProc')->with($viewParam);
    }

    public function postStopproc(Request $request)
    {
        $token = $request->input('reqToken');

        $procMsg = Lang::get('display.stop proc complate');
        $customer = new Customer();
        $devid = $customer->getTokenToDevid($token);
        $mailAdd = $customer->getTokenToMail($token);

        $reqData = array(
            'DEVID' => urlencode($devid),
            'COMPANY_CD' => urlencode(env('COMPANY_CD'))
        );

        $CC = new CommonController();

        $rtnValue = $CC->connectByPost(env('STOPDEVID_URL'), $reqData);
        $rtnData = json_decode($rtnValue);

        $updData = [
            'remember_token' =>  null,
            'updated_at' => Carbon::now(),
        ];

        // $msg = urldecode($rtnData->{'msg'});
        // 緊急停止成功し、One Time Url 削除
        if ($rtnData->{'status'} == "00") {
            $procMsg = Lang::get('display.stop proc complate');
            $customer->updTokenCustomer($mailAdd, $updData);
        } else {
            if ($rtnData->{'status'} == "10") {
                $procMsg = Lang::get('display.auth server msg ' . $rtnData->{'status'});
                $customer->updTokenCustomer($mailAdd, $updData);
            } else {
                $procMsg = Lang::get('display.auth server msg ' . $rtnData->{'status'}) . Lang::get('display.proc errMsg');
            }
        }

        $viewParam = array(
            'procMsg'  =>  $procMsg,
        );

        return view('user.stopProc')->with($viewParam);
    }

    public function getRestartproc(Request $request)
    {

        $procMsg = "";
        $token = $request->input('tk');
        $customer = new Customer();
        if (!$customer->isTokenCustomer($token)) {
            $procMsg = Lang::get('display.restart proc tokenErr');
        }

        $viewParam = array(
            'procMsg'  =>  $procMsg,
            'token'  =>  $token,
        );

        return view('user.restartProc')->with($viewParam);
        // return $request->input('tk');
    }

    public function postRestartproc(Request $request)
    {
        $token = $request->input('reqToken');

        $procMsg = Lang::get('display.restart proc complate');
        $customer = new Customer();
        $devid = $customer->getTokenToDevid($token);
        $mailAdd = $customer->getTokenToMail($token);

        $reqData = array(
            'DEVID' => urlencode($devid),
            'COMPANY_CD' => urlencode(env('COMPANY_CD'))
        );

        $CC = new CommonController();

        $rtnValue = $CC->connectByPost(env('DELSTOPDEVID_URL'), $reqData);
        $rtnData = json_decode($rtnValue);

        $updData = [
            'remember_token' =>  null,
            'updated_at' => Carbon::now(),
        ];

        if ($rtnData->{'status'} == "00") {
            $procMsg = Lang::get('display.restart proc complate');
            $customer->updTokenCustomer($mailAdd, $updData);
        } else {
            if ($rtnData->{'status'} == "20") {
                $procMsg = Lang::get('display.auth server msg ' . $rtnData->{'status'});
                $customer->updTokenCustomer($mailAdd, $updData);
            } else {
                $procMsg = Lang::get('display.auth server msg ' . $rtnData->{'status'}) . Lang::get('display.proc errMsg');
            }
        }

        $viewParam = array(
            'procMsg'  =>  $procMsg,
        );

        return view('user.restartProc')->with($viewParam);
    }
    public function getChangeDev(Request $request)
    {

        if (!$this->chkAuth()) {
            return redirect()->route('user.login');
        }

        $viewParam = array(
            'procMsg'  =>  '',
        );

        return view('user.changeDev')->with($viewParam);;
    }

    public function postChangeDev(Request $request)
    {

        if (!$this->chkAuth()) {
            return redirect()->route('user.login');
        }

        $rMail = $request->input('Email');

        $oldDevid = Session::get('DEVID');
        $devid = Session::get('TMPDEVID');

        $customer = new Customer();

        if ($customer->isMailDevidDB($rMail, $oldDevid)) {
            // 認証サーバのChangeList登録
            $reqData = array(
                'DEVIDOLD' => urlencode($oldDevid),
                'DEVIDNEW' => urlencode($devid),
                'COMPANY_CD' => urlencode(env('COMPANY_CD'))
            );

            $CC = new CommonController();

            $rtnValue = $CC->connectByPost(env('CHANGEDEVID_URL'), $reqData);
            $rtnData = json_decode($rtnValue);


            $updData = [
                'devid' =>  $devid,
                'updated_at' => Carbon::now(),
            ];

            // 機器変更成功し、One Time Url 削除
            if ($rtnData->{'status'} == "00") {
                // ローカルDBを変更
                $customer->updDevidCustomer($rMail, $updData);
                $procMsg = Lang::get('display.change complate');
            } else {
                if ($rtnData->{'status'} == "12") {
                    $procMsg = Lang::get('display.auth server msg ' . $rtnData->{'status'});
                } else {
                    $procMsg = Lang::get('display.auth server msg ' . $rtnData->{'status'}) . Lang::get('display.proc errMsg');
                }
            }
        } else {
            $procMsg = Lang::get('display.change notReg');
        }

        $viewParam = array(
            'procMsg'  =>  $procMsg,
        );

        if (Session::exists('TMPDEVID'))
            Session::forget('TMPDEVID');

        return view('user.changeDev')->with($viewParam);
    }


    public function getEditProfile(Request $request)
    {

        if (!$this->chkAuth()) {
            return redirect()->route('user.login');
        }

        $customer = new Customer();
        $profile = $customer->getDevidToRow(Session::get('DEVID'));


        $viewParam = array(
            'nameValue'  => $profile->name,
            'procMsg'  =>  '',
        );

        return view('user.editProfile')->with($viewParam);
    }


    public function postEditProfile(Request $request)
    {

        if (!$this->chkAuth()) {
            return redirect()->route('user.login');
        }

        $devid = Session::get('DEVID');
        $rMail = $request->input('Email');

        $customer = new Customer();


        if ($request->input('newEmail') != $request->input('newEmail1')) {
            $mailMsg = Lang::get('display.profileEdit notSame');
            $viewParam = array(
                'nameValue'  => $request->input('userName'),
                'mailValue'  => $request->input('Email'),
                'newMailValue'  => $request->input('newEmail'),
                'newMailValue1'  => $request->input('newEmail1'),
                'mailSameCheck' => $mailMsg,
                'procMsg'  =>  '',
            );
            return view('user.editProfile')->with($viewParam);
        }

        if ($customer->isMailDB($request->input('newEmail'))) {
            $mailMsg = Lang::get('display.profileEdit mailExist');
            $viewParam = array(
                'nameValue'  => $request->input('userName'),
                'mailValue'  => $request->input('Email'),
                'newMailValue'  => $request->input('newEmail'),
                'newMailValue1'  => $request->input('newEmail1'),
                'mailSameCheck' => $mailMsg,
                'procMsg'  =>  '',
            );
            return view('user.editProfile')->with($viewParam);
        }



        if ($customer->isMailDevidDB($rMail, $devid)) {

            $updData = [
                'updated_at' => Carbon::now(),
            ];

            if ($request->input('userName'))
                $updData['name'] = $request->input('userName');

            if ($request->input('newEmail'))
                $updData['Email'] = $request->input('newEmail');

            if (count($updData) > 1) {
                $customer->updTokenCustomer($request->input('Email'), $updData);

                $viewParam = array(
                    'procMsg'  =>  Lang::get('display.profileEdit complate'),
                );
                return view('user.editProfile')->with($viewParam);
            } else {
                $viewParam = array(
                    'mailValue'  => $request->input('Email'),
                    'editNone' =>  Lang::get('display.profileEdit nonEdit'),
                    'procMsg'  =>  '',
                );
                return view('user.editProfile')->with($viewParam);
            }
        } else {
            $mailMsg = Lang::get('display.profileEdit notReg');

            $viewParam = array(
                'nameValue'  => $request->input('userName'),
                'mailValue'  => $request->input('Email'),
                'newMailValue'  => $request->input('newEmail'),
                'newMailValue1'  => $request->input('newEmail1'),
                'mailExist' => $mailMsg,
                'procMsg'  =>  '',
            );

            return view('user.editProfile')->with($viewParam);
        }
    }

    public function chkAuth()
    {
        if (Session::get('DEVID') != null) {
            return true;
        } else {
            return false;
        }
    }

    public function chkAuth_back()
    {
        if (Session::exists('DEVID') && Session::has('DEVID')) {
            return true;
        } else {
            return false;
        }
    }

    private function sendMail($mailAdd)
    {

        $curUrl = url()->current();

        $token = str_random(64);

        if (strpos($curUrl, 'stop') === false) {
            $viewNameTail = "sendRestart";
            $linkURL = url('/') . '/user/restartproc?tk=' . $token;
            $urlLabel = Lang::get('display.sendMail restart URL Label');
            $mailSubject = Lang::get('display.sendMail restart subject');
        } else {
            $viewNameTail = "sendStop";
            $linkURL = url('/') . '/user/stopproc?tk=' . $token;
            $urlLabel = Lang::get('display.sendMail stop URL Label');
            $mailSubject = Lang::get('display.sendMail stop subject');
        }

        $locale = App::getLocale();

        if (View::exists('mails.' . $locale . '.' . $viewNameTail)) {
            $viewName = 'mails.' . $locale . '.' . $viewNameTail;
        } else {
            $viewName = 'mails.en.' . $viewNameTail;
        }

        $customer = new Customer();
        $userName = $customer->getMailToUsrNameDB($mailAdd);

        $param = array(
            'name' => $userName,
            'URL' => $linkURL,
            'URLLabel' => $urlLabel
        );

        Mail::send($viewName, $param, function ($message) use ($mailAdd, $mailSubject) {
            $message->to($mailAdd);
            $message->subject($mailSubject);
        });

        $updData = [
            'remember_token' =>  $token,
            'updated_at' => Carbon::now(),
        ];

        $customer->updTokenCustomer($mailAdd, $updData);
    }
}
