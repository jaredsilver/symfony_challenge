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
     public function teacherGameAction($joinCode)
     {
       if(!$this->getUser())
       {
           // TODO: set flash message here too
           return $this->redirectToRoute('teacher_login');
       }

       $game = $this->getDoctrine()
         ->getRepository('AppBundle:Game')
         ->findOneBy(
            array('joinCode' => $joinCode, 'teacherID' => $this->getUser()->getID())
        );

       if(!$game) {
           // TODO: set a flash message here
           return $this->redirectToRoute('teacher_games_index');
       }

       return $this->render(
           'teacher/game_admin.html.twig',
           array('game' => $game)
       );
     }

     /**
      * @Route("/teacher/game")
      */
     public function teacherGameRedirectAction()
     {
         // Let's handle if someone navigates to /teacher/game without a join code so they don't see an ugly 404 page
         return $this->redirectToRoute('teacher_games_index');
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
       }
}
