<?php
namespace App\Services;



use App\Repositories\UserPlanRepository;



class UserPlanService

{

    protected $userPlanRepository;



    public function __construct(UserPlanRepository $userPlanRepository)

    {

        $this->userPlanRepository = $userPlanRepository;

    }



    public function get()

    {

        return $this->userPlanRepository->get();

    }



    public function find($id)

    {

        return $this->userPlanRepository->find($id);

    }



    public function create($data)

    {

        return $this->userPlanRepository->create($data);

    }

    

    public function delete($id)

    {

        return $this->userPlanRepository->delete($id);

    }



    public function update($id, $data)

    {

        return $this->userPlanRepository->update($id, $data);

    }



}

