<?php

namespace App\Services\User;

//use Hackzilla\PasswordGenerator\Exception\CharactersNotFoundException;
//use Hackzilla\PasswordGenerator\Exception\ImpossibleMinMaxLimitsException;
//use Hackzilla\PasswordGenerator\Generator\RequirementPasswordGenerator;

class GeneratePasswordService
{
    public function __construct (
    )
    {}

    /**
     * @throws CharactersNotFoundException
     * @throws ImpossibleMinMaxLimitsException
     */

    /**
    public function generate(RequirementPasswordGenerator $passwordGenerator):string
    {
        $generator = $this->passwordGenerator;
        $generator
            ->setLength(10)
            ->setOptionValue(RequirementPasswordGenerator::OPTION_UPPER_CASE, true)
            ->setOptionValue(RequirementPasswordGenerator::OPTION_LOWER_CASE, true)
            ->setOptionValue(RequirementPasswordGenerator::OPTION_NUMBERS, true)
            ->setOptionValue(RequirementPasswordGenerator::OPTION_SYMBOLS, true)
            ->setMinimumCount(RequirementPasswordGenerator::OPTION_UPPER_CASE, 1)
            ->setMinimumCount(RequirementPasswordGenerator::OPTION_LOWER_CASE, 1)
            ->setMinimumCount(RequirementPasswordGenerator::OPTION_NUMBERS, 1)
            ->setMinimumCount(RequirementPasswordGenerator::OPTION_SYMBOLS, 1)
            ->setMaximumCount(RequirementPasswordGenerator::OPTION_UPPER_CASE, 6)
            ->setMaximumCount(RequirementPasswordGenerator::OPTION_LOWER_CASE, 6)
            ->setMaximumCount(RequirementPasswordGenerator::OPTION_NUMBERS, 6)
            ->setMaximumCount(RequirementPasswordGenerator::OPTION_SYMBOLS, 6)
        ;

        return $generator->generatePassword();
    }
     */

    function gen_password($length = 10): string
    {
        $chars = 'qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP';
        $size = strlen($chars) - 1;
        $password = '';
        while($length--) {
            $password .= $chars[random_int(0, $size)];
        }
        return $password;
    }
}
