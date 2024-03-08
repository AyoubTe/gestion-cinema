<?php

namespace App\Repository;

use App\Entity\ProjectionFilm;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ProjectionFilm>
 *
 * @method ProjectionFilm|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProjectionFilm|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProjectionFilm[]    findAll()
 * @method ProjectionFilm[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProjectionFilmRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProjectionFilm::class);
    }

    //    /**
    //     * @return ProjectionFilm[] Returns an array of ProjectionFilm objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('p.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?ProjectionFilm
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
