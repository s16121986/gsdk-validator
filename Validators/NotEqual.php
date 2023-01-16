<?php

namespace Gsdk\Validator\Validators;

class NotEqual implements ValidatorInterface {
	public function __construct(private $value) { }

	public function isValid($value): bool {
		return $value !== $this->value;
	}
}