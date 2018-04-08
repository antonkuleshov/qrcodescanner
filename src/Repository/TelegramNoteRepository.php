<?php

namespace App\Repository;

use App\Entity\TelegramNote;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TelegramNote|null find($id, $lockMode = null, $lockVersion = null)
 * @method TelegramNote|null findOneBy(array $criteria, array $orderBy = null)
 * @method TelegramNote[]    findAll()
 * @method TelegramNote[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TelegramNoteRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TelegramNote::class);
    }

//    /**
//     * @return TelegramNote[] Returns an array of TelegramNote objects
//     */
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
    public function findOneBySomeField($value): ?TelegramNote
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
