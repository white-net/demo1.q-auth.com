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
    'Sign In' => 'Sign in',
    'E-Mail' => 'E-Mail',
    'Password' => 'Password',
    'Log in' => 'Log in',
    /* header */
    'Title' => 'Q Authorized Demo',
    'Account' => 'User Account',
    'Sign Up' => 'Sign Up',
    'Log Out' => 'Log Out',
    'Log In' => 'Log In',
    'Stop' => 'Stop Procedure',
    'Restart' => 'Restart Procedure',
    'Change' => 'Authorize Device Change',
    'Account Modify' => 'Account Modify',


    /* login page */
    'login label1' => 'You can use a secure login method without user ID / password',
    'login label2' => 'If you scan the QR Code below with a special App, you will be logged in <b> Automatic </ b>',
    'login mobile' => '<div><span style="color:#0000ff">*</span> If the device is registered, please <b> tap </ b> QR.</div>',

    /* new regist page */
    'reg alread' => ' already registered.',
    'reg notReg' => 'Member registration is required',
    'reg name label' => 'Name',
    'reg name holder' => 'Please enter your name.',
    'reg mail label' => 'E-Mail Address',
    'reg mail holder' => 'Please enter your email address.',
    'reg mobileChk label1' => 'Mobile device check',
    'reg mobileChk label2' => 'Please scan the QR Code on the right with <span style="color:#0000ff"> special App </span>.',
    'reg mobileChk holderNO' => 'UnConfirmed',
    'reg mobileChk holderOK' => 'Confirmed',
    'reg mailExist error' => ' E-mail address already registered.',

    'reg button' => 'Member Registration',

    /* profile page */
    'profile title' => 'Profile',
    'profile name label' => 'Name',
    'profile mail label' => 'E-Mail Address',

    /* sendMail page */
    'sendMail stop title' => 'Stop Procedure',
    'sendMail restart title' => 'Restart Procedure',
    'sendMail mail label' => 'E-Mail Address',
    'sendMail mail stop' => 'We will send you a stop procedure URL to the email you entered.',
    'sendMail mail restart' => 'We will send you a restart procedure URL to the email you entered.',
    'sendMail mail holder' => 'Please enter your email address.',
    'sendMail mailExist error' => ' *E-mail address not registered.',
    'sendMail button' => 'Mail Send',
    'sendMail mailSend complete' => '<span style="color:blue">The E-mail has been sent.</span>',
    'sendMail mailSend error' => '<span style="color:red">An error occurred when sending mail.Please try again later.</span>',

    'sendMail stop subject' => 'stop procedure URL transmission',
    'sendMail restart subject' => 'Restart procedure URL transmission',
    'sendMail stop URL Label' => 'stop procedure',
    'sendMail restart URL Label' => 'Restart procedure',

    'stop proc title' => 'Stop procedure',
    'stop proc Label' => 'Please check the box below to stop using it.',
    'stop proc checkbox' => 'Stop Conform',
    'stop proc button' => 'Stop procedure',
    'stop proc tokenErr' => '<span style="color:red">The verification code is incorrect or the period has passed.</span>',
    'stop proc complate' => '<span style="color:blue">The stop processing has been completed.</span>',

    'restart proc title' => 'Restart procedure',
    'restart proc button' => 'Restart procedure',
    'restart proc tokenErr' => '<span style="color:red">The verification code is incorrect or the period has passed.</span>',
    'restart proc complate' => '<span style="color:blue">The Restart processing has been completed.</span>',
    'restart notReg' => '<span style="color:red">Not a device that matches the verification code.</span>',

    'change title' => 'Authentication device change',
    'change button' => 'Authentication device change',
    'change mail label' => 'Registered mail address',
    'change mail holder' => 'Please enter your registered mail address.。',
    'change mobileChk label1' => 'Confirm mobile device to be changed',
    'change mobileChk label2' => 'Please scan the QR Code on the right with <span style="color:#0000ff"> special App </span>.',
    'change complate' => '<span style="color:blue">The authentication device change processing has been completed.</span>',
    'change error' => '<div><span style="color:red">An error occurred when Authentication device change.Please try again later.</span></div>',
    'change notReg' => '<span style="color:red">There is no device that matches the entered mail address.</span>',
    'change already Reg' => 'The device that scanned the QR code is already registered.',

    'profileEdit title' => 'Change account information',
    'profileEdit name label' => 'Name',
    'profileEdit name holder' => 'Enter your name to change.',
    'profileEdit mail label' => 'Registered mail address',
    'profileEdit mail holder' => 'Please enter your registered mail address.',
    'profileEdit newMail label' => 'Mail address to change',
    'profileEdit newMail holder' => 'Enter the email address to be changed.',
    'profileEdit newMail1 label' => 'Mail address to change (confirmation)',
    'profileEdit newMail1 holder' => 'Enter the email address to be changed.',
    'profileEdit button' => 'Change account information',
    'profileEdit nonEdit' => '<span style="color:red">There are no items to change.</span>',
    'profileEdit notReg' => '<span style="color:red">There is no device that matches the entered mail address.</span>',
    'profileEdit notSame' => '<span style="color:red">The mail address to be changed does not match the confirmation mail address.</span>',
    'profileEdit mailExist' => '<span style="color:red">An mail address already registered.</span>',
    'profileEdit complate' => '<span style="color:blue">Account information has been changed.</span>',

    'proc errMsg' => '<div>Please try again later.</div>',

    'auth server msg 00' => 'success',
    'auth server msg 10' => '<div><font color="red">It has already been suspended.</font></div>',
    'auth server msg 11' => '<div><font color="red">An error occurred during the emergency stop procedure.</font></div>',
    'auth server msg 12' => '<div><font color="red">It has been suspended of use.</font></div>',
    'auth server msg 20' => '<div><font color="red">It is not in use suspension state.</font></div>',
    'auth server msg 21' => '<div><font color="red">An error occurred during the emergency stop unlocking procedure.</font></div>',
    'auth server msg 31' => '<div><font color="red">An error occurred during the device change procedure.</font></div>',
    'auth server msg 32' => '<div><font color="red">The data of the device to be changed is incorrect.</font></div>',
    'auth server msg 40' => '<div><font color="red">The data of the device to be changed is none</font></div>',
];
