<?php

namespace Gsdk\Validator\Validators;

interface ValidatorInterface {
	public function isValid($value): bool;
}