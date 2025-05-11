<?php

namespace App\Repository;

use App\Entity\Entreprise;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Entreprise>
 */
class EntrepriseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Entreprise::class);
    }

    public function findAllWithEmployeEtudiant() {
        return $this->createQueryBuilder('e')
            ->leftJoin('e.employes', 'em')
            ->addSelect('em')
            ->leftJoin('e.etudiants', 'et')
            ->addSelect('et')
            ->getQuery()
            ->getResult();
    }

    public function search(string $motcle = '', ?int $secteurId = null): array
    {
        $qb = $this->createQueryBuilder('e');

            if ($motcle) {
                $qb->andWhere('e.nom LIKE :motcle OR e.ville LIKE :motcle')
                ->setParameter('motcle', '%' . $motcle . '%');
            }

            if ($secteurId) {
                $qb->andWhere('e.SecteurActivite = :secteur')
                ->setParameter('secteur', $secteurId);
            }

        return $qb->getQuery()->getResult();
    }


    //    /**
    //     * @return Entreprise[] Returns an array of Entreprise objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('e.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Entreprise
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
