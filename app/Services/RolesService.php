<?php

namespace App\Services;

use App\Repositories\RolesRepository;

class RolesService
{
    protected $rolesRepository;

    public function __construct(RolesRepository $rolesRepository)
    {
        $this->rolesRepository = $rolesRepository;
    }

    public function get()
    {
        return $this->rolesRepository->get();
    }

    public function find($id)
    {
        return $this->rolesRepository->find($id);
    }

    public function create($data)
    {
        return $this->rolesRepository->create($data);
    }
    
    public function delete($id)
    {
        return $this->rolesRepository->delete($id);
    }

    public function update($id, $data)
    {
        return $this->rolesRepository->update($id, $data);
    }

}
