<?php

namespace Gsdk\Validator\Rule;

use Gsdk\Validator\Validators\ValidatorInterface;

class Rule implements RuleInterface {

	private bool $required = false;

	private array $validators = [];

	private string $message = ':attribute validation failed';

	private array $messages = [];

	public function __construct() { }

	public function message(string $message): static {
		$this->message = $message;

		return $this;
	}

	public function messages(array $messages): static {
		$this->messages = $messages;

		return $this;
	}

	public function required(): static {
		$this->required = true;

		return $this;
	}

	public function addValidator(ValidatorInterface $validator): static {
		$this->validators[] = $validator;

		return $this;
	}

	public function getValidators(): array {
		return $this->validators;
	}

	public function isRequired(): bool {
		return $this->required;
	}

	public function isValid($value): bool {
		foreach ($this->validators as $validator) {
			if (!$validator->isValid($value))
				return false;
		}

		return true;
	}

	public function formatMessage($attribute): string {
		return str_replace(':attribute', $attribute, $this->message);
	}
}