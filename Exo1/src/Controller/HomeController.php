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
     * @Route("/home", name="home")
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
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
    public function show (Client $client, Request $request, EntityManagerInterface $manager){

        $comment = new Comment();
        $form = $this->createForm(CommentType::class, $comment);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $comment->setCreatedAt(new \DateTime())
                    ->setArticle($client);

            $manager->persist($comment);
            $manager->flush();

            return $this->redirectToRoute('home_show', ['id'=> $client->getId()
            ]);
        }

        return $this->render('home/show.html.twig', [
            'client' => $client,
            'commentForm' => $form->createView()
        
        ]);
    }

}