<?php

namespace Yabe\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductInteractions
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Yabe\MainBundle\Entity\ProductInteractionsRepository")
 */
class ProductInteractions
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
     * @ORM\ManyToOne(targetEntity="Yabe\UserBundle\Entity\User", inversedBy="productInteractions")
     */
    private $user;


    /**
     * @ORM\ManyToOne(targetEntity="Yabe\MainBundle\Entity\Product", inversedBy="productInteractions")
     */
    private $product;

    /**
     * @var integer
     *
     * @ORM\Column(name="clicks", type="integer")
     */
    private $clicks;

    /**
     * @var integer
     *
     * @ORM\Column(name="rating", type="integer")
     */
    private $rating;


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
     * Set clicks
     *
     * @param integer $clicks
     * @return ProductInteractions
     */
    public function setClicks($clicks)
    {
        $this->clicks = $clicks;

        return $this;
    }

    /**
     * Get clicks
     *
     * @return integer 
     */
    public function getClicks()
    {
        return $this->clicks;
    }

    /**
     * Set rating
     *
     * @param integer $rating
     * @return ProductInteractions
     */
    public function setRating($rating)
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * Get rating
     *
     * @return integer 
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Set user
     *
     * @param \Yabe\UserBundle\Entity\User $user
     * @return ProductInteractions
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

    /**
     * Set product
     *
     * @param \Yabe\MainBundle\Entity\Product $product
     * @return ProductInteractions
     */
    public function setProduct(\Yabe\MainBundle\Entity\Product $product = null)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \Yabe\MainBundle\Entity\Product 
     */
    public function getProduct()
    {
        return $this->product;
    }
}
