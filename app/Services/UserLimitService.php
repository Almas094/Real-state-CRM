<?php

namespace App\Services;

use App\Repositories\UserLimitRepository;

class UserLimitService
{
    protected $userLimitRepository;

    public function __construct(UserLimitRepository $userLimitRepository)
    {
        $this->userLimitRepository = $userLimitRepository;
    }

    public function get()
    {
        return $this->userLimitRepository->get();
    }

    public function find($id)
    {
        return $this->userLimitRepository->find($id);
    }

    public function create($data)
    {
        return $this->userLimitRepository->create($data);
    }
    
    public function delete($id)
    {
        return $this->userLimitRepository->delete($id);
    }

    public function update($id, $data)
    {
        return $this->userLimitRepository->update($id, $data);
    }

}
