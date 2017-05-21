<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint as UniqueConstraint;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="students", uniqueConstraints={@UniqueConstraint(name="nickname_unique", columns={"nickname", "join_code"})})
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
     * @ORM\Column(name="join_code", type="string")
     */
    private $joinCode;

    /**
     * @ORM\Column(type="integer")
     */
    private $score = 1000;

    /**
     * @ORM\Column(type="integer")
     */
    private $wager = 0;

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
     * Set nickname
     *
     * @param string $nickname
     *
     * @return AnonymousStudent
     */
    public function setNickname($nickname)
    {
        $this->nickname = $nickname;

        return $this;
    }

    /**
     * Get nickname
     *
     * @return string
     */
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * Set joinCode
     *
     * @param integer $joinCode
     *
     * @return AnonymousStudent
     */
    public function setJoinCode($joinCode)
    {
        $this->joinCode = $joinCode;

        return $this;
    }

    /**
     * Get joinCode
     *
     * @return integer
     */
    public function getJoinCode()
    {
        return $this->joinCode;
    }

    /**
     * Set score
     *
     * @param integer $score
     *
     * @return AnonymousStudent
     */
    public function setScore($score)
    {
        $this->score = $score;

        return $this;
    }

    /**
     * Get score
     *
     * @return integer
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * Set wager
     *
     * @param integer $wager
     *
     * @return AnonymousStudent
     */
    public function setWager($wager)
    {
        $this->wager = $wager;

        return $this;
    }

    /**
     * Get wager
     *
     * @return integer
     */
    public function getWager()
    {
        return $this->wager;
    }
}
