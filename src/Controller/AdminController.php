<?php

namespace App\Controller;

use App\Entity\Annonce;
use App\Entity\Confier;
use App\Form\AnnonceType;
use App\Form\ConfierType;
use App\Entity\AnnonceConfier;
use App\Form\AnnonceConfierType;
use App\Repository\AnnonceRepository;
use Knp\Component\Pager\PaginatorInterface;
use App\Repository\AnnonceConfierRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminController extends AbstractController
{
    /**
       * @Route("/admin", name="admin")
       * @return Response
       */
    public function Adminindex(AnnonceRepository $annonceRepository, PaginatorInterface $paginate, Request $request): Response
    {
        $annonces = $paginate->paginate($annonceRepository->findAll(), $request->query->getInt('page', 1), 20);
        return $this->render('admin/admin.html.twig', [
              'annonces' => $annonces
          ]);
    }


    /**
     * @Route("admin/{id}/desactiver", name="desactiver-annonce")
     *
    */
    public function desactiver($id, Request $request, AnnonceRepository $annonceRepository)
    {
        $Annonce = $annonceRepository->find($id);
        $Annonce->setStatus(false);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($Annonce);
        $entityManager->flush();
        return $this->redirectToRoute('admin');
    }
    
    /**
     * @Route("admin/{id}/activer", name="activer-annonce")
     */
    public function activerUser($id, Request $request, AnnonceRepository $annonceRepository)
    {
        $Annonce = $annonceRepository->find($id);
        $Annonce->setStatus(true);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($Annonce);
        $entityManager->flush();
        return $this->redirectToRoute('admin');
    }
    /**
     * @Route("/admin/annonce/{id}/edit", name="annonce_admin-edit")
     */
    public function edit(Request $request, Annonce $annonce): Response
    {
        $form= $this->createForm(AnnonceType::class, $annonce);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($annonce);
            $entityManager->flush();
            return  $this->redirectToRoute('admin');
        }
        return $this->render('admin/edit.html.twig', ['editForm' => $form->createView()]);
    }

    /**
     * @Route("/admin/article/{id}/delete", name="annonce_admin-delete")
     */
    public function delete(Annonce $annonce): Response
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($annonce);
        $em->flush();
        return $this->redirectToRoute(('admin'));
    }


    /**
       * @Route("/admin/confidentielle", name="confidentielle")
       * @return Response
       */
      public function confidentielleindex(AnnonceRepository $annonceRepository, PaginatorInterface $paginate, Request $request): Response
      {
          $annonces = $paginate->paginate($annonceRepository->findBy(array('annonceType' => 'Annonce confidentielle'),), $request->query->getInt('page', 1), 20);
         
          return $this->render('admin/confidentielle.html.twig', [
                'annonces' => $annonces
            ]);
      }


      /**
       * @Route("/admin/confier", name="list_confier")
       * @return Response
       */
    public function AdminConfierindex(AnnonceConfierRepository $annonceConfierRepository, PaginatorInterface $paginate, Request $request): Response
    {
        $annonces = $paginate->paginate($annonceConfierRepository->findAll(), $request->query->getInt('page', 1), 20);
        return $this->render('admin/confier.html.twig', [
              'annonces' => $annonces
          ]);
    }

     
    /**
     * @Route("/admin/confier/{id}/edit", name="annonce_confier_edit")
     */
    public function editConfier(Request $request, AnnonceConfier $annonceConfier): Response
    {
        $form= $this->createForm(ConfierType::class, $annonceConfier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($annonceConfier);
            $entityManager->flush();
            return  $this->redirectToRoute('list_confier');
        }
        return $this->render('admin/ConfierEdit.html.twig', ['editForm' => $form->createView()]);
    }
     /**
     * @Route("/admin/confier/{id}/delete", name="confier_admin-delete")
     */
    public function deleteConfier(AnnonceConfier $annonceConfier): Response
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($annonceConfier);
        $em->flush();
        return $this->redirectToRoute(('list_confier'));
    }
     
}
?>