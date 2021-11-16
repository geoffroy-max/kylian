<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\ServiceContact\ServiceContact;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * cette fonction focntion permet d'envoyer un msg au user(peintre)
     * @Route("/contact", name="contact")
     */
    public function index(Request $request,ServiceContact $serviceContact): Response
    {
        $contact= new Contact();
         $form = $this->createForm(ContactType::class, $contact);
         $form->handleRequest($request);
         if ($form->isSubmitted()&& $form->isValid()){
             $contact= $form->getData();
             $serviceContact->PersistContact($contact);
             $this->addFlash('success',"votre message a bien été envoyé");
             return $this->redirectToRoute('contact');
         }


        return $this->render('contact/index.html.twig', [
            'form'=>$form->createView()
        ]);
    }

}
