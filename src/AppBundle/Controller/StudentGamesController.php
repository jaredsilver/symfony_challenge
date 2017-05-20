<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Game;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class StudentGamesController extends Controller
{
    /**
     * @Route("/play/{joinCode}", name="play_game")
     */
     public function studentGameAction($joinCode)
     {
         $game = $this->getDoctrine()
           ->getRepository('AppBundle:Game')
           ->findOneBy(
              array('joinCode' => $joinCode, 'active' => true)
          );

          if(!$game)
          {
              // TODO: set a flash message here
              return $this->redirectToRoute('join_game');
          }

          return $this->render(
              'student/game.html.twig',
              array('game' => $game)
          );
     }

     /**
      * @Route("/play", name="join_game")
      */
    public function studentJoinGameAction()
    {
        return $this->render('student/join_game.html.twig');
    }
}
