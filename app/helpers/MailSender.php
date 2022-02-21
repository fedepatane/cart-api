<?php 

namespace App\helpers;
use Mail;


class MailSender{
	
	private $mail;

	public function MailSender(Mail $mail){
		$this->mail = $mail;
	}

	public function send($listOfStuff){

		$data = array("products", $listOfStuff);
		
		// the smtp is not configured , so this code gives an error. 
		// it just for the idea
		Mail::send('email_cart', $data, function($message) {
			$email_to_send = env('email_to_do_checkout');
			$email_from_send = env('email_to_do_checkout');			
			$message->to($email_to_send, '')->subject('Do checkout testing email');
			$message->from($email_from_send,'');
		});

	}
}