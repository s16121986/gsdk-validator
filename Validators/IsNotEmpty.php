<?php

namespace Gsdk\Validator\Validators;

class IsNotEmpty implements ValidatorInterface {
	public function isValid($value): bool {
		return !empty($value);
	}
}