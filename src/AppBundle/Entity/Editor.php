<?php
/**
 * Created by PhpStorm.
 * User: Lazar Stanev
 * Date: 12/15/2017
 * Time: 10:08 AM
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * Class Editor
 * @ORM\Entity
 */
class Editor extends User implements EditorInterface
{

    public function addProduct()
    {
        // TODO: Implement addProduct() method.
    }

    public function deleteProduct()
    {
        // TODO: Implement deleteProduct() method.
    }
}