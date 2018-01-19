<?php
namespace VRKOTHEKAR\SMS;

use Config;

class SMS {
    public static function send($msg = NULL, $mob = NULL){
        $mobile = urlencode($mob);
        $msg = $msg;
        $username = urlencode(Config::get('sms.username'));
        $pass = urlencode(Config::get('sms.password'));
        $senderid = urlencode(Config::get('sms.senderid'));
        $dest_mobileno = urlencode($mob);
        $msgtype = urlencode(Config::get('sms.msgtype'));
        $message = urlencode($msg);
        $response = urlencode(Config::get('sms.response'));
        $data = 'username='.$username.'&pass='.$pass.'&senderid='.$senderid.'&dest_mobileno='.$mobile.'&msgtype='.$msgtype.'&message='.$message.'&response='.$response;
        $ch = curl_init('http://www.smsjust.com/sms/user/urlsms.php?' . $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $submit = curl_exec($ch);
        $ch;
        curl_close($ch);
        $TodayDate = substr($submit, -2);
        if(date("d") == $TodayDate){
            return true;
        }else{
            return false;
        }
        return false;
    }
}