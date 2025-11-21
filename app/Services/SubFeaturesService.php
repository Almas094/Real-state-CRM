<?php



namespace App\Services;



use App\Repositories\SubFeaturesRepository;



class SubFeaturesService

{

    protected $subFeaturesRepository;



    public function __construct(SubFeaturesRepository $subFeaturesRepository)

    {

        $this->subFeaturesRepository = $subFeaturesRepository;

    }



    public function get()

    {

        return $this->subFeaturesRepository->get();

    }



    public function find($id)

    {

        return $this->subFeaturesRepository->find($id);

    }



    public function create($data)

    {

        return $this->subFeaturesRepository->create($data);

    }

    

    public function delete($id)

    {

        return $this->subFeaturesRepository->delete($id);

    }



    public function update($id, $data)

    {

        return $this->subFeaturesRepository->update($id, $data);

    }



}

