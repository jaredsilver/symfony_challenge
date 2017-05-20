<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint as UniqueConstraint;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="students", uniqueConstraints={@UniqueConstraint(name="nickname_unique", columns={"nickname", "gameID"})})
 */
class AnonymousStudent
{
  /**
   * @ORM\Column(type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;

  /**
   * @ORM\Column(type="string", length=64)
   */
  private $nickname;

  /**
   * @ORM\Column(name="gameID", type="integer")
   */
  private $gameID;

  /**
   * @ORM\Column(type="integer")
   */
  private $score;


}
