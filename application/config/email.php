<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['protocol']  = 'smtp';
$config['smtp_host'] = 'ssl://smtp.gmail.com'; //'mail.onerds.com';
$config['smtp_user'] = 'tks@gumi.ph'; //'support+onerds.com';
$config['smtp_pass'] = '?????????'; //'support';

//!$config['smtp_auth'] = 'true';
//!$config['smtp_secure'] = 'ssl';

$config['priority'] = '1'; //'26';
//!$config['bcc_batch_mode'] = '1'; //'26';
//!$config['bcc_batch_size'] = '200'; //'26';

$config['smtp_port'] = '465'; //'26';
$config['mailtype']  = 'html';
$config['charset']   = 'utf-8';
$config['newline'] = "\r\n";
/* End of file main.php */
/* Location: ./application/config/email.php */