<?php
/**
 * Created by PhpStorm.
 * User: K_Hakimboev
 * Date: 14.06.2017
 * Time: 16:00
 */

namespace App\Repository;


use App\ShippingRequest;

class ShippingRequestRepository implements ShippingRequestRepositoryContract
{
    protected $model;

    /**
     * ShippingRequestRepository constructor.
     *
     * @param ShippingRequest $shippingRequest
     */
    public function __construct(ShippingRequest $shippingRequest)
    {
        $this->model = $shippingRequest;
    }

    public function findByNumber($number)
    {
        return $this->model->withAllRelations()->statusToStorage()->where("number", "=", $number)->first();
    }

    public function findByID($id)
    {
        return $this->model->withAllRelations()->find($id);
    }
}