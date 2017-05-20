<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class TeacherGamesController extends Controller
{
    /**
     * @Route("/teacher/game/{gameID}")
     */
     public function teacherGameAction()
     {
       /* Check if user is authenticated as a teacher
        *   If not, redirect to '/teacher/login'
        * Check if gameID exists in url
        *   If not, redirect to '/teacher/games' (w/o ID)
        * Check if the gameID exists in database
        *   If not, redirect to '/teacher/games' (w/o ID)
        * Check if gameID belongs to that teacher
        *   If not, redirect to '/teacher/games' (w/o ID)
        * Display 'teacher/gameAdmin' view
        */
     }

     /**
      * @Route("/teacher/games", name="teacher_games_index")
      */
      public function teacherGamesAction()
      {
          if(!$this->getUser())
          {
              // TODO: set flash message here too
              return $this->redirectToRoute('teacher_login');
          }

         // TODO: change this to find by teacher id
         $games = $this->getDoctrine()
            ->getRepository('AppBundle:Game')
            ->findAll();

        return $this->render(
            'teacher/games.html.twig',
            array('games' => $games)
        );
      }

      /**
       * @Route("/teacher/games/new", name="new_game")
       */
       public function teacherNewGameAction()
       {
         /* Check if user is authenticated as a teacher
          *   If not, redirect to '/teacher/login'
          * Display 'teacher/newGame' view
          */
       }
}
