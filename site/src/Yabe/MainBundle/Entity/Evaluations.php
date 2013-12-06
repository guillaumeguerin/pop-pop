<?php

namespace Yabe\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evaluations
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Yabe\MainBundle\Entity\EvaluationsRepository")
 */
class Evaluations
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Yabe\UserBundle\Entity\User", inversedBy="evaluations")
     */
    private $user;

    /**
     * @var float
     *
     * @ORM\Column(name="score", type="float")
     */
    private $score;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text")
     */
    private $comment;


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
     * Set score
     *
     * @param float $score
     * @return Evaluations
     */
    public function setScore($score)
    {
        $this->score = $score;

        return $this;
    }

    /**
     * Get score
     *
     * @return float 
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * Set comment
     *
     * @param string $comment
     * @return Evaluations
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string 
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set user
     *
     * @param \Yabe\UserBundle\Entity\User $user
     * @return Evaluations
     */
    public function setUser(\Yabe\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Yabe\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}
