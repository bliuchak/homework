<?php

class ContactController extends \Framework\AbstractController {

	const PAGE_NAME = 'contact';

	public function indexAction() {
		// setup captcha
		if (!$this->view->captcha) $this->view->setVar('captcha', new Captcha\Captcha($this->getDI()->get('config')->recaptcha));
		// get page data
		$pagesTable = new Pages();
		$this->view->setVar(self::PAGE_NAME, $pagesTable->getPageData(self::PAGE_NAME));
		// prepare form
		if (!$this->view->form) $this->view->setVar('form', new \ContactForm\ContactForm());
		if ($this->getDI()->getRequest()->isPost()) {
			$this->view->form = new \ContactForm\ContactForm();
			$newContact = new Contact();
			if ($this->view->form->isValid($this->getDI()->getRequest()->getPost(), $newContact)
						&& $this->view->getVar('captcha')->checkAnswer($this->getDI()->getRequest())) {
				// create new feedback
				$newContact->create();
				// send notification to webmaster
				$newContact->sendFeedbackToAdmin($this->getDI()->get('config'));
				return $this->_forwardContactIndex();
			} else {
				// output error message
				$this->view->setVar('errors', $this->view->form->getMessages());
			}
		}
	}

	protected function _forwardContactIndex() {
		return $this->dispatcher->forward(array('controller' => 'index','action' => 'index'));
	}

}
