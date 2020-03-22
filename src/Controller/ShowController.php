<?php

namespace App\Controller;

use DateTime;
use App\Entity\Commentaire;
use App\Form\CommentaireType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ShowController extends AbstractController
{
    /**
     * @Route("/show", name="show")
     */
    public function index(Request $request, EntityManagerInterface $em)
    {
        
        $commentaire = new Commentaire();
        $form = $this->createForm(CommentaireType::class, $commentaire);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $temps = new \DateTime(date($_POST['temps']));
            $commentaire->setTemps($temps);
            $em->persist($commentaire);
            $em->flush();
           // return $this->redirectToRoute('show');
        }
        return $this->render('show/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
