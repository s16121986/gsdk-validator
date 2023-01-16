<?php

namespace Gsdk\Validator\Validators;

class GraterOrEqual implements ValidatorInterface {
	public function __construct(private $min) { }

	public function isValid($value): bool {
		return $value >= $this->min;
	}
}