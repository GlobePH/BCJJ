<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Twilio\Rest\Client; 

class Home extends CI_Controller {



    public function __construct()
    {
        parent::__construct();
        $this->curpage = "Home";
        $this->load->model('Users_model');

        date_default_timezone_set("Asia/Manila");
        $this->date = date("F d, Y");
        $this->time = date("g:i A");
    }

    public function index()
    {
        $details = array (
            'information'       =>  $this->Users_model->get_information_no($this->session->user_session->NO),
            'get_all'           =>  $this->Users_model->get_all_user_setup_yes(),
            'date'              =>  $this->date,
            'time'              =>  $this->time
        );

        $data['content']    =   $this->load->view('homecontent', $details, TRUE);
        $data['curpage']    =   $this->curpage;
        $this->load->view('template', $data);
    }

    public function notify_message()
    {
        $get_id        =   $this->input->post('get_id');
        $date           =   $this->input->post('date');
    
        $params = array (
            'DATE'      =>  $date
        );

        $this->Users_model->update($get_id, $params);
    }

    public function sendMessage()
    {
        // $statusTraffic  =   $this->input->post('statusTraffic');
        // $dist   =   $this->input->post('dist');
        // $dura   =   $this->input->post('dura');



        // require_once 'twilio-php/Twilio/autoload.php'; // Loads the library 


        // $sid = 'ACfcd7e61e1265460aa73e9e41412a838e'; 
        // $token = 'ed5e770dcff6bbed002dffdbb9585712'; 
        // $client = new Twilio\Rest\Client($sid, $token);
        // $message = $client->messages->create(
        //   '8881231234', // Text this number
        //   array(
        //     'from' => '9991231234', // From a valid Twilio number
        //     'body' => 'Hello from Twilio!'
        //   )
        // );

        // $client->messages->create(
        //     // the number you'd like to send the message to
        //     '+639568520417',
        //     array(
        //         // A Twilio phone number you purchased at twilio.com/console
        //         'from' => '+13016912794',
        //         // the body of the text message you'd like to send
        //         'body' => "Hey Jenny! Good luck on the bar exam!"
        //     )
        // );

    }

    public function insert()
    {
        $txt_name_su    =   $this->input->post('txt_name_su');
        $txt_email_su   =   $this->input->post('txt_email_su');
        $txt_pword_su   =   $this->input->post('txt_pword_su');
        $platform       =   $this->input->post('platform');

        $date = DateTime::createFromFormat('F d, Y', $ga->DATE);
        $date->modify('+1 day');
        $params = array(
            'NO'            =>  '',
            'NAME'          =>  $txt_name_su,
            'EMAIL'         =>  $txt_email_su,
            'PASSWORD'      =>  md5($txt_pword_su),
            'PLATFORM'      =>  $platform,
            'CONTACTNO'     =>  '',
            'SMSSETUP'      =>  'NO',
            'TIME'          =>  '',
            'TO_LOCATION'   =>  '',
            'FROM_LOCATION' =>  '',
            'DATE'          =>  $date->format('F d, Y'),
            'DELETION'      =>  0
        );

        $check = $this->Users_model->check_duplicate_email($txt_email_su);
        if ( $check == 0 ) {
            $this->Users_model->insert($params);
        }

        echo $check;
    }

    public function login()
    {
        $txt_email      =   $this->input->post('txt_email');
        $txt_pword      =   $this->input->post('txt_pword');
        $flag           =   0;

        $check = $this->Users_model->get_information($txt_email, $txt_pword);

        if ( !empty($check) ) {
            $flag = 0;
            $this->session->set_userdata('user_session', $check);
        } else {
            $flag = 1;
        }

        echo $flag;
    }

