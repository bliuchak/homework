<?php

class IndexController extends \Framework\AbstractController {

	const PAGE_NAME = 'home';

	public function indexAction() {
		$pagesTable = new Pages();
		$this->view->setVar(self::PAGE_NAME, $pagesTable->getPageData(self::PAGE_NAME));
	}

}
