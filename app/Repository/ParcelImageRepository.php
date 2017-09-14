<?php
/**
 * Created by PhpStorm.
 * User: K_Hakimboev
 * Date: 15.06.2017
 * Time: 9:41
 */

namespace App\Repository;


use App\Parcel;
use App\ParcelImage;

class ParcelImageRepository implements ParcelImageRepositoryContract
{

    protected $model;

    /**
     * ParcelImageRepository constructor.
     *
     * @param ParcelImage $parcelImage
     */
    public function __construct(ParcelImage $parcelImage)
    {
        $this->model = $parcelImage;
    }

    public function insert(array $data)
    {
        return $this->model->insert($data);
    }

}