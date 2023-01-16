<?php

namespace Gsdk\Validator\Rule;

interface RuleInterface {
	public function isValid($value): bool;
}