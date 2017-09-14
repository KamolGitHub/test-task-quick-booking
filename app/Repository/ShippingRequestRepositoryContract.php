<?php
/**
 * Created by PhpStorm.
 * User: K_Hakimboev
 * Date: 14.06.2017
 * Time: 16:23
 */

namespace App\Repository;

interface ShippingRequestRepositoryContract
{
    public function findByNumber($number);

    public function findByID($id);
}