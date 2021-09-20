<?php

namespace App\Repository;

use App\Data\SearchData;
use App\Entity\Chambres;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Chambres|null find($id, $lockMode = null, $lockVersion = null)
 * @method Chambres|null findOneBy(array $criteria, array $orderBy = null)
 * @method Chambres[]    findAll()
 * @method Chambres[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChambresRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Chambres::class);
    }
    /**
     * Sa récupère les produits en lien avec une recherche
     *
     * @return []
     */
    public function findSearch(SearchData $search): array
    {
        // dd($search);
        $query = $this
            ->createQueryBuilder('p');
        // ->select('c', 'p')
        // ->join('p.category', 'c');

        // if (!empty($search->q)) {
        //     $query = $query
        //         ->andWhere('p.titre LIKE :q')
        //         ->setParameter('q', "%{$search->q}%");
        // }

        // if (!empty($search->min)) {
        //     $query = $query
        //         ->andWhere('p.price >= :min')
        //         ->setParameter('min', $search->min);
        // }

        // if (!empty($search->min)) {
        //     $query = $query
        //         ->andWhere('p.price <= :max')
        //         ->setParameter('max', $search->max);
        // }

        // if (!empty($search->promo)) {
        //     $query = $query
        //         ->andWhere('p.promo = 1');
        // }

        // if (!empty($search->category)) {
        //     $querey = $query
        //         ->andWhere('c.id IN (:category)')
        //         ->setParameter('category', $search->category);
        // }

        return $query->getQuery()->getResult();
    }

    // /**
    //  * @return Chambres[] Returns an array of Chambres objects
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
    public function findOneBySomeField($value): ?Chambres
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
