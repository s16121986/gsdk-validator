<?php

namespace Gsdk\Validator;

class ValidationResult {

	public function __construct(private array $validatedData, private array $messages = []) {

	}

	public function __get(string $name) {
		return $this->validatedData[$name] ?? null;
	}

	public function isValid(): bool {
		return empty($this->messages);
	}

	public function data(): array {
		return $this->validatedData;
	}

	public function messages(): array {
		return $this->messages;
	}

	public function throwException() {

	}

}