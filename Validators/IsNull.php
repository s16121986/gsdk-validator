<?php

namespace Gsdk\Validator\Validators;

class IsNull implements ValidatorInterface {
	public function isValid($value): bool {
		return $value === null;
	}
}