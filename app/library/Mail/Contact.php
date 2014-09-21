<?

namespace Mail;

class Contact extends Mail {

	const SUBJECT = 'New feedback through contact us form received';
	const TEMPLATE = 'emailtemplates/contact';

	protected $_template;

	public function __construct() {
		parent::__construct();
		$this->setSubject(static::SUBJECT);
	}

	public function send($data, $config) {
		// sent only to admin
		$this->setTo($config->application->adminEmail);
		$this->setFrom($config->application->fromEmail);
		$this->setReplyTo($config->application->fromEmail);

		$this->addBody($config->application->baseUri, $data);
		$this->sendEmail();
	}

	public function addBody($server, $data) {
		// Passing variables to the views, these will be created as local variables
		$this->view->setVar('server', $server);
		$this->view->setVar('data', $data);

		$this->setContent($this->view->render(self::TEMPLATE, array()));
	}
}
