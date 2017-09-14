<?php
/**
 * Created by PhpStorm.
 * User: K_Hakimboev
 * Date: 14.06.2017
 * Time: 11:46
 */

namespace App\Services;

use App\Repositories\ParcelRepositoryContract;

interface ParcelServiceContract
{
    /**
     * Получая старый номер посылки и вырезая последние четыре
     * цифр генерируется новый номер посылки
     *
     * @param $number
     * @return string
     */
    public function generateNumber($number);

    /**
     * Получая старый номер посылки и вырезая последние четыре
     * цифр генерируется новый штрих код посылки
     *
     * @param $number
     */
    public function generateBarCode($number);

    /**
     *  Регистрация запрещенного товара
     *
     * @param array $request
     * @return mixed
     */
    public function registerProhibitedItem($request);
}