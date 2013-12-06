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
     * @ORM\OneToMany(targetEntity="Yabe\MainBundle\Entity\Evaluations", mappedBy="user")
     */
    private $evaluations;

    /**
     * @ORM\OneToMany(targetEntity="Yabe\MainBundle\Entity\ProductInteractions", mappedBy="user")
     */
    private $productInteractions;

    /**
     * @ORM\OneToMany(targetEntity="Yabe\MainBundle\Entity\SocialNetwork", mappedBy="user")
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

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=30, nullable=true)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="profilePicture", type="string", length=255, nullable=true)
     */
    private $profilePicture;

    /**
     * @var float
     *
     * @ORM\Column(name="score", type="float", nullable=true)
     */
    private $score;


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
        parent::__construct();
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

    /**
     * Set phone
     *
     * @param string $phone
     * @return User
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return User
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set profilePicture
     *
     * @param string $profilePicture
     * @return User
     */
    public function setProfilePicture($profilePicture)
    {
        $this->profilePicture = $profilePicture;

        return $this;
    }

    /**
     * Get profilePicture
     *
     * @return string 
     */
    public function getProfilePicture()
    {
        return $this->profilePicture;
    }

    /**
     * Set score
     *
     * @param float $score
     * @return User
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
     * Add evaluations
     *
     * @param \Yabe\MainBundle\Entity\Evaluations $evaluations
     * @return User
     */
    public function addEvaluation(\Yabe\MainBundle\Entity\Evaluations $evaluations)
    {
        $this->evaluations[] = $evaluations;

        return $this;
    }

    /**
     * Remove evaluations
     *
     * @param \Yabe\MainBundle\Entity\Evaluations $evaluations
     */
    public function removeEvaluation(\Yabe\MainBundle\Entity\Evaluations $evaluations)
    {
        $this->evaluations->removeElement($evaluations);
    }

    /**
     * Get evaluations
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEvaluations()
    {
        return $this->evaluations;
    }
}
