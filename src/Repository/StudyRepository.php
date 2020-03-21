<?php

namespace App\Repository;

use App\Entity\Study;
use App\Search\Search;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Study|null find($id, $lockMode = null, $lockVersion = null)
 * @method Study|null findOneBy(array $criteria, array $orderBy = null)
 * @method Study[]    findAll()
 * @method Study[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StudyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Study::class);
    }

    
    /**
     * @return retourne la liste des élève d'après la formation
     */
    public function findStudy(Search $search):array
    {
        $query = $this->createQueryBuilder('s')
                ->select('s','f')
                ->join('s.formation','f') ;
              if(!empty($search->search_formation)){
                $query = $query->andWhere('f.id IN (:formation)')
                      ->setParameter('formation',$search->search_formation)   ;
              }
        $query = $query->getQuery();
        return $query->getResult();
    }
}
