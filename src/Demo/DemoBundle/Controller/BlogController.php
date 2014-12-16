<?php

namespace Demo\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Demo\DemoBundle\Form\MessageType;

class BlogController extends Controller
{
    public function envoyerAction($mot)
    {
        $em = $this->get('doctrine')->getManager();

        $form = $this->createForm(new MessageType());

        $request = $this->getRequest();

        if($request->isMethod("POST")) {
            $form->handleRequest($request);

            $data = $form->getData();

            $em->persist($data);
            $em->flush();

            return $this->redirect($this->generateUrl("blog_afficher_message"));
        }

        return $this->render('DemoBundle:Blog:envoyer.html.twig', array(
            'message' => $mot,
            'form' => $form->createView()
        ));
    }

    public function afficherAction()
    {
        $em = $this->get('doctrine')->getManager();

        $messages = $em->getRepository("DemoBundle:Message")->findAll();

        return $this->render('DemoBundle:Blog:afficher.html.twig', array(
            'messages' => $messages
        ));
    }
}
