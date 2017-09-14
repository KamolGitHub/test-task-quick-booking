<?php
/**
 * Created by PhpStorm.
 * User: K_Hakimboev
 * Date: 12.06.2017
 * Time: 16:57
 */

namespace App\Repositories;


use App\Parcel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class ParcelRepository implements ParcelRepositoryContract
{
    protected $model;

    /**
     * ParcelRepository constructor.
     * @param Parcel $parcel
     */
    public function __construct(Parcel $parcel)
    {
        $this->model = $parcel;
    }

    public function all()
    {
        return $this->model->withAllRelations()->paginate();
    }

    public function findByNumber($number)
    {
        return $this->model->statusToStorage()->where("number", "=", $number)->first();
    }

    public function findByID($id)
    {
        return $this->model->find($id);
    }

    public function findForToday()
    {
        return $this->model->whereDate('created_at', '=', Carbon::today()->toDateString())->orderBy('id', 'desc')->first();
    }

    public function store(array $data)
    {
        return $this->model->create($data);
    }
}