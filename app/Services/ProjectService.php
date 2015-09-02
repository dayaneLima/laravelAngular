<?php
/**
 * Created by PhpStorm.
 * User: Dayane
 * Date: 07/08/2015
 * Time: 20:46
 */

namespace CodeProject\Services;


use CodeProject\Repositories\ProjectRepository;
use CodeProject\Validators\ProjectValidator;
use Prettus\Validator\Exceptions\ValidatorException;
use Response;

class ProjectService {

    /**
     * @var ClientRepository
     */
    protected $repository;

    /**
     * @var ClientValidator
     */
    protected  $validator;

    public function __construct(ProjectRepository $repository, ProjectValidator $validator){
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function create(array $data){
        try {
            $this->validator->with($data)->passesOrFail();
            return $this->repository->create($data);
        }catch(ValidatorException $e){
            return [
                'error' => true,
                'message' => $e->getMessageBag()
            ];
        }
    }

    public function update(array $data,$id){
        try {
            $this->validator->with($data)->passesOrFail();

            return $this->repository->update($data, $id);
        }catch(ValidatorException $e){
//            $returnData = array(
//                'error' => true,
//                'status' => 'error',
//                'message' => $e->getMessageBag()
//            );
//            return Response::json($returnData, 500);
            return [
                'error' => true,
                'message' => $e->getMessageBag()
            ];
        }
    }

    public function find($id){
        return $this->repository->with(['owner','client'])->find($id);
    }

    public function all(){
        return $this->repository->with(['owner','client'])->all();
    }

}