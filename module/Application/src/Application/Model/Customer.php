<?php
namespace Application\Model;

/**
 * @author stijnhau
 */
class Customer extends Base
{
    /**
     * @return the $repository
     */
    public function getRepository()
    {
        if (null === $this->repository) {
            $this->repository = $this->entityManager->getRepository('Application\Model\Entity\Customer');
        }
        return $this->repository;
    }
}
