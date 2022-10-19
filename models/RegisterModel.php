<?php

namespace app\models;

use app\core\Model;

class RegisterModel extends Model
{
    public String $first_name;
    public String $last_name;
    public String $email;
    public String $password;
    public String $password_confirmation;

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'first_name' => [self::RULE_REQUIRED],
            'last_name' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 3], [self::RULE_MAX, 'max' => 6]],
            'password_confirmation' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']],
        ];
    }
}
