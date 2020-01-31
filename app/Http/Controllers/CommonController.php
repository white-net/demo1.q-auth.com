<?php

namespace App\Http\Controllers;

// use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App;
use App\Customer;
use Session;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;

class CommonController extends Controller
{
    function __construct()
    {
        if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
            App::setLocale(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2));
        } else {
            App::setLocale("en");
        }
    }

    public function sessionID($cmpCD, $mode)
    {
        mt_srand((float) microtime() * 10000);
        $charid = strtoupper(md5(uniqid(rand(), true)));
        return $cmpCD . $charid . $mode;
    }

    public function connectByPost($url, $argArry)
    {
        //$url = "http://localhost/example.php";
        //$argary = array('Apple','Banana','love' => 'Orange');

        // URLエンコードされたクエリ文字列を生成する
        $query_string = http_build_query($argArry);

        // HTTP設定
        $options = array(
            'http' => array(
                'method' => 'POST',
                'header' => 'Content-type: application/x-www-form-urlencoded',
                'content' => $query_string,
                'ignore_errors' => true,
                'protocol_version' => '1.1'
            ),
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false
            )
        );
        $contents = @file_get_contents($url, false, stream_context_create($options));

        $statusCode = http_response_code();
        if ($statusCode === 200) {
            // 200 success
        } else {
            $contents = "";
        }

        return $contents;
    }

    public function connectByPostNoStatus($url, $argArry)
    {
        // URLエンコードされたクエリ文字列を生成する
        $query_string = http_build_query($argArry);

        // HTTP設定
        $options = array(
            'http' => array(
                'method' => 'POST',
                'header' => 'Content-type: application/x-www-form-urlencoded',
                'content' => $query_string,
                'ignore_errors' => true,
                'protocol_version' => '1.1'
            ),
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false
            )
        );

        $contents = @file_get_contents($url, false, stream_context_create($options));

        return $contents;
    }

    public function getApiDataCurl($url, $argArry)
    {

        $option = [
            CURLOPT_POST => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_RETURNTRANSFER => true, //文字列として返す
            // CURLOPT_TIMEOUT        => env('MAX_WAIT_TIME'), // タイムアウト時間
            CURLOPT_POSTFIELDS => http_build_query($argArry)
        ];

        $ch = curl_init($url);
        curl_setopt_array($ch, $option);

        $json    = curl_exec($ch);
        $info    = curl_getinfo($ch);
        $errorNo = curl_errno($ch);
        // OK以外はエラーなので空白配列を返す
        if ($errorNo !== CURLE_OK) {
            // 詳しくエラーハンドリングしたい場合はerrorNoで確認
            // タイムアウトの場合はCURLE_OPERATION_TIMEDOUT
            return "";
        }

        // 200以外のステータスコードは失敗とみなし空配列を返す
        if ($info['http_code'] !== 200) {
            return "";
        }

        return $json;
    }

    public function sessionClear()
    {
        // セッション開始
        session_start();
        // セッション変数を全て削除
        $_SESSION = array();
        // セッションクッキーを削除
        if (isset($_COOKIE["PHPSESSID"])) {
            setcookie("PHPSESSID", '', time() - 1800, '/');
        }
        // セッションの登録データを削除
        @session_destroy();
    }
}
