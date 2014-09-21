<?php

class Contact extends \Framework\AbstractModel {

	public function sendFeedbackToAdmin($config) {
		$email = new Mail\Contact();
		$email->send($this, $config);
	}

}
