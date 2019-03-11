<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Spectacle;

class SpectacleController extends AbstractController
{
    public function adminList(EntityManagerInterface $iface)
    {
        // Check if a user is connected
        if($this->getUser())
        {
            // Access if the user is an admin
            if(in_array("ROLE_ADMIN",$this->getUser()->getRoles()))
            {
                $repo = $iface->getRepository(Spectacle::class);
                $sp = $repo->findAll();

                return $this->render('spectacle/adminlist.html.twig', [
                    "auth" => true,
                    "admin" => true,
                    "len" => count($sp),
                    "spec" => $sp,
                ]);
            }
            else
            {
                // The user is not an admin
                return $this->render('spectacle/adminlist.html.twig', [
                    "auth" => true,
                    "admin" => false,
                ]);                
            }
        }
        else
        {
            // The user isn't connected
            return $this->render('spectacle/adminlist.html.twig', [
                "auth" => false,
                "admin" => false,
            ]); 
        }
    }

    public function add(EntityManagerInterface $iface)
    {
        return $this->render('spectacle/adminadd.html.twig', []);
    }
}
