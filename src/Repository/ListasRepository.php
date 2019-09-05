<?php

namespace App\Repository;

use App\Entity\Listas;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Listas|null find($id, $lockMode = null, $lockVersion = null)
 * @method Listas|null findOneBy(array $criteria, array $orderBy = null)
 * @method Listas[]    findAll()
 * @method Listas[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ListasRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Listas::class);
    }

    // /**
    //  * @return Listas[] Returns an array of Listas objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Listas
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function listas(){
        $dql="select l.idLista, l.nombre from App\Entity\Listas l";
        $em=$this->getEntityManager();
        $query=$em->createQuery($dql);
        return $query->execute();
           
    } 
}
