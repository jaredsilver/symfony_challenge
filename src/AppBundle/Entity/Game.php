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

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set teacherID
     *
     * @param integer $teacherID
     *
     * @return Game
     */
    public function setTeacherID($teacherID)
    {
        $this->teacherID = $teacherID;

        return $this;
    }

    /**
     * Get teacherID
     *
     * @return integer
     */
    public function getTeacherID()
    {
        return $this->teacherID;
    }

    /**
     * Set joinCode
     *
     * @param string $joinCode
     *
     * @return Game
     */
    public function setJoinCode($joinCode)
    {
        $this->joinCode = $joinCode;

        return $this;
    }

    /**
     * Get joinCode
     *
     * @return string
     */
    public function getJoinCode()
    {
        return $this->joinCode;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return Game
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean
     */
    public function getActive()
    {
        return $this->active;
    }
}
