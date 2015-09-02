<?php

namespace CodeProject\Validators;

use Prettus\Validator\LaravelValidator;

class ProjectValidator extends LaravelValidator {

    protected $rules = [
        'owner_id' => 'required|integer',
        'client_id' => 'required|integer',
        'name' => 'required',
        'progress' => 'required|min:0|max:100|integer',
        'status' => 'required|min:0|max:10|integer',
        'due_date' => 'required|date'
    ];

}