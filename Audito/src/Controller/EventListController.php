<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EventListController extends AbstractController
{
    public function list($slug)
    {
        return $this->render('event_list/index.html.twig', [
            'slug' => $slug,
        ]);
    }

    public function all()
    {

        return $this->render('event_list/index.html.twig', [
            'slug' => "all", 
        ]);
    }
}
