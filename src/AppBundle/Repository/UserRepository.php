<?php

namespace AppBundle\Repository;

/**
 * UserRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserRepository extends \Doctrine\ORM\EntityRepository
{
    public function showNewestAction(){
        $em     = $this->getEntityManager();
        $query  = $em->createQuery("SELECT u FROM AppBundle:User u ORDER BY u.id DESC");
        $result = $query->getResult();
        return $result;
    }
}
