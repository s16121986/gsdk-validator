<?php

namespace Gsdk\Validator\Validators;

class MaxLength implements ValidatorInterface {
	public function __construct(private int $max) { }

	public function isValid($value): bool {
		if (!is_string($value))
			return false;

		return mb_strlen($value) <= $this->max;
	}
}