<?php

Validator::extend('rerecaptcha', function($attribute, $recaptcha, $params)
{
    return Rerecaptcha::check($recaptcha);
});
