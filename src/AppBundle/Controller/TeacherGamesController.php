<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Game;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class TeacherGamesController extends Controller
{
    /**
     * @Route("/teacher/game/{joinCode}", name="teacher_game_admin")
     */
     public function teacherGameAction()
     {
       /* Check if user is authenticated as a teacher
        *   If not, redirect to '/teacher/login'
        * Check if joinCode exists in url
        *   If not, redirect to '/teacher/games' (w/o ID)
        * Check if the joinCode exists in database
        *   If not, redirect to '/teacher/games' (w/o ID)
        * Check if joinCode belongs to that teacher
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

          $games = $this->getDoctrine()
            ->getRepository('AppBundle:Game')
            ->findByTeacherID($this->getUser()->getID());

          return $this->render(
              'teacher/games.html.twig',
              array('games' => $games)
          );
      }

      /**
       * @Route("/teacher/games/new", name="new_game")
       */
       public function teacherNewGameAction(Request $request)
       {
          if(!$this->getUser())
          {
              // TODO: set flash message here too
              return $this->redirectToRoute('teacher_login');
          }

          // Create new game form
          $game = new Game();
          $game->setTeacherID($this->getUser()->getID());
          $game->setJoinCode(substr(str_shuffle(str_repeat('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', 4)), 1, 4));
          $form = $this->createFormBuilder($game)->getForm();

          // Handle submit request
          $form->handleRequest($request);
          if ($form->isSubmitted() && $form->isValid()) {
              // Persist data to database
              // TODO: handle collisions on joinCode
                // --> doesn't matter yet (statistically speaking), but this is really poor code if left like this before launch
              $em = $this->getDoctrine()->getManager();
              $em->persist($game);
              $em->flush();
              return $this->redirectToRoute('teacher_game_admin', array('joinCode' => $game->getJoinCode()));
          }

          return $this->render(
              'teacher/new_game.html.twig',
              array('form' => $form->createView())
          );
          return $this->render('teacher/new_game.html.twig');
       }
}
