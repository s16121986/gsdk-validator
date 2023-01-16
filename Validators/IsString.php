<?php

namespace Gsdk\Validator\Validators;

class IsString implements ValidatorInterface {
	public function isValid($value): bool {
		return is_string($value);
	}
}