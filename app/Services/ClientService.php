<?php
namespace App\Services;
use App\Repositories\UserRepository;

class ClientService
{

    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function get($request)
    {
        return $this->userRepository->getClientList($request);
    }

    public function find($id)
    {
        return $this->userRepository->getClientDetail($id);
    }

    public function create($data)
    {
        return $this->userRepository->create($data);
    }


    public function delete($id)
    {
        return $this->userRepository->delete($id);
    }

    public function update($id, $data)
    {
        return $this->userRepository->update($id, $data);
    }
}

