<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HTTPFoundation\Response;

class IndexController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        return $this->render('static/index.html.twig');
    }

    public function teacherIsLoggedInAction()
    {
        return new Response($this->getUser() ? 1 : 0);
    }
}
