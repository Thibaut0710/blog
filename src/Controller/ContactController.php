<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @var ContactRepository
     */
    private $contactRepository;

    public function __construct(ContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }



    /**
     * @Route("/contactez-nous/{id}", name="contactId")
     */
    public function contactId(int $id): Response
    {
        $contact = $this->contactRepository->find($id);

        return $this->render('contact/index.html.twig', [
            'name' => 'Alex',
            'contacts' => $this->contactRepository->findAll(),
            'currentContact' => $contact
        ]);
    }

    /**
     * @Route("/contactez-nous", name="contact")
     */
    public function index(): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);

        return $this->renderForm('contact/index.html.twig', [
            'name' => 'Alex',
            'contacts' => $this->contactRepository->findAll(),
            'form' => $form,
        ]);
    }

    /**
     * @Route("/contacter/{city}", name="contactCity")
     */
    public function contactCity(Request $request, string $city): Response
    {
        $request->headers->get('Referer');
        $name = $request->query->get('name');

        dump($name);

        return $this->render('contact/index.html.twig', [
            'name' => $name,
            'city' => $city,
        ]);
    }
}
