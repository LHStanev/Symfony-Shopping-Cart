<?php
/**
 * Created by PhpStorm.
 * User: Lazar Stanev
 * Date: 12/15/2017
 * Time: 10:25 AM
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * Class Editor
 * @ORM\Entity
 */

class Admin extends User implements AdminInterface, EditorInterface
{

    public function banUser()
    {
        // TODO: Implement banUser() method.
    }

    public function addProduct()
    {
        // TODO: Implement addProduct() method.
    }

    public function deleteProduct()
    {
        // TODO: Implement deleteProduct() method.
    }
}