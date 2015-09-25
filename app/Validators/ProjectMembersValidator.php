<?php
/**
 * Created by PhpStorm.
 * User: Dayane
 * Date: 10/09/2015
 * Time: 22:45
 */

namespace CodeProject\Validators;

use Prettus\Validator\LaravelValidator;

class ProjectMembersValidator extends LaravelValidator{

    protected $rules = [
        'project_id' => 'required|integer',
        'user_id' => 'required|integer'
    ];

}