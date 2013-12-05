<?php

namespace Yabe\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Yabe\MainBundle\Entity\ProductRepository")
 */
class Product
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
     * @ORM\OneToMany(targetEntity="Yabe\MainBundle\Entity\productInteractions", mappedBy="product")
     */
    private $productInteractions;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="string", length=30)
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="text")
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="clicks", type="integer")
     */
    private $clicks;


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
     * Set name
     *
     * @param string $name
     * @return Product
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set price
     *
     * @param string $price
     * @return Product
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return Product
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Product
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set clicks
     *
     * @param integer $clicks
     * @return Product
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
     * Constructor
     */
    public function __construct()
    {
        $this->productInteractions = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add productInteractions
     *
     * @param \Yabe\MainBundle\Entity\productInteractions $productInteractions
     * @return Product
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
}
