<?php
/**
 * Created by PhpStorm.
 * User: Dayane
 * Date: 07/08/2015
 * Time: 21:34
 */

namespace CodeProject\Validators;

use Prettus\Validator\LaravelValidator;

class ClientValidator extends LaravelValidator {

    protected $rules = [
        'name' => 'required|max:255',
        'responsible' => 'required|max:255',
        'email' => 'required|email',
        'phone' => 'required',
        'address' => 'required'
    ];

}