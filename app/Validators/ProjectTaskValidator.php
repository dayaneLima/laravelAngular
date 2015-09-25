<?php
/**
 * Created by PhpStorm.
 * User: Dayane
 * Date: 10/09/2015
 * Time: 22:43
 */

namespace CodeProject\Validators;

use Prettus\Validator\LaravelValidator;

class ProjectTaskValidator extends LaravelValidator{

    protected $rules = [
        'name' => 'required',
        'project_id' => 'required|integer',
        'start_date' => 'required|date',
        'due_date' => 'required|date',
        'status' => 'required|min:1|max:3|integer'
    ];

}