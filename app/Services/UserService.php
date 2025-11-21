<?php
namespace App\Services;
use App\Repositories\UserRepository;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function get()
    {
        return $this->userRepository->get();
    }

    public function find($id)
    {
        return $this->userRepository->find($id);
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