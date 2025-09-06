<?php

declare(strict_types=1);

namespace Framework;

use Framework\Contracts\RuleInterface;
use Framework\Exceptions\ValidationException;
class Validator
{

    private array $rules = [];


    public function add(string $alias, RuleInterface $rule)
    {
        $this->rules[$alias] = $rule;
    }
    public function validate(array $fromData, array $fields)
    {
        $errors = [];
        foreach ($fields as $fieldName => $rules)
        {
            foreach ($rules as $rule)
            {
                $ruleValidator = $this->rules[$rule];
                if ($ruleValidator->validate($fromData, $fieldName, []))
                {
                    continue;
                }
                else
                {
                    $errors[$fieldName][] = $ruleValidator->getMessage($fromData, $fieldName, []);
                }
            }
        }
        if(count($errors))
        {
            throw new ValidationException();
        }

    }
}
