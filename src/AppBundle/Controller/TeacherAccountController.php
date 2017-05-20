<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class TeacherAccountController extends Controller
{
    /**
     * @Route("/teacher")
     */
     public function teacherAction() {
      // Display 'static/teacher.html.twig'
     }

    /**
     * @Route("/teacher/join")
     */
     public function teacherNewAction()
     {
       /* Check if user is authenticated as a teacher
        *   If so, redirect to '/teacher/games'
        * Display 'teacher/join' view
        */
     }

     /**
      * @Route("/teacher/login")
      */
      public function teacherLoginAction()
      {
        /* Check if user is authenticated as a teacher
         *   If so, redirect to '/teacher/games'
         * Display 'teacher/login' view
         */
      }
}
