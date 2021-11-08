<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(Request $requestCity,Request $requestName): Response
    {  $name = $requestName->query->get("name");
        $city  = $requestCity->query->get('city');
        if(strlen($name) == 0){
            $name = null;
        }
            return $this->render('contact/index.html.twig', [
                "name"=>$name,
                "city"=>$city
            ]);
            

        
    }

    /**
     * @Route("/contact/{city}", name="contactCity")
     */

    public function contactCity(Request $request, string $city): Response{

        $name = $request->query->get('name');

        return $this->render('contact/index.html.twig', [
            'name' => $name,
            "city" => $city
        ]);
        

    }
}
