<?php

namespace App\Controller;

use App\Entity\Annonce;
use App\Entity\Confier;
use App\Form\ConfierType;
use App\Entity\AnnonceSearch;
use App\Form\AnnonceSearchType;
use App\Repository\AnnonceRepository;
use Doctrine\Persistence\ObjectManager;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    private $repository;

    public function __construct(AnnonceRepository $repository)
    {   
        $this->repository = $repository;
    }
    /**
     * @Route("/", name="home")
     * Method({"GET"})
     */
    public function index(AnnonceRepository $annonceRepository, PaginatorInterface $paginate,Request $request): Response
    {   $search = new AnnonceSearch();
        $form= $this->createForm(AnnonceSearchType::class,$search);
        $form->handleRequest($request);
           /* $maxPrice = $search->getMaxPrice();
            $maxSurface = $search->getMaxSurface();
            $transaction = $search->getTransaction();
            $typedebien = $search->getTypedebien();
            $ville = $search->getVille();*/
              //on récupère le nom d'article tapé dans le formulaire
              
        //$annonces = $annonceRepository->findAllVisibleQuery($search);
        
        $annonces = $paginate->paginate($annonceRepository->findAllVisibleQuery($search),$request->query->getInt('page', 1),9);
        
        return $this->render('home/index.html.twig', [
            'annonces' => $annonces,
            'form' =>$form->createView()]);
    }
    /**
     * @Route("/neuf", name="neuf")
     * Method({"GET"})
     */
    public function indexNeuf(AnnonceRepository $annonceRepository, PaginatorInterface $paginate,Request $request): Response
    {  
        $annonces = $paginate->paginate($annonceRepository->findByExampleField(),
        $request->query->getInt('page',1),9);
        
        return $this->render('home/neuf.html.twig', [
            'annonces' => $annonces]);
    }
    /**
     * @Route("/coworking", name="list_coworking")
     * Method({"GET"})
     */
    public function indexCoworking(AnnonceRepository $annonceRepository, PaginatorInterface $paginate,Request $request): Response
    {  
        $annonces = $paginate->paginate($annonceRepository->findBy(array('typedebien' => 'Coworking'),),
        $request->query->getInt('page',1),9);
        
        return $this->render('home/Coworking.html.twig', [
            'annonces' => $annonces]);
}
    /**
     * @Route("/domiciliation", name="list_domiciliation")
     * Method({"GET"})
     */
    public function indexdomiciliation(AnnonceRepository $annonceRepository, PaginatorInterface $paginate,Request $request): Response
    {  
        $annonces = $paginate->paginate($annonceRepository->findBy(array('typedebien' => 'Domiciliation'),),
        $request->query->getInt('page',1),9);
        
        return $this->render('home/Domiciliation.html.twig', [
            'annonces' => $annonces]);
    }  


}
