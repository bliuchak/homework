<?php

class Pages extends \Framework\AbstractModel {

	public function getPageData($title) {
		return self::findFirst(
			array(
				'title = :title:',
				'bind' => array('title' => $title)
			)
		);
	}

}
