<?php

namespace App\Repository;

use App\Entity\Canciones;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Canciones|null find($id, $lockMode = null, $lockVersion = null)
 * @method Canciones|null findOneBy(array $criteria, array $orderBy = null)
 * @method Canciones[]    findAll()
 * @method Canciones[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CancionesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Canciones::class);
    }

    public function leerCanciones(){
        $dql="select c from App\Entity\Canciones c";
        $em=$this->getEntityManager();
        $query=$em->createQuery($dql);
        $canciones=$query->execute();
        return $canciones;        
    }

    //Limit
    public function colaCanciones(){
        $dql="select c from App\Entity\Canciones c";
        $em=$this->getEntityManager();
        $query=$em->createQuery($dql);
        $canciones=$query->execute();
        return $canciones;        
    }

    //Limit
    public function colaCancionesTabla($offset, $limit, $search){
        $dql="select c from App\Entity\Canciones c where c.url like :search";
        $em=$this->getEntityManager();
        $query=$em->createQuery($dql)
                  ->setParameter('search', '%' . $search . '%')
                  ->setFirstResult($offset) // Offset
                  ->setMaxResults($limit);        
        $canciones=$query->execute();
        return $canciones;        
    }    

    public function buscarCanciones(String $texto){
        $dql="select c from App\Entity\Canciones c where c.url like :texto";
        $em=$this->getEntityManager();
        $query=$em->createQuery($dql);

        $query->setParameter("texto", "%" . $texto . "%");

        $canciones=$query->execute();
        return $canciones;
    }

    public function listaCanciones(){
        $dql="select c from App\Entity\Listas c";
        $em=$this->getEntityManager();
        $query=$em->createQuery($dql);
        return $query->execute();
           
    }
    

    // /**
    //  * @return Canciones[] Returns an array of Canciones objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Canciones
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
