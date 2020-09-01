<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Request;
use ReCaptcha\ReCaptcha;

class RecaptchaRule implements Rule
{

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return true;
        //return $this->isValid($value);
    }


    /**
     * @param $value
     * @return bool
     */
    public function isValid($value)
    {
        $captcha = $this->getCaptcha();
        $response = $captcha->setExpectedHostname(config('recaptcha.host'))
            ->verify($value, Request::ip());

        return $response->isSuccess();
    }

    /**
     * @param $value
     * @return ReCaptcha
     */
    public function getCaptcha()
    {
        return new ReCaptcha(config('recaptcha.secret'));
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return ':attribute inválido';
    }
}
