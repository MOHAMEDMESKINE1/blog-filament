<?php

namespace App\Rules;

use Closure;
use Illuminate\Support\Facades\Http;
use Illuminate\Contracts\Validation\ValidationRule;

class ReCaptcha implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
    }
    public function passes($attribute, $value)
    {
        $response = Http::get("https://www.google.com/recaptcha/api/siteverify",[
            'secret' => env('RECAPTCHA_SECRET_KEY'),
            'response' => $value
        ]);
          
        return $response->json()["success"];
    }
    public function message()
    {
        return 'The google recaptcha is required.';
    }
}
