<?php

namespace AppBundle\Controller;

use AppBundle\Entity\TeacherAccount;
use AppBundle\Form\TeacherAccountType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

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
     public function teacherNewAction(Request $request)
     {
       /* Check if user is authenticated as a teacher
        *   If so, redirect to '/teacher/games'
        */

        // Create new account form
        $account = new TeacherAccount();
        $form = $this->createForm(TeacherAccountType::class, $account);

        // Handle submit request
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // Encode password
            $password = $this->get('security.password_encoder')
                ->encodePassword($account, $account->getPlainPassword());
            $account->setPassword($password);
            // Persist data to database
            $em = $this->getDoctrine()->getManager();
            $em->persist($account);
            $em->flush();
            return $this->redirectToRoute('teacher_games_index');
        }

        return $this->render(
            'teacher/join.html.twig',
            array('form' => $form->createView())
        );
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
