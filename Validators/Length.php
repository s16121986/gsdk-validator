<?php

namespace Gsdk\Validator\Validators;

class Length implements ValidatorInterface {
	public function __construct(private int $min, private int $max) { }

	public function isValid($value): bool {
		if (!is_string($value))
			return false;

		$length = mb_strlen($value);

		return $length >= $this->min && $length <= $this->max;
	}
}