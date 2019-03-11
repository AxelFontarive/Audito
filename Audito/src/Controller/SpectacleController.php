<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SpectacleController extends AbstractController
{
    public function add()
    {
        // Check if a user is connected
        if($this->getUser())
        {
            // Access if the user is an admin
            if(in_array("ROLE_ADMIN",$this->getUser()->getRoles()))
            {
                return $this->render('spectacle/add.html.twig', [
                    "auth" => true,
                    "admin" => true,
                ]);
            }
            else
            {
                // The user is not an admin
                return $this->render('spectacle/add.html.twig', [
                    "auth" => true,
                    "admin" => false,
                ]);                
            }
        }
        else
        {
            // The user isn't connected
            return $this->render('spectacle/add.html.twig', [
                "auth" => false,
                "admin" => false,
            ]); 
        }
    }
}
