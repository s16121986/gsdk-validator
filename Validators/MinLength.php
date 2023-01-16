<?php

namespace Gsdk\Validator\Validators;

class MinLength implements ValidatorInterface {
	public function __construct(private int $min) { }

	public function isValid($value): bool {
		if (!is_string($value))
			return false;

		return mb_strlen($value) >= $this->min;
	}
}