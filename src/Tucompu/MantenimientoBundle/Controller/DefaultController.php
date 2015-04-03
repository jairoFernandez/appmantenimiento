<?php

namespace Tucompu\MantenimientoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('MantenimientoBundle:Default:index.html.twig');
    }
}
