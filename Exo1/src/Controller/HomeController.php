<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Client;
use App\Form\FormClientType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends AbstractController
{
    /**
     * @Route("/home/accueil", name="accueil")
     */
    public function accueil()
    {

        return $this->render('home/accueil.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }


    /**
     * @Route("/home", name="home")
     */
    public function index() : Response
    {
        $repo = $this->getDoctrine()->getRepository(Client::class);

        $clients = $repo->findAll();

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'clients' => $clients
        ]);
    }

   
    /**
    * @Route("/home/create", name="home_create")
    */
    public function addClient(Client $client = null, Request $request, EntityManagerInterface $manager)
    {
        if (!$client) {
            $client = new Client();
        }

        $form = $this->createForm(FormClientType::class, $client);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if (!$client->getId()) {
                
            }

            $manager->persist($client);
            $manager->flush();

            return $this->redirectToRoute('home_create', ['id' => $client->getId()]);
        }
        return $this->render('home/create.html.twig', [
            'formClient' => $form->createView(),
            'current_page' => 'client'
        ]);
    }

/**
     * @Route("/home/{id}", name="home_show")
     */
    public function show($id){

        $repo = $this->getDoctrine()->getRepository(Client::class);

        $client = $repo->find($id);

        return $this->render('home/show.html.twig', [
            'client' => $client
        ]);
    }


     /**
    * @Route("/home/create", name="home_create")
    */
    public function credit(Client $client = null, Request $request, EntityManagerInterface $manager)
    {
        if (!$credit) {
            $credit = new Credit();
        }

        $form = $this->createForm(FormCreditType::class, $client);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if (!$client->getId()) {
                
            }

            $manager->persist($client);
            $manager->flush();

            return $this->redirectToRoute('home_create', ['id' => $client->getId()]);
        }
        return $this->render('home/create.html.twig', [
            'formClient' => $form->createView(),
            'current_page' => 'client'
        ]);
    }

}