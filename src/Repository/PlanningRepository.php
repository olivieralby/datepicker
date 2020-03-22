<?php

namespace App\Repository;

use App\Search\Search;
use App\Entity\Planning;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Planning|null find($id, $lockMode = null, $lockVersion = null)
 * @method Planning|null findOneBy(array $criteria, array $orderBy = null)
 * @method Planning[]    findAll()
 * @method Planning[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlanningRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Planning::class);
    }

    /**
     * @return un tableau avec les valeurs de recherche des activités
     */
    public function findPlanning(Search $search):array
    {
        $query = $this->createQueryBuilder('p')
            ->select('p', 'f')
            ->join('p.formation', 'f');
        if (!empty($search->search_formation)) {
            $query = $query->andWhere('f.id IN (:formation)')
                ->setParameter('formation', $search->search_formation);
        }

        return $query->getQuery()->getResult();
    }
}
