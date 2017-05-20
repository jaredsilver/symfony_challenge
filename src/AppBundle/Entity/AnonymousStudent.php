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

    /**
     * @ORM\Column(type="integer")
     */
    private $wager;

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
     * Set gameID
     *
     * @param integer $gameID
     *
     * @return AnonymousStudent
     */
    public function setGameID($gameID)
    {
        $this->gameID = $gameID;

        return $this;
    }

    /**
     * Get gameID
     *
     * @return integer
     */
    public function getGameID()
    {
        return $this->gameID;
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
