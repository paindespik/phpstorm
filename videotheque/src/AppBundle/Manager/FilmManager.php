<?php


namespace AppBundle\Manager;
use AppBundle\Entity\Film;
use Doctrine\ORM\EntityManager;
class FilmManager
{
    protected $entityManager;
    protected $repository;
    public function __construct(EntityManager $em)
    {
        $this->entityManager = $em;
        $this->repository = $em->getRepository('AppBundle:Film');
    }
    /**
     * Load all Film entity
     *
     * @return Film[]
     */
    public function loadAllFilms($page, $nbPerPage)
    {
        $films = $this->repository->findAllOrderedByTitle($page,
            $nbPerPage);
        return $films;
    }
    /**
     * Load Film entity
     *
     * @param Integer $filmId
     * @return Film
     */
    public function loadFilm($filmId)
    {
        return $this->repository->find($filmId);
    }
    /**
     * Save Film entity
     *
     * @param Film $film
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function saveFilm(Film $film)
    {
        $this->entityManager->persist($film);
        $this->entityManager->flush();
    }
    /**
     * Remove Film entity
     *
     * @param Integer $filmId
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function removeFilm(Film $film)
    {
        $this->entityManager->remove($film);
        $this->entityManager->flush();
    }
}