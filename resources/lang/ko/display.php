<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    /* Login content */
    'Sign In' => '로그인',
    'E-Mail' => '메일 주소',
    'Password' => '패스워드',
    'Log in' => '로그인',
    /* header */
    'Title' => 'Q인증 데모',
    'Account' => '계정',
    'Sign Up' => '신규 등록',
    'Log Out' => '로그아웃',
    'Log In' => '로그인',
    'Stop' => '이용 정지 처리',
    'Restart' => '이용 재개 처리',
    'Change' => '인증 기기 변경',
    'Account Modify' => '계정 정보 변경',


    /* login page */
    'login label1' => '유저아이디 / 패스워드가 필요없은 로그인 방법을 제공합니다.',
    'login label2' => '아래의 QR코그를 전용 앱으로 스캔하면 <b>자동으로</b> 로그인 됩니다.',
    'login mobile' => '<div><span style="color:#0000ff">*</span> 등록된 기기일 경우 QR코드를 <b>탭</b>하여 주십시오.</div>',

    /* new regist page */
    'reg alread' => ' 이미 등록 되었습니다.',
    'reg notReg' => '회원 등록을 해 주십시오.',
    'reg name label' => '이름',
    'reg name holder' => '이름을 입력해 주십시오',
    'reg mail label' => '메일 주소',
    'reg mail holder' => '메일 주소를 입력해 주십시오.',
    'reg mobileChk label1' => '스마트폰 또는 모바일 기기 확인',
    'reg mobileChk label2' => '오른쪽 QR코드를 <span style="color:#0000ff">전용 앱</span>으로 스캔해 주십시오.',
    'reg mobileChk holderNO' => '미확인',
    'reg mobileChk holderOK' => '확인됨',
    'reg mailExist error' => ' 이미 등록된 메일 주소 입니다.',

    'reg button' => '회원 등록',

     /* profile page */
    'profile title' => '프로필',
    'profile name label' => '이름',
    'profile mail label' => '메일 주소',

     /* sendMail page */
    'sendMail stop title' => '이용 정지 처리',
    'sendMail restart title' => '이용 재개 처리',
    'sendMail mail label' => '메일 주소',
    'sendMail mail stop' => '입력한 메일 주소로 이용 정지 처리 URL을 전송합니다.',
    'sendMail mail restart' => '입력한 메일 주소로 이용 재개 처리 URL을 전송합니다.',
    'sendMail mail holder' => '메일 주소를 입력해 주십시오.',
    'sendMail mailExist error' => ' *등록되지않은 메일 주소입니다.',
    'sendMail button' => '메일 송신',
    'sendMail mailSend complete' => '<span style="color:blue">메일을 보냈습니다.</span>',
    'sendMail mailSend error' => '<span style="color:red">메일 전송중에 에라가 발생했습니다.잠시 후에 다시 실행해 주십시오.</span>',

    'sendMail stop subject' => '이용 정지 처리 URL 송부',
    'sendMail restart subject' => '이용 재개 처리 URL 송부',
    'sendMail stop URL Label' => '이용 정지 처리',
    'sendMail restart URL Label' => '이용 재개 처리',

    'stop proc title' => '이용 정지 처리',
    'stop proc Label' => '아래의 체크박스에 체크한후 이용 정지 처리를 해 주새요.',
    'stop proc checkbox' => '이용 정지 확인',
    'stop proc button' => '이용 정지 실행',
    'stop proc tokenErr' => '<span style="color:red">검증 코드가 잘못되었거나 기간이 지났습니다.</span>',
    'stop proc complate' => '<span style="color:blue">이용 정지 처리를 정상적으로 완료하였습니다.</span>',

    'restart proc title' => '이용 재개 처리',
    'restart proc button' => '이용 재개 실행',
    'restart proc tokenErr' => '<span style="color:red">검증 코드가 잘못되었거나 기간이 지났습니다.</span>',
    'restart proc complate' => '<span style="color:blue">이용 재개 처리를 정상적으로 완료하였습니다.</span>',
    'restart notReg' => '검증 코드와 일치하는 기기가 아님니다.',

    'change title' => '인증 기기 변경',
    'change button' => '인증 기기 변경',
    'change mail label' => '등록된 메일 주소',
    'change mail holder' => '등록된 메일 주소를 입력해 주십시오.',
    'change mobileChk label1' => '변경할 스마트폰 또는 모바일 기기 확인',
    'change mobileChk label2' => '오른쪽 QR코드를 <span style="color:#0000ff">전용 앱</span>으로 스캔해 주십시오.',
    'change complate' => '<span style="color:blue">인증 기기 변경 처리를 정상적으로 완료하였습니다.</span>',
    'change error' => '<div><font color="red">인증 기기 변경 처리중에 에라가 발생했습니다.</font></div><div>잠시 후에 다시 실행해 주십시오.</div>',
    'change notReg' => '<span style="color:red">입력한 메일 주소에 해당하는 기기가 없습니다.</span>',
    'change already Reg' => '지금 QR코드를 스캔한 기기는 이미 등록되어있습니다.',

    'profileEdit title' => '계정 정보 변경',
    'profileEdit name label' => '성명',
    'profileEdit name holder' => '변경할 이름을 입력해 주십시오.',
    'profileEdit mail label' => '등록된 메일 주소',
    'profileEdit mail holder' => '등록된 메일 주소를 입력해 주십시오.',
    'profileEdit newMail label' => '변경할 메일 주소',
    'profileEdit newMail holder' => '변경할 메일 주소를 입력해 주십시오.',
    'profileEdit newMail1 label' => '변경할 메일 주소 (확인)',
    'profileEdit newMail1 holder' => '변경할 메일 주소를 입력해 주십시오.',
    'profileEdit button' => '계정 정보 변경',
    'profileEdit nonEdit' => '<span style="color:red">변경할 항목이 없습니다.</span>',
    'profileEdit notReg' => '<span style="color:red">입력한 메일 주소에 해당하는 기기가 없습니다.</span>',
    'profileEdit notSame' => '<span style="color:red">변경할 메일 주소와 확인용 메일 주소가 일치하지 않습니다.</span>',
    'profileEdit mailExist' => '<span style="color:red">입력한 변경 메일 주소가 이미 등록되어 있습니다.</span>',
    'profileEdit complate' => '<span style="color:blue">계정 정보를 변경하였습니다.</span>',

    'proc errMsg' => '<div>잠시후 다시 실행해 주십시오.</div>',

    'auth server msg 00' => '성공',
    'auth server msg 10' => '<div><font color="red">이미 이용 정지 상태입니다.</font></div>',
    'auth server msg 11' => '<div><font color="red">정지 처리중에 에라가 발생 했습니다.</font></div>',
    'auth server msg 12' => '<div><font color="red">이용 정지 상태입니다.</font></div>',
    'auth server msg 20' => '<div><font color="red">이용 정지 상태가 아닙니다.</font></div>',
    'auth server msg 21' => '<div><font color="red">이용 정지 해재중에 에라가 발생 했습니다.</font></div>',
    'auth server msg 31' => '<div><font color="red">인증 기기 변경 처리중에 에라가 발생 했습니다.</font></div>',
    'auth server msg 32' => '<div><font color="red">변경할 기기 데이타가 잘못되었습니다.</font></div>',
    'auth server msg 40' => '<div><font color="red">변경할 기기 데이타가 없습니다.</font></div>',
];
