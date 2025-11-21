<?php



namespace App\Services;



use App\Repositories\AddOnsRepository;



class AddOnsService

{

    protected $addOnsRepository;



    public function __construct(AddOnsRepository $addOnsRepository)

    {

        $this->addOnsRepository = $addOnsRepository;

    }



    public function get()

    {

        return $this->addOnsRepository->get();

    }



    public function find($id)

    {

        return $this->addOnsRepository->find($id);

    }



    public function create($data)

    {

        return $this->addOnsRepository->create($data);

    }

    

    public function delete($id)

    {

        return $this->addOnsRepository->delete($id);

    }



    public function update($id, $data)

    {

        return $this->addOnsRepository->update($id, $data);

    }



}

