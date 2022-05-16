<?php

namespace App\Controller;

use App\Entity\Annonce;
use App\Entity\Confier;
use App\Entity\Contact;
use App\Form\AnnonceType;
use App\Form\ConfierType;
use App\Form\ContactType;
use App\Entity\AnnonceConfier;
use App\Form\DomicilationType;
use App\Form\AnnonceConfierType;
use App\Form\confidentielleType;
use Symfony\Component\Mime\Email;
use App\Form\AnnonceCoworkingType;
use App\Repository\AnnonceRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AnnonceController extends AbstractController
{   
    private $security;
    public function __construct(Security $security)
    {
        $this->security =$security;
    }
    /**
     * @Route("/annonce/{id}", name="annonce_show")
     */
    public function index(Annonce $annonce,Request $request, MailerInterface $mailer): Response
    {
        $contact = new Contact();
        $contact->setAnnonce($annonce);
        $emaill=$contact->getAnnonce()->getUser()->getEmail();
        $form =$this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $contactFormData = $form->getData();
                $email = (new Email())
                    ->from($contactFormData->getEmail())
                    ->to($emaill)
                    //->cc('cc@example.com')
                    //->bcc('bcc@example.com')
                    //->replyTo('fabien@example.com')
                    //->priority(Email::PRIORITY_HIGH)
                    //->subject($contactFormData['sujet'])
                    ->text('Time for Symfony Mailer!')
                    ->html($contactFormData->getMessage().'<br><br>'.$contactFormData->getFirstname().' '.$contactFormData->getLastname().'<br>'.$contactFormData->getPhone().'<br>'. $contactFormData->getEmail());
        
                /** @var Symfony\Component\Mailer\SentMessage $sentEmail */
                $sentEmail = $mailer->send($email);
                return  $this->redirectToRoute('annonce_show', ['id' => $annonce->getId()]);
            }
            return $this->render('annonce/index.html.twig', [
            'annonce' => $annonce,
            'form' => $form->createView()
        ]);
        
    }

     /**
     * @Route("/annoncecoworking/{id}", name="annonce_show_coworking")
     */
    public function indexcoworking(Annonce $annonce, Request $request, MailerInterface $mailer): Response
    {    $contact = new Contact();
        $contact->setAnnonce($annonce);
        $emaill=$contact->getAnnonce()->getUser()->getEmail();
        $form =$this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $contactFormData = $form->getData();
                $email = (new Email())
                    ->from($contactFormData->getEmail())
                    ->to($emaill)
                    //->cc('cc@example.com')
                    //->bcc('bcc@example.com')
                    //->replyTo('fabien@example.com')
                    //->priority(Email::PRIORITY_HIGH)
                    //->subject($contactFormData['sujet'])
                    ->text('Time for Symfony Mailer!')
                    ->html($contactFormData->getMessage().'<br><br>'.$contactFormData->getFirstname().' '.$contactFormData->getLastname().'<br>'.$contactFormData->getPhone().'<br>'. $contactFormData->getEmail());
        
                /** @var Symfony\Component\Mailer\SentMessage $sentEmail */
                $sentEmail = $mailer->send($email);
                return  $this->redirectToRoute('annonce_show_coworking', ['id' => $annonce->getId()]);
            }


        return $this->render('annonce/coworking.html.twig',[
            'annonce' => $annonce,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/annoncedomiciliation/{id}", name="annonce_show_domiciliation")
     */
    public function indexdomiciliation(Annonce $annonce,  Request $request, MailerInterface $mailer): Response
    {
        $contact = new Contact();
        $contact->setAnnonce($annonce);
        $emaill=$contact->getAnnonce()->getUser()->getEmail();
        $form =$this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $contactFormData = $form->getData();
                $email = (new Email())
                    ->from($contactFormData->getEmail())
                    ->to($emaill)
                    //->cc('cc@example.com')
                    //->bcc('bcc@example.com')
                    //->replyTo('fabien@example.com')
                    //->priority(Email::PRIORITY_HIGH)
                    //->subject($contactFormData['sujet'])
                    ->text('Time for Symfony Mailer!')
                    ->html($contactFormData->getMessage().'<br><br>'.$contactFormData->getFirstname().' '.$contactFormData->getLastname().'<br>'.$contactFormData->getPhone().'<br>'. $contactFormData->getEmail());
        
                /** @var Symfony\Component\Mailer\SentMessage $sentEmail */
                $sentEmail = $mailer->send($email);
                return  $this->redirectToRoute('annonce_show_domiciliation', ['id' => $annonce->getId()]);
            }

        return $this->render('annonce/domicialiation.html.twig',[
            'annonce' => $annonce,
            'form' => $form->createView()
        ]);


    }

    /**
     * @Route("/annonceconfidentielle/{id}", name="annonce_show_confidentielle")
     */
    public function indexconfidentielle(Annonce $annonce): Response
    {
        return $this->render('annonce/confidentielle.html.twig',[
            'annonce' => $annonce,
        ]);
    }
    /**
     * @Route("/user/annonce/new", name="annonce_new")
     */
    public function new(Request $request): Response
    {
        $annonce =new Annonce();
        $form= $this->createForm(AnnonceType::class, $annonce);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $annonce->setCreatedAt(new \DateTime());
            $annonce->setUser($this->security->getUser());
            $annonce->setStatus(false);
            $annonce->setAnnonceType("Annonce publique");
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($annonce);
            $entityManager->flush();
            return  $this->redirectToRoute('annonce_show', ['id' => $annonce->getId()]);
        }
        return $this->render('annonce/new.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/user/annonce/newcoworking", name="coworking_new")
     */
    public function newCoworking(Request $request): Response
    {
        $annonce =new Annonce();
        $form= $this->createForm(AnnonceCoworkingType::class, $annonce);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $annonce->setCreatedAt(new \DateTime());
            $annonce->setUser($this->security->getUser());
            $annonce->setStatus(false);
            $annonce->setAnnonceType("Annonce publique");
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($annonce);
            $entityManager->flush();
            return  $this->redirectToRoute('annonce_show_coworking', ['id' => $annonce->getId()]);
        }
        return $this->render('annonce/newcoworking.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/user/annonce/newdomiciliation", name="domiciliation_new")
     */
    public function newdomiciliation(Request $request): Response
    {
        $annonce =new Annonce();
        $form= $this->createForm(DomicilationType::class, $annonce);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $annonce->setCreatedAt(new \DateTime());
            $annonce->setUser($this->security->getUser());
            $annonce->setStatus(false);
            $annonce->setAnnonceType("Annonce publique");
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($annonce);
            $entityManager->flush();
            return  $this->redirectToRoute('annonce_show_domiciliation', ['id' => $annonce->getId()]);
        }
        return $this->render('annonce/newdomicilation.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/user/annonce/confidentielle", name="confidentielle_new")
     */
    public function newdconfidentielle(Request $request): Response
    {
        $annonce =new Annonce();
        $form= $this->createForm(confidentielleType::class, $annonce);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $annonce->setCreatedAt(new \DateTime());
            $annonce->setUser($this->security->getUser());
            $annonce->setStatus(false);
            $annonce->setAnnonceType("Annonce confidentielle");
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($annonce);
            $entityManager->flush();
            return  $this->redirectToRoute('home');
        }
        return $this->render('annonce/newconfidentielle.html.twig', [
            'form' => $form->createView()
        ]);
    }

    
   
    

    /**
       * @Route("/user", name="user")
       * @return Response
       */
      public function Usersindex(AnnonceRepository $annonceRepository, PaginatorInterface $paginate, Request $request): Response
      {$user=$this->security->getUser();
          $annonces = $paginate->paginate($annonceRepository->getUsers("ROLE_USER",$user->getEmail()), $request->query->getInt('page', 1), 20);
          return $this->render('user/user.html.twig', [
                'annonces' => $annonces
            ]);
      }
  
  
      /**
       * @Route("/user/annonce/{id}/edit", name="annonce_user-edit")
       */
      public function edit(Request $request, Annonce $annonce): Response
      {
          $form= $this->createForm(AnnonceType::class, $annonce);
          $form->handleRequest($request);
  
          if ($form->isSubmitted() && $form->isValid()) {
              $entityManager = $this->getDoctrine()->getManager();
              $entityManager->persist($annonce);
              $entityManager->flush();
              return  $this->redirectToRoute('user');
          }
          return $this->render('user/edit.html.twig', ['editForm' => $form->createView()]);
      }
  
      /**
       * @Route("/user/annonce/{id}/delete", name="annonce_user-delete")
       */
      public function delete(Annonce $annonce): Response
      {
          $em = $this->getDoctrine()->getManager();
          $em->remove($annonce);
          $em->flush();
          return $this->redirectToRoute(('user'));
      }

    /**
     * @Route("/user/annonce/confier", name="confier_new")
     */
    public function newconfier(Request $request): Response
    {
        $annonce =new AnnonceConfier();
        $form= $this->createForm(ConfierType::class, $annonce);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $annonce->setCreatedAt(new \DateTime());
            $annonce->setUser($this->security->getUser());
           // $annonce->setAnnonceConfier("annonceConfier");
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($annonce);
            $entityManager->flush();
        }
        return $this->render('annonce/newconfier.html.twig', [
            'form' => $form->createView()
        ]);
    }

    





}
