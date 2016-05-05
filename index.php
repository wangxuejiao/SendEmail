<?php
include("class.sendmail.php");

$sendmail = new sendmail();

$from = '2461841580@qq.com';
$to = '18603911328@163.com,wangxuejiao@impay.com.cn';
$subject = 'sendmail';
$send_body = 'hahhhah,success';
$password = 'rzmmspygyopydhij';//$from client authorization password

$sendmail->send_email($from, $to, $subject, $send_body, $password);
