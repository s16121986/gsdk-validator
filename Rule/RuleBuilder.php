<?php

namespace Gsdk\Validator\Rule;

use Gsdk\Validator\Validators;

class RuleBuilder {
	private $rule;

	/*public function __call(string $name, array $arguments) {
		$ruleClass = __NAMESPACE__ . '\Validators\\' . ucfirst($name);
		if (!class_exists($ruleClass))
			throw new \Exception('Validator rule ' . $name . ' not exists');

		return $this->addValidator(new $ruleClass(...$arguments));
	}*/

	public function __construct() {
		$this->rule = new Rule();
	}

	public function required(): static {
		$this->rule->required();

		return $this;
	}

	public function isEqual($value): static {
		return $this->addValidator(new Validators\Equal($value));
	}

	public function isNotEqual($value): static {
		return $this->addValidator(new Validators\NotEqual($value));
	}

	public function isNotNull(): static {
		return $this->addValidator(new Validators\IsNotNull());
	}

	public function isNotEmpty(): static {
		return $this->addValidator(new Validators\IsNotEmpty());
	}

	public function isInt(): static {
		return $this->addValidator(new Validators\IsInt());
	}

	public function isString(): static {
		return $this->addValidator(new Validators\IsString());
	}

	public function isBool(): static {
		return $this->addValidator(new Validators\IsBool());
	}

	public function isArray(): static {
		return $this->addValidator(new Validators\IsArray());
	}

	public function isEmail(): static {
		return $this->addValidator(new Validators\IsEmail());
	}

	public function isEnum(string $enumClass): static {
		return $this->addValidator(new Validators\IsEnum($enumClass));
	}

	public function length(int $min, int $max): static {
		return $this->addValidator(new Validators\Length($min, $max));
	}

	public function minLength(int $min): static {
		return $this->addValidator(new Validators\MinLength($min));
	}

	public function maxLength(int $max): static {
		return $this->addValidator(new Validators\MaxLength($max));
	}

	public function less($max): static {
		return $this->addValidator(new Validators\Less($max));
	}

	public function lessOrEqual($max): static {
		return $this->addValidator(new Validators\LessOrEqual($max));
	}

	public function grater($min): static {
		return $this->addValidator(new Validators\Grater($min));
	}

	public function graterOrEqual($min): static {
		return $this->addValidator(new Validators\GraterOrEqual($min));
	}

	public function regExp(string $pattern): static {
		return $this->addValidator(new Validators\RegExp($pattern));
	}

	private function addValidator($validator): static {
		$this->rule->addValidator($validator);

		return $this;
	}
}