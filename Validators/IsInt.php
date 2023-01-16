<?php

namespace Gsdk\Validator\Validators;

class IsInt implements ValidatorInterface {
	public function isValid($value): bool {
		return is_int($value);
	}
}