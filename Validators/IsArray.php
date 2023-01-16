<?php

namespace Gsdk\Validator\Validators;

class IsArray implements ValidatorInterface {
	public function isValid($value): bool {
		return is_array($value);
	}
}