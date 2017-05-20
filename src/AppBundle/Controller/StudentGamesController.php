<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class StudentGamesController extends Controller
{
    /**
     * @Route("/play/{gameID}")
     */
     public function studentGameAction()
     {
       /* Check if gameID exists in url
        *   If not, redirect to '/play' (w/o ID)
        * Check if the gameID exists in database
        *   If not, redirect to '/play' (w/o ID)
        * Check if the game has started yet
        *   If not, display 'student/wait' view
        * Display the 'student/game' view
        */
     }

     /**
      * @Route("/play")
      */
    public function studentJoinGameAction() {
      // display the 'student/joinGame' view
    }
}
