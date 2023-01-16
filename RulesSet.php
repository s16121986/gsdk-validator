<?php

namespace Gsdk\Validator;

use Gsdk\Validator\Rule\RuleBuilder;
use Gsdk\Validator\Rule\RuleInterface;

class RulesSet {

	protected array $rules = [];

	public static function rule(string $validators = null): RuleBuilder {
		return $validators ? new RuleBuilder($validators) : new RuleBuilder();
	}

	public function __construct(array $rules = []) {
		foreach ($rules as $k => $rule) {
			if ($rule instanceof RulesSet)
				$this->mergeSet($rule);
			else
				$this->rules[$k] = $this->ruleFactory($rule);
		}
	}

	public function getRules(): array {
		return $this->rules;
	}

	public function validate($data): ValidationResult {
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

	private function mergeSet($set): void {
		foreach ($set->getRules() as $k => $rule) {
			if (isset($this->rules[$k])) {
				foreach ($rule->getValidators() as $validator) {
					$this->rules[$k]->addValidator($validator);
				}
			} else
				$this->rules[$k] = $rule;
		}
	}

	private function ruleFactory($rule): RuleInterface {
		if ($rule instanceof RuleBuilder)
			return $rule->getRule();
		else if ($rule instanceof RuleInterface)
			return $rule;
		else if (is_string($rule))
			return (new RuleBuilder($rule))->getRule();
		else
			throw new \Exception('Validation rule format invalid');
	}

}