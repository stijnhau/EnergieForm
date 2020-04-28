<?php
namespace Application\Model;

/**
 * @author stijnhau
 */
class Offerte extends Base
{
    /**
     * @return the $repository
     */
    public function getRepository()
    {
        if (null === $this->repository) {
            $this->repository = $this->entityManager->getRepository('Application\Model\Entity\Offerte');
        }
        return $this->repository;
    }
}
