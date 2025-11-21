<?php



namespace App\Services;



use App\Repositories\ProjectTypeRepository;



class ProjectTypeService

{

    protected $projectTypeRepository;



    public function __construct(ProjectTypeRepository $projectTypeRepository)

    {

        $this->projectTypeRepository = $projectTypeRepository;

    }



    public function get()

    {

        return $this->projectTypeRepository->get();

    }



    public function find($id)

    {

        return $this->projectTypeRepository->find($id);

    }



    public function create($data)

    {

        return $this->projectTypeRepository->create($data);

    }

    

    public function delete($id)

    {

        return $this->projectTypeRepository->delete($id);

    }



    public function update($id, $data)

    {

        return $this->projectTypeRepository->update($id, $data);

    }



}

