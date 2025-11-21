<?php



namespace App\Services;



use App\Repositories\FeaturesRepository;



class FeaturesService

{

    protected $featuresRepository;



    public function __construct(FeaturesRepository $featuresRepository)

    {

        $this->featuresRepository = $featuresRepository;

    }



    public function get()

    {

        return $this->featuresRepository->get();

    }



    public function find($id)

    {

        return $this->featuresRepository->find($id);

    }



    public function create($data)

    {

        return $this->featuresRepository->create($data);

    }

    

    public function delete($id)

    {

        return $this->featuresRepository->delete($id);

    }



    public function update($id, $data)

    {

        return $this->featuresRepository->update($id, $data);

    }



}

