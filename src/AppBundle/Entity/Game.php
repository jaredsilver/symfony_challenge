<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="games")
 */
class Game
{
  /**
   * @ORM\Column(type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;

  /**
   * @ORM\Column(type="integer")
   */
  private $teacherID;

  /**
   * @ORM\Column(type="string", length=4)
   */
  private $joinCode;

  /**
   * @ORM\Column(type="boolean")
   */
  private $active = true;
}
