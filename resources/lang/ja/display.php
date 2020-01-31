<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines ar情報used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    /* Login content */
    'Sign In' => 'ログイン',
    'E-Mail' => 'メールアドレス',
    'Password' => 'パスワード',
    'Log in' => 'ログイン',
    /* header */
    'Title' => 'Q認証デモ',
    'Account' => 'アカウント',
    'Sign Up' => '新規登録',
    'Log Out' => 'ログアウト',
    'Log In' => 'ログイン',
    'Stop' => '利用停止手続き',
    'Restart' => '利用再開手続き',
    'Change' => '認証機器変更',
    'Account Modify' => 'アカウント情報変更',


    /* login page */
    'login label1' => 'ユーザーID/パスワード不要の安全なログイン手段を利用できます。',
    'login label2' => '下のQRコードを専用のアプリでスキャンしますと<b>自動</b>でログインされます。',
    'login mobile' => '<div><span style="color:#0000ff">*</span> 認証に登録されている機器の場合、QRを<b>タップ</b>して下さい。</div>',

    /* new regist page */
    'reg alread' => ' 既に登録されています。',
    'reg notReg' => '本サイトを利用するには会員登録が必要です。',
    'reg name label' => 'お名前',
    'reg name holder' => 'お名前を入力して下さい。',
    'reg mail label' => 'メールアドレス',
    'reg mail holder' => 'メールアドレスを入力して下さい。',
    'reg mobileChk label1' => '携帯又はモバイル機器確認',
    'reg mobileChk label2' => '右のQRコードを<span style="color:#0000ff">専用アプリ</span>でスキャンして下さい。',
    'reg mobileChk holderNO' => '未確認',
    'reg mobileChk holderOK' => '確認済み',
    'reg mailExist error' => ' 既に登録されているメールアドレスです。',

    'reg button' => '会員登録',

    /* profile page */
    'profile title' => 'プロフィール',
    'profile name label' => 'お名前',
    'profile mail label' => 'メールアドレス',

    /* sendMail page */
    'sendMail stop title' => '利用停止手続き',
    'sendMail restart title' => '利用再開手続き',
    'sendMail mail label' => 'メールアドレス',
    'sendMail mail stop' => '入力したメールに利用停止手続きURLを送り致します。',
    'sendMail mail restart' => '入力したメールに利用再開手続きURLを送り致します。',

    'sendMail mail holder' => 'メールアドレスを入力して下さい。',
    'sendMail mailExist error' => ' <span style="color:red">＊入力したメールアドレスは登録されてないです。</span>',
    'sendMail button' => 'メール送信',
    'sendMail mailSend complete' => '<span style="color:blue">メールを送信しました。</span>',
    'sendMail mailSend error' => '<span style="color:red">メールは送信時にエラーが発生しました。しばらく後で再操作して下さい。</span>',

    'sendMail stop subject' => '利用停止手続きURL送信',
    'sendMail restart subject' => '利用再開手続きURL送信',
    'sendMail stop URL Label' => '利用停止手続き',
    'sendMail restart URL Label' => '利用再開手続き',

    'stop proc title' => '利用停止処理',
    'stop proc Label' => '下のチェックボックスにチェックして利用停止を行って下さい。',
    'stop proc checkbox' => '利用停止確認',
    'stop proc button' => '利用停止実行',
    'stop proc tokenErr' => '<span style="color:red">検証コードが正しくないか期間が過ぎています。</span>',
    'stop proc complate' => '<span style="color:blue">利用停止処理を完了しました。</span>',

    'restart proc title' => '利用再開処理',
    'restart proc button' => '利用再開実行',
    'restart proc tokenErr' => '<span style="color:red">検証コードが正しくないか期間が過ぎています。</span>',
    'restart proc complate' => '<span style="color:blue">利用再開処理を完了しました。</span>',
    'restart notReg' => '<span style="color:red">検証コードと一致する機器ではないです。</span>',

    'change title' => '認証機器変更',
    'change button' => '認証機器変更',
    'change mail label' => '登録メールアドレス',
    'change mail holder' => '登録したメールアドレスを入力して下さい。',
    'change mobileChk label1' => '変更する携帯又はモバイル機器確認',
    'change mobileChk label2' => '右のQRコードを変更するモバイル機器の<span style="color:#0000ff">専用アプリ</span>でスキャンして下さい。',
    'change complate' => '<span style="color:blue">認証機器変更処理を完了しました。</span>',
    'change error' => '<div><font color="red">機器変更手続き時にエラーが発生しました。</font></div><div>しばらく後に再操作して下さい。</div>',
    'change notReg' => '<span style="color:red">入力したメールアドレスに一致する機器がないです。</span>',
    'change already Reg' => 'スキャンした機器は既に登録されています。',

    'profileEdit title' => 'アカウント情報変更',
    'profileEdit name label' => 'お名前',
    'profileEdit name holder' => '変更するお名前を入力して下さい。',
    'profileEdit mail label' => '現メールアドレス',
    'profileEdit mail holder' => '現在登録されたいるメールアドレスを入力して下さい。',
    'profileEdit newMail label' => '新メールアドレス',
    'profileEdit newMail holder' => '変更するメールアドレスを入力して下さい。',
    'profileEdit newMail1 label' => '新メールアドレス(確認)',
    'profileEdit newMail1 holder' => '変更するメールアドレスを入力して下さい。',
    'profileEdit button' => 'アカウント情報変更',
    'profileEdit nonEdit' => '<span style="color:red">変更する項目がないです。</span>',
    'profileEdit notReg' => '<span style="color:red">入力したメールアドレスに一致する機器がないです。</span>',
    'profileEdit notSame' => '<span style="color:red">新メールアドレスと確認メールアドレスが一致しません。</span>',
    'profileEdit mailExist' => '<span style="color:red">既に登録されているメールアドレスです。</span>',
    'profileEdit complate' => '<span style="color:blue">アカウント情報を変更しました。</span>',

    'proc errMsg' => '<div>しばらく後に再操作して下さい。</div>',

    'auth server msg 00' => '成功',
    'auth server msg 10' => '<div><font color="red">既に利用停止状態です。</font></div>',
    'auth server msg 11' => '<div><font color="red">利用停止手続き時にエラーが発生しました。</font></div>',
    'auth server msg 12' => '<div><font color="red">利用停止状態です。</font></div>',
    'auth server msg 20' => '<div><font color="red">利用停止状態ではないです。</font></div>',
    'auth server msg 21' => '<div><font color="red">利用停止解錠手続き時にエラーが発生しました。</font></div>',
    'auth server msg 31' => '<div><font color="red">機器変更手続き時にエラーが発生しました</font></div>',
    'auth server msg 32' => '<div><font color="red">変更する機器データに誤りがあります。</font></div>',
    'auth server msg 40' => '<div><font color="red">機器変更データがありません。</font></div>',
];
