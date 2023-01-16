<?php

namespace Gsdk\Validator\Validators;

class IsEmail implements ValidatorInterface {
	public function isValid($value): bool {
		return filter_var($value, FILTER_VALIDATE_EMAIL);
	}
}