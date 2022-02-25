<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\ContactRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact_list")
     */
    public function index(ContactRepository $repo)
    {
        $contacts = $repo->findAll();
        return $this->render('contact/listeContact.html.twig', [
            'contacts' => $contacts
        ]);
    }

    /**
     * Permet afficher le form d'edition
     *
     * @Route("/contact/edit/{id}", name="contact_edit")
     * 
     * @return Response
     */
    public function edit(Contact $contact, Request $request, EntityManagerInterface $manager)
    {

        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //$manager = $this->getDoctrine()->getManager();

            $manager->persist($contact);
            $manager->flush();

            $this->addFlash(
                'success',
                "Le contact <strong>{$contact->getNom()} {$contact->getPrenom()}</strong> a bien été modifié"
            );

            return $this->redirectToRoute('contact_show', [
                'id' => $contact->getId()
            ]);
        }

        return $this->render('contact/edit.html.twig', [
            'form' => $form->createView(),
            'contact' => $contact
        ]);
    }

    /**
     * @Route("/contact/delete/{id}", name="contact_delete")
     * 
     */
    public function delete($id, EntityManagerInterface $manager, ContactRepository $repo)
    {
            $contact = $repo->findOneById($id);
            $manager->remove($contact);
            $manager->flush();
        
            $this->addFlash(
                'success',
                "Le contact <strong>{$contact->getNom()} {$contact->getPrenom()}</strong> a bien été supprimée"
            );

            return $this->redirectToRoute("contact_list");
    }

    /**
     * permet de crée une nouvelle annonce
     * @Route("/contact/new", name="contact_new")
     *
     * @return Response
     */
    public function create(Request $request, EntityManagerInterface $manager)
    {
        $contact = new Contact;
        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $manager->persist($contact);
            $manager->flush();
            $this->addFlash(
                'success',
                "Le contact <strong>{$contact->getNom()} {$contact->getPrenom()}</strong> a bien été créer"
            );
            return $this->redirectToRoute('contact_show', [
                'id' => $contact->getId()
            ]);
        }
        //$manager = $this->getDoctrine()->getManager();

        return $this->render('contact/new.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
         * Permet d'afficher un seul contact
         *
         * @Route("/contact/{id}", name="contact_show")
         * 
         * @return Response
         */
        public function show(Contact $contact){
            //Je recupère l'annonce qui correspond au slug
            //$ad = $repo->findOneBySlug($slug);
            
            return $this->render('contact/show.html.twig', [
                'contact' => $contact
                ]);
        }


}
