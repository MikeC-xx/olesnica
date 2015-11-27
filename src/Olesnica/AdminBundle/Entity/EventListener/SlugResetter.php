<?php

namespace Olesnica\AdminBundle\Entity\EventListener;

use Doctrine\ORM\Event\LifecycleEventArgs;

class SlugResetter
{
    public function postPersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        $em = $args->getEntityManager();
        if (in_array('slug', $em->getClassMetadata(get_class($entity))->getFieldNames())) {
          $entity->setSlug(null);
          $em->persist($entity);
          $em->flush();
        }
    }
}
