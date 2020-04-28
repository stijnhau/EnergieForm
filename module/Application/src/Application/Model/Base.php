<?php
namespace Application\Model;

abstract class Base
{
    /**
     * @var Doctrine\ORM\EntityManager
     */
    protected $entityManager;
    /**
     * @var Doctrine\ORM\EntityRepository
     */
    protected $repository = null;

    abstract public function getRepository();

    /**
     * @param \Doctrine\ORM\EntityRepository $repository
     */
    public function setRepository($repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return the $entityManager
     */
    public function getEntityManager()
    {
        return $this->entityManager;
    }

    /**
     * @param \Doctrine\ORM\EntityManager $entityManager
     */
    public function setEntityManager($entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Find al active
     *
     * @return \Application\Model\Entity\Organisation
     */
    public function findAllActive()
    {
        /* @var $organisationEntity \Application\Model\Entity\Organisation */
        $organisationEntity = $this->getRepository()->findBy(array("isActive" => 1));
        return $organisationEntity;
    }

    /**
     * @return \Application\Model\Entity\Organisation
     */
    public function findAll()
    {
        /* @var $organisationEntity \Application\Model\Entity\Organisation */
        $organisationEntity = $this->getRepository()->findAll();
        return $organisationEntity;
    }

    /**
     * @param   int     $id The id to remove
     * @return  boolean
     */
    public function remove($id)
    {
        $entity = $this->getRepository()->findOneBy(array("id" => $id));

        if (is_object($entity)) {
            if (method_exists($entity, "setIsActive")) {
                $entity->setIsActive(false);
                $this->getEntityManager()->persist($entity);
            } else {
                $this->getEntityManager()->remove($entity);
            }
        }
        $this->getEntityManager()->flush();
    }

    /**
     * @param   array   $params The search params.
     */
    public function findOneBy($param)
    {
        /* @var $organisationEntity \Application\Model\Entity\Organisation */
        $organisationEntity = $this->getRepository()->findOneBy($param);
        return $organisationEntity;
    }

    /**
     * @param   array   $params The search params.
     * @param   array   $orderBy The order by params.
     * @return  array
     */
    public function findBy($param, $orderBy = array())
    {
        return $this->getRepository()->findBy($param, $orderBy);
    }
}
