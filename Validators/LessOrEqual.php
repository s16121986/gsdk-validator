<?php

namespace Gsdk\Validator\Validators;

class LessOrEqual implements ValidatorInterface {
	public function __construct(private $max) { }

	public function isValid($value): bool {
		return $value <= $this->max;
	}
}