<?php
namespace App\Services;

use App\Repositories\orderRepository;

class OrderService
{
    protected $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function get()
    {
        return $this->orderRepository->get();
    }

    public function find($id)
    {
        return $this->orderRepository->find($id);
    }

    public function create($data)
    {
        return $this->orderRepository->create($data);
    }

    public function delete($id)
    {
        return $this->orderRepository->delete($id);
    }

    public function update($id, $data)
    {
        return $this->orderRepository->update($id, $data);
    }
    
    public function check($data)
    {
        return $this->orderRepository->check($data);
    }

    public function getOrderList($request){
        return $this->orderRepository->getOrderList($request);
    } 

    public function getOrderDetail($id){
        return $this->orderRepository->getOrderDetail($id);
    } 




}

