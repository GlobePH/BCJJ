<?php
    session_start();
    require ('src/GlobeApi.php');
    $globe = new GlobeApi();
    $auth = $globe->auth(
        ['GGgXHK5RKpu4RckxrqTRaxuGzGAGHBn7'],
        ['11949cfd6ca9d461715d92c4fa82163f43aa949676c309da12619b3bc9360e91']
    );
    
    if(!isset($_SESSION['code'])) {
        $loginUrl = $auth->getLoginUrl();
        header('Location: '.$loginUrl); 
        exit;
    }
    
    if(!isset($_SESSION['access_token'])) {
        $response = $auth->getAccessToken($_SESSION['code']);
        $_SESSION['access_token'] = $response['access_token'];
        $_SESSION['subscriber_number'] = $response['subscriber_number'];
    }
    $sms = $globe->sms(5286);
    $response = $sms->sendMessage($_SESSION['access_token'], $_SESSION['subscriber_number'], 'rakers api');
    $charge = $globe->payment(
        $_SESSION['access_token'],
        $_SESSION['subscriber_number']
    );
    $response = $charge->charge(
        0,
        '52861000001'
    );

//APP_ID: GGgXHK5RKpu4RckxrqTRaxuGzGAGHBn7 

// APP_SECRET: 11949cfd6ca9d461715d92c4fa82163f43aa949676c309da12619b3bc9360e91

?>


