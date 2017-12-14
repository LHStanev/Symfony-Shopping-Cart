<?php
/**
 * Created by PhpStorm.
 * User: Lazar Stanev
 * Date: 12/14/2017
 * Time: 11:23 AM
 */

namespace AppBundle\Entity;


class Admin extends User
{
    public function getRoles()
    {
      return ['ROLE_ADMIN'];
    }
}