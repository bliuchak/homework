<?php

class GalleryController extends \Framework\AbstractController {

	const PAGE_NAME = 'gallery';

	public function indexAction() {
		// enable specific js and css content for only this page
		$this->view->setVar(self::PAGE_NAME, true);
		// get page data from db
		$pagesTable = new Pages();
		$this->view->setVar(self::PAGE_NAME, $pagesTable->getPageData(self::PAGE_NAME));
	}

}
