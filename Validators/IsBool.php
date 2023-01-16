<?php

namespace Gsdk\Validator\Validators;

class IsBool implements ValidatorInterface {
	public function isValid($value): bool {
		return is_bool($value);
	}
}