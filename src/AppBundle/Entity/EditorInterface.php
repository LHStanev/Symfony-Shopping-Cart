<?php
/**
 * Created by PhpStorm.
 * User: Lazar Stanev
 * Date: 12/15/2017
 * Time: 10:29 AM
 */

namespace AppBundle\Entity;


interface EditorInterface
{
    public function addProduct();
    public function deleteProduct();
}