<?php

namespace Gsdk\Validator\Validators;

class RegExp implements ValidatorInterface {
	public function __construct(private string $pattern) { }

	public function isValid($value): bool {
		return is_string($value) && preg_match($this->pattern, $value);
	}
}