    public function test()
    {
        require_once('public/globelabs/src/GlobeApi.php');
        $globe = new GlobeApi();
        $auth = $globe->auth(
            ['GGgXHK5RKpu4RckxrqTRaxuGzGAGHBn7'],
            ['11949cfd6ca9d461715d92c4fa82163f43aa949676c309da12619b3bc9360e91']
        );

        if(!isset($_SESSION['code'])) {
            $loginUrl = $auth->getLoginUrl('GGgXHK5RKpu4RckxrqTRaxuGzGAGHBn7');
            header('Location: '.$loginUrl); 
            exit;
        }
        
        // if(!isset($_SESSION['access_token'])) {
        //     $response = $auth->getAccessToken($_SESSION['code']);
        //     $_SESSION['access_token'] = $response['access_token'];
        //     $_SESSION['subscriber_number'] = $response['subscriber_number'];
        // }
        // $sms = $globe->sms(5286);
        // $response = $sms->sendMessage($_SESSION['access_token'], $_SESSION['subscriber_number'], 'rakers api');
        // $charge = $globe->payment(
        //     $_SESSION['access_token'],
        //     $_SESSION['subscriber_number']
        // );
        // $response = $charge->charge(
        //     0,
        //     '52861000001'
        // );

        // $sms = $globe->sms(9227);
        // $globe->getAccessToken('GGgXHK5RKpu4RckxrqTRaxuGzGAGHBn7', '11949cfd6ca9d461715d92c4fa82163f43aa949676c309da12619b3bc9360e91',9227)
        // print_r($_GET['access_token']);
        // require_once();
        // $get_access = $auth->getAccessToken(9227);
        // print_r($get_access);
        // var_dump(parse_url('https://devapi.globelabs.com.ph/smsmessaging/v1/outbound/9227/requests?access_token= '));
        // $response = $sms->sendMessage('3ZLVbe-81VtybEyJe_wlfTgEbCxVord7pwDSSKkX1EA', '9275650622', 'HACKATHON 2017 TEST');
    }

    public function using_facebook()
    {
        $fb_email   =   $this->input->post('fb_email');
        $fb_id      =   $this->input->post('fb_id');
        $fb_fname   =   $this->input->post('fb_fname');
        $fb_lname   =   $this->input->post('fb_lname');
        $fb_name    =   $this->input->post('fb_name');

        if ( empty($this->input->post('fb_email')) ) {
            $fb_email = $fb_id . '@facebook.com';
        }

        $date = DateTime::createFromFormat('F d, Y', $ga->DATE);
        $date->modify('+1 day');

        $params = array(
            'NO'            =>  '',
            'NAME'          =>  $fb_fname . ' ' . $fb_lname,
            'EMAIL'         =>  $fb_email,
            'PASSWORD'      =>  md5($fb_id),
            'PLATFORM'      =>  'Facebook',
            'CONTACTNO'     =>  '',
            'SMSSETUP'      =>  'NO',
            'TIME'          =>  '',
            'TO_LOCATION'   =>  '',
            'FROM_LOCATION' =>  '',
            'DATE'          =>  $date->format('F d, Y'),
            'DELETION'      =>  0
        );

        $check = $this->Users_model->check_duplicate_email($fb_email);
        if ( $check == 0 ) {
            $this->Users_model->insert($params);
        }

        echo $check;
    }

    public function login_facebook()
    {
        $fb_email       =   $this->input->post('fb_email');
        $fb_id    =   $this->input->post('fb_id');
        $flag           =   0;

        if ( empty($this->input->post('fb_email')) ) {
            $fb_email = $fb_id . '@facebook.com';
        }

        $check = $this->Users_model->get_information($fb_email, $fb_id);

        if ( !empty($check) ) {
            $flag = 0;
            $this->session->set_userdata('user_session', $check);
        } else {
            $flag = 1;
        }



        echo $flag;
    }

    public function update()
    {
        $params = array( 
            'CONTACTNO'     =>  $this->input->post('txt_contact_set'),
            'SMSSETUP'      => 'YES',
            'TIME'          =>  $this->input->post('timepicker1_set'),
            'TO_LOCATION'   =>  $this->input->post('txt_to_address_set'),
            'FROM_LOCATION' =>  $this->input->post('txt_from_address_set')
        );

        $this->Users_model->update($this->session->user_session->NO, $params);
    }
}
