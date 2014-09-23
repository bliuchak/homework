<?

namespace ContactForm;

class ContactForm extends \Framework\Forms\Form {

	const FORM_ACTION = 'contact/index';

	const USERNAME_LABEL = 'Username';
	const USERNAME_NAME = 'username';
	const USERNAME_REQUIRE_MESSAGE = 'Username field should be filled.';
	const USERNAME_REGEX_PATTERN = '/^[a-zA-Z]{3,70}$/';

	const EMAIL_LABEL = 'Email';
	const EMAIL_NAME = 'email';
	const EMAIL_REQUIRE_MESSAGE = 'Email field should be filled.';
	const EMAIL_VALIDATOR_MESSAGE = 'Email you provided is incorrect. Please enter new email.';

	const SUBJECT_LABEL = 'Subject';
	const SUBJECT_NAME = 'subject';
	const SUBJECT_REGEX_PATTERN = '/^[a-zA-Z0-9 ]{0,70}$/';
	const SUBJECT_VALIDATOR_LENGTH_MAX = 70;
	const SUBJECT_VALIDATOR_LENGTH_MAX_MESSAGE = 'Subject is too long. Please, choose another one.';

	const TEXT_LABEL = 'Text';
	const TEXT_NAME = 'text';
	const TEXT_REQUIRE_MESSAGE = 'Text field should be filled.';

	const SUBMIT_LABEL = 'Send';
	const SUBMIT_NAME = 'submit';

	public function initialize() {
		$this->setAction(self::FORM_ACTION);

		// username
		$element = new \Phalcon\Forms\Element\Text(self::USERNAME_NAME, array('id' => self::USERNAME_NAME));
		$element->setLabel(self::USERNAME_LABEL);
		$element->addValidators(array(
				new \Phalcon\Validation\Validator\PresenceOf(array(
						'message' => self::USERNAME_REQUIRE_MESSAGE)),
				new \Phalcon\Validation\Validator\Regex(array(
						'pattern' => self::USERNAME_REGEX_PATTERN ))
		));
		$this->add($element);

		// email
		$element = new \Phalcon\Forms\Element\Text(self::EMAIL_NAME, array('id' => self::EMAIL_NAME));
		$element->setLabel(self::EMAIL_LABEL);
		$element->addValidators(array(
				new \Phalcon\Validation\Validator\PresenceOf(array(
						'message' => self::EMAIL_REQUIRE_MESSAGE)),
				new \Phalcon\Validation\Validator\Email(array(
						'message' => self::EMAIL_VALIDATOR_MESSAGE ))
		));
		$this->add($element);

		// subject
		$element = new \Phalcon\Forms\Element\Text(self::SUBJECT_NAME, array('id' => self::SUBJECT_NAME));
		$element->setLabel(self::SUBJECT_LABEL);
		$element->addValidators(array(
				new \Phalcon\Validation\Validator\StringLength(array(
						'max' => self::SUBJECT_VALIDATOR_LENGTH_MAX,
						'messageMaximum' => self::SUBJECT_VALIDATOR_LENGTH_MAX_MESSAGE )),
				new \Phalcon\Validation\Validator\Regex(array(
						'pattern' => self::SUBJECT_REGEX_PATTERN ))
		));
		$this->add($element);

		// text
		$element = new \Phalcon\Forms\Element\TextArea(self::TEXT_NAME, array('id' => self::TEXT_NAME));
		$element->setLabel(self::TEXT_LABEL);
		$element->addValidators(array(
			new \Phalcon\Validation\Validator\PresenceOf(array(
					'message' => self::TEXT_REQUIRE_MESSAGE))
		));
		$this->add($element);

		// submit
		$element = new \Phalcon\Forms\Element\Submit(self::SUBMIT_NAME, array('id' => self::SUBMIT_NAME));
		$element->setDefault(self::SUBMIT_LABEL);
		$this->add($element);
	}

}
