<?php

namespace Gsdk\Validator;

use Gsdk\Validator\Rule\RuleBuilder;

class Validator {

	public static function rule(): RuleBuilder {
		return new RuleBuilder();
	}

	public function __construct(private array $rules = []) {

	}

	public function validateData($data): ValidationResult {
		$messages = [];
		$validatedData = [];

		foreach ($this->rules as $k => $rule) {
			if (!isset($data[$k]) && !$rule->isRequired())
				continue;

			if ($this->rules[$k]->isValid($data[$k]))
				$validatedData[$k] = $data[$k];
			else
				$messages[$k] = $this->rules[$k]->formatMessage($k);
		}

		return new ValidationResult($validatedData, $messages);
	}

	public function validateAttribute(string $attribute, $value): void {
		if (!isset($this->rules[$attribute]))
			throw new \Exception('Validation rule [' . $attribute . '] not defined');

		$rule = $this->rules[$attribute];

		if (!$rule->isValid($value))
			throw new ValidationFailedException($rule->formatMessage($attribute));
	}

}