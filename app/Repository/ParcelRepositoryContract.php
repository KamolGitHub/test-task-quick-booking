<?php
/**
 * Created by PhpStorm.
 * User: K_Hakimboev
 * Date: 12.06.2017
 * Time: 17:01
 */

namespace App\Repositories;

interface ParcelRepositoryContract
{
    public function all();

    public function findByNumber($param);

    public function findByID($param);

    public function findForToday();

    public function store(array $data);
}