<?php

namespace Gsdk\Validator\Validators;

class IsEmpty implements ValidatorInterface {
	public function isValid($value): bool {
		return empty($value);
	}
}