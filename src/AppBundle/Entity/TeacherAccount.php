<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="accounts")
 * @UniqueEntity(fields="email", message="Email already taken")
 */
class TeacherAccount
{
  /**
   * @ORM\Column(type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;

  /**
   * @ORM\Column(type="string", length=255, unique=true)
   * @Assert\NotBlank()
   * @Assert\Email()
   */
  private $email;

  /**
   * @Assert\NotBlank()
   * @Assert\Length(max=4096)
   */
  private $plainPassword;

  /**
   * @ORM\Column(type="string", length=64)
   */
  private $password;

  public function getEmail()
  {
      return $this->email;
  }

  public function setEmail($email)
  {
      $this->email = $email;
  }

  public function getUsername()
  {
      return $this->username;
  }

  public function setUsername($username)
  {
      $this->username = $username;
  }

  public function getPlainPassword()
  {
      return $this->plainPassword;
  }

  public function setPlainPassword($password)
  {
      $this->plainPassword = $password;
  }

  public function getPassword()
  {
      return $this->password;
  }

  public function setPassword($password)
  {
      $this->password = $password;
  }

  // UserInterface stuff
  public function getRoles()
  {
      return array('ROLE_USER');
  }

  public function eraseCredentials()
  {
  }

  /** @see \Serializable::serialize() */
  public function serialize()
  {
      return serialize(array(
          $this->id,
          $this->username,
          $this->password,
      ));
  }

  /** @see \Serializable::unserialize() */
  public function unserialize($serialized)
  {
      list (
          $this->id,
          $this->username,
          $this->password,
      ) = unserialize($serialized);
  }

  public function getSalt()
  {
      // Not necessary because we're using bcrypt
      return null;
  }
}
