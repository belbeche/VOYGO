<?php

namespace App\Repository;

use App\Entity\Hotel;

use App\Data\searchData;

use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Hotel|null find($id, $lockMode = null, $lockVersion = null)
 * @method Hotel|null findOneBy(array $criteria, array $orderBy = null)
 * @method Hotel[]    findAll()
 * @method Hotel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HotelRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Hotel::class);
    }

    public function findSearch(searchData $search): array
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
}
