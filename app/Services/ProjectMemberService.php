<?php
/**
 * Created by PhpStorm.
 * User: Dayane
 * Date: 10/09/2015
 * Time: 22:42
 */

namespace CodeProject\Services;


use CodeProject\Repositories\ProjectMemberRepository;
use CodeProject\Validators\ProjectMembersValidator;
use Illuminate\Contracts\Validation\ValidationException;
use Response;

class ProjectMemberService {

    /**
     * @var ProjectMemberRepository
     */
    private $repository;
    /**
     * @var ProjectMemberValidator
     */
    private $validator;

    public function __construct(ProjectMemberRepository $repository, ProjectMembersValidator $validator){

        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function addMember(array $data){
        try{
            $this->validator->with($data)->passesOrFail();

            $this->repository->create($data);
            return ['sucesso' => true,'project_id'=> $data['project_id'],"user_id" => $data['user_id']];
        }catch(ValidationException $e){
            return [
                'error' => true,
                'message' => $e->getMessageBag()
            ];
        }
    }

    public function removeMember($idProject,$idMember){
        $this->repository->deleteByIdProjectIdMemeber($idProject,$idMember);
        return ['sucesso' => true];
    }

    public function isMember($idProject, $idMember){
        $qtd = $this->repository->findWhere(['project_id' => $idProject, 'user_id' => $idMember]);

        if(count($qtd) > 0){
            return ['isMember' => true];
        }else{
            return ['isMember' => false];
        }
    }

    public function allMembers($id){
        return $this->repository->with(['users'])->findWhere(['project_id'=>$id])->all();
    }

}