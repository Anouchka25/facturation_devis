<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;


class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(Request $request, \Swift_Mailer $mailer)
    {
        $form = $this->createForm(ContactType::class);
        
        $form->handleRequest($request);

        //$this->addFlash('info', 'Some useful info');

        if ($form->isSubmitted() && $form->isValid()) {
            
                       $contactFormData = $form->getData();
            
                       $message = (new \Swift_Message('You Got Mail!'))
                                      ->setFrom($contactFormData['from'])
                                      ->setTo('minkoueobamea@gmail.com')
                                      ->setBody(
                                          $contactFormData['message'],
                                          'text/plain'
                                      )
                                  ;
                       
                                  $mailer->send($message);

                                  $this->addFlash('success', 'Message envoyé !');
                       
                                  return $this->redirectToRoute('contact');
            
                       // do something interesting here
                   }
        
        return $this->render('contact/index.html.twig', ['our_form' => $form->createView() ]);
    }
}
