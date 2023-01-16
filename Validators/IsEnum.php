<?php

namespace Gsdk\Validator\Validators;

class IsEnum implements ValidatorInterface {
	public function __construct(private string $enumClass) { }

	public function isValid($value): bool {
		return get_class($value) === $this->enumClass;
	}
}