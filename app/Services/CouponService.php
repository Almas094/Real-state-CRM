<?php
namespace App\Services;

use App\Repositories\CouponRepository;

class CouponService
{
    protected $couponRepository;

    public function __construct(CouponRepository $couponRepository)
    {
        $this->couponRepository = $couponRepository;
    }

    public function get()
    {
        return $this->couponRepository->get();
    }

    public function find($id)
    {
        return $this->couponRepository->find($id);
    }

    public function create($data)
    {
        return $this->couponRepository->create($data);
    }

    public function delete($id)
    {
        return $this->couponRepository->delete($id);
    }

    public function update($id, $data)
    {
        return $this->couponRepository->update($id, $data);
    }
    
    public function check($data)
    {
        return $this->couponRepository->check($data);
    }



}

