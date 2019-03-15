<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Spectacle;
use App\Entity\TypeSpectacle;

class SpectacleController extends AbstractController
{
    public function adminList(EntityManagerInterface $iface)
    {
        $repo = $iface->getRepository(Spectacle::class);
        $sp = $repo->findAll();

        return $this->render('spectacle/adminlist.html.twig', ["len" => count($sp), "sp" => $sp]);
    }

    public function add(EntityManagerInterface $iface, Request $request)
    {
        $repo = $iface->getRepository(TypeSpectacle::class);
        $req = $request->request;
        $token = $request->request->get('token');
        
        if($token)
        {
            //dd("TODO NO CHECKING HERE !");
            $spec = new Spectacle();
            $spec->setNomSpectacle($req->get('sp_name'));
            $spec->setDescription($req->get('sp_desc'));

            $type = $repo->find($req->get('sp_type'));
            $spec->setTypeSpectacle($type);
            $spec->setImage($req->get('sp_url'));
            if($req->get('sp_scenemod'))
            {
                $spec->setModulationScene(true);
            }
            else
            {
                $spec->setModulationScene(false);
            }

            $iface->persist($spec);
            $iface->flush();

            // Returning to the lists CHANGE THIS
            return $this->render('home/index.html.twig', []);
        }
        else
        {
            // Getting the TypeSpectacle objects
            $tsp = $iface->getRepository(TypeSpectacle::class)->findAll();
            return $this->render('spectacle/adminadd.html.twig', ["tsp" => $tsp]);
        }
    }
}
