<?php

namespace DietBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Diet
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Diet
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
     * @var string
     *
     * @ORM\Column(name="diet_type", type="string", length=255)
     */
    private $dietType;

    /**
     * @var integer
     *
     * @ORM\Column(name="calories", type="integer")
     */
    private $calories;


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
     * Set dietType
     *
     * @param string $dietType
     * @return Diet
     */
    public function setDietType($dietType)
    {
        $this->dietType = $dietType;

        return $this;
    }

    /**
     * Get dietType
     *
     * @return string 
     */
    public function getDietType()
    {
        return $this->dietType;
    }

    /**
     * Set calories
     *
     * @param integer $calories
     * @return Diet
     */
    public function setCalories($calories)
    {
        $this->calories = $calories;

        return $this;
    }

    /**
     * Get calories
     *
     * @return integer 
     */
    public function getCalories()
    {
        return $this->calories;
    }
}
