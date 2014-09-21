/* main js file */

function validateContactForm() {
	var errors = '';

	// username validation
	var username = $("#username");
	var usernameRegex = /^[a-zA-Z]{3,70}$/;
	if (validateEmpty(username)) {
		errors = errors + "* Username should be filled\n";
	} else {
		if (validateRegex(username, usernameRegex)) {
			errors = errors + "* Username should contatin a-zA-Z min 3 max 70 chars\n";
		}
	}

	// email validation
	var email = $("#email");
	var emailRegex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if (validateEmpty(email)) {
		errors = errors + "* Email should be filled\n";
	} else {
		if (validateRegex(email, emailRegex)) {
			errors = errors + "* Invalid email addess\n";
		}
	}

	// subject validation
	var subject = $("#subject");
	var subjectRegex = '/^[a-zA-Z0-9 ]{0,70}$/';
	if (!validateEmpty(subject)) {
		if (subject.val().length > 70) {
			errors = errors + "* Subject should be less than 70 chars\n";
		}
	}

	// text validation
	var text = $("#text");
	if (validateEmpty(text)) {
		errors = errors + "* Text should be filled\n";
	}

	// captcha validato
	var captcha = $("#recaptcha_response_field");
	if (validateEmpty(captcha)) {
		errors = errors + "* Captcha should be filled\n";
	}

	if (errors) {
		alert(errors);
		return false;
	}
	return true;
}

function validateEmpty(element) {
	return element.val() === '';
}

function validateRegex(element, regex_pattern) {
	return !regex_pattern.test(element.val());
}
