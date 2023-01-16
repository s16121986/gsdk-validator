<?php

namespace Gsdk\Validator\Validators;

class IsNotNull implements ValidatorInterface {
	public function isValid($value): bool {
		return $value !== null;
	}
}