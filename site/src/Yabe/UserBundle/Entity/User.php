<?php

namespace Yabe\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Yabe\UserBundle\Entity\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
     * @ORM\OneToMany(targetEntity="Yabe\MainBundle\Entity\Geoloc", mappedBy="user")
     */
    private $geoloc;

    /**
     * @ORM\OneToMany(targetEntity="Yabe\MainBundle\Entity\productInteractions", mappedBy="user")
     */
    private $productInteractions;

    /**
     * @ORM\OneToMany(targetEntity="Yabe\MainBundle\Entity\socialNetwork", mappedBy="user")
     */
    private $socialNetwork;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=50)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=50)
     */
    private $lastname;


    public function __toString()
    {
        return $this->username;
    }


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
     * Set firstname
     *
     * @param string $firstname
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname()
    {
        return $this->lastname;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->geoloc = new \Doctrine\Common\Collections\ArrayCollection();
        $this->productInteractions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->socialNetwork = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add geoloc
     *
     * @param \Yabe\MainBundle\Entity\Geoloc $geoloc
     * @return User
     */
    public function addGeoloc(\Yabe\MainBundle\Entity\Geoloc $geoloc)
    {
        $this->geoloc[] = $geoloc;

        return $this;
    }

    /**
     * Remove geoloc
     *
     * @param \Yabe\MainBundle\Entity\Geoloc $geoloc
     */
    public function removeGeoloc(\Yabe\MainBundle\Entity\Geoloc $geoloc)
    {
        $this->geoloc->removeElement($geoloc);
    }

    /**
     * Get geoloc
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGeoloc()
    {
        return $this->geoloc;
    }

    /**
     * Add productInteractions
     *
     * @param \Yabe\MainBundle\Entity\productInteractions $productInteractions
     * @return User
     */
    public function addProductInteraction(\Yabe\MainBundle\Entity\productInteractions $productInteractions)
    {
        $this->productInteractions[] = $productInteractions;

        return $this;
    }

    /**
     * Remove productInteractions
     *
     * @param \Yabe\MainBundle\Entity\productInteractions $productInteractions
     */
    public function removeProductInteraction(\Yabe\MainBundle\Entity\productInteractions $productInteractions)
    {
        $this->productInteractions->removeElement($productInteractions);
    }

    /**
     * Get productInteractions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProductInteractions()
    {
        return $this->productInteractions;
    }

    /**
     * Add socialNetwork
     *
     * @param \Yabe\MainBundle\Entity\socialNetwork $socialNetwork
     * @return User
     */
    public function addSocialNetwork(\Yabe\MainBundle\Entity\socialNetwork $socialNetwork)
    {
        $this->socialNetwork[] = $socialNetwork;

        return $this;
    }

    /**
     * Remove socialNetwork
     *
     * @param \Yabe\MainBundle\Entity\socialNetwork $socialNetwork
     */
    public function removeSocialNetwork(\Yabe\MainBundle\Entity\socialNetwork $socialNetwork)
    {
        $this->socialNetwork->removeElement($socialNetwork);
    }

    /**
     * Get socialNetwork
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSocialNetwork()
    {
        return $this->socialNetwork;
    }
}
