<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Game;
use AppBundle\Entity\AnonymousStudent;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

class StudentGamesController extends Controller
{
    /**
     * @Route("/play/{joinCode}", name="play_game")
     */
     public function studentGameAction($joinCode)
     {
         // If user is a teacher, send them to the admin page
         if($this->getUser())
         {
             // TODO: set flash message here
             return $this->redirectToRoute(
                 'teacher_game_admin',
                 array(
                        'joinCode' => $joinCode,
             ));
         }

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

          $session = $this->container->get('session');
          $session->start();

           // Associate student session with database entry or create new one
          if($session->get('id')) {
              // Get relevant information from database
              $student = $this->getDoctrine()
                    ->getRepository('AppBundle:AnonymousStudent')
                    ->find($session->get('id'));
          } else {
              // Generate a new AnonymousStudent
              $student = new AnonymousStudent();
              $student->setNickname($this->_generateStudentNickname());
              $student->setJoinCode($joinCode);
              // Save it to the database
              $em = $this->getDoctrine()->getManager();
              $em->persist($student);
              $em->flush();
              // Assign ID to session
              $session->set('id', $student->getId());
          }

          return $this->render(
              'student/game.html.twig',
              array(
                  'student' => $student,
                  'game' => $game
              )
          );
     }

     /**
      * @Route("/play", name="join_game")
      */
    public function studentJoinGameAction()
    {
        return $this->render('student/join_game.html.twig');
    }

    private function _generateStudentNickname() {
        // TODO: implement this properly with a longer list of economists and a uniqueness check to handle collisions
        $economists = array("Bastiat", "Keynes", "Friedman", "Krugman");
        $random = substr(str_shuffle(str_repeat('0123456789', 4)), 1, 4);
        $name = $economists[array_rand($economists)] . $random;
        return $name;
    }
}
