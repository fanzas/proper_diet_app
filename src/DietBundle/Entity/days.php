<?php

namespace DietBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * days
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class days
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var integer
     *
     * @ORM\Column(name="calories", type="integer")
     */
    private $calories;

    /**
     * @var integer
     *
     * @ORM\Column(name="caloriesLeft", type="integer")
     */
    private $caloriesLeft;

    /**
     * @var integer
     *
     * @ORM\Column(name="caloriesOver", type="integer")
     */
    private $caloriesOver;


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
     * Set date
     *
     * @param \DateTime $date
     * @return days
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set calories
     *
     * @param integer $calories
     * @return days
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

    /**
     * Set caloriesLeft
     *
     * @param integer $caloriesLeft
     * @return days
     */
    public function setCaloriesLeft($caloriesLeft)
    {
        $this->caloriesLeft = $caloriesLeft;

        return $this;
    }

    /**
     * Get caloriesLeft
     *
     * @return integer 
     */
    public function getCaloriesLeft()
    {
        return $this->caloriesLeft;
    }

    /**
     * Set caloriesOver
     *
     * @param integer $caloriesOver
     * @return days
     */
    public function setCaloriesOver($caloriesOver)
    {
        $this->caloriesOver = $caloriesOver;

        return $this;
    }

    /**
     * Get caloriesOver
     *
     * @return integer 
     */
    public function getCaloriesOver()
    {
        return $this->caloriesOver;
    }
}
