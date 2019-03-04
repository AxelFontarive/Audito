<?php

namespace App\Repository;

use App\Entity\TypeSpectacle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TypeSpectacle|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeSpectacle|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeSpectacle[]    findAll()
 * @method TypeSpectacle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeSpectacleRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TypeSpectacle::class);
    }

    // /**
    //  * @return TypeSpectacle[] Returns an array of TypeSpectacle objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TypeSpectacle
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
