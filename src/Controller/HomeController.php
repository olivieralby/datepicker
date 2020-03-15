<?php

namespace App\Controller;


use DateTime;
use DateTimeInterface;
use App\Entity\Planning;
use App\Form\PlannigType;
use App\Form\PlanningType;
use App\Repository\PlanningRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(EntityManagerInterface $em, PlanningRepository $repo,Request $request)
    {
       $month = ['janvier','février','mars','avril','mai','juin','juillet','août','septembre','octobre','novembre','décembre'];
        $planning = new Planning();
        $dd = $request->request->get('date_debut');//Permet de transformer une string en datetime
        $dd = new \DateTime(date($dd));
        $df = $request->request->get('date_fin');
        $df= new \DateTime(date($df));
        
        if(!empty($_POST['activity'])){
            $planning->setActivity($_POST['activity']);
            $planning->setDateDebut($dd);
            $planning->setDateFin($df);
            $planning->setProfesseur($_POST['professeur']);
            $planning->setDuree($_POST['duree']);
            $em->persist($planning);
            //$em->flush();
        }
        $items = $repo->findAll();
        
        return $this->render('home/index.html.twig', [
           'items'=>$items,
           'month'=>$month
        ]);
    }

    /**
     * @Route("/admin/{id}", name="edit")
     * @ParamConverter("get")
     */
    public function edit(Request $request,EntityManagerInterface $em,Planning $planning)
    {
        $form = $this->createForm(PlanningType::class, $planning);
        $form->handleRequest($request);
        if($request->isXMLHttpRequest()){//Requête Ajax pour générer la pop-up
            return new JsonResponse([
                'content'=>$this->renderView('home/edit.html.twig',['form'=>$form->createView()])
            ]);
        }
        if($form->isSubmitted() && $form->isValid()){//Permet d'éditer l'élément de la base de donnée Planning
            $em->persist($planning);
            $em->flush();
            return $this->redirectToRoute('home');
        }
        
        return $this->render('home/edit.html.twig',[
            'form'=>$form->createView(),
            'planning'=>$planning
        ]);
    }

    /**
     * @Route("/delete/{id}", name="delete", methods="DELETE")
     */
    public function delete(EntityManagerInterface $em,Planning $planning)
    {
        $em->remove($planning);
        $em->flush();
        return $this->redirectToRoute('home');

    }
}
