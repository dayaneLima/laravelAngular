<?php

namespace CodeProject\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface ProjectMemberRepositoryRepository
 * @package namespace CodeProject\Repositories;
 */
interface ProjectMemberRepository extends RepositoryInterface
{
    public function deleteByIdProjectIdMemeber($idProject,$idMember);
}
