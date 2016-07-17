<?php
// src/DietBundle/Entity/User.php

namespace DietBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
* @ORM\Table(name="diet_user")
*/
class User extends BaseUser
{
/**
* @ORM\Id
* @ORM\Column(type="integer")
* @ORM\GeneratedValue(strategy="AUTO")
*/
protected $id;

/**
 * 
 * 
 * @ORM\Column(type="float")
 * 
 */
protected $waga;

/**
 * 
 * 
 * @ORM\Column(type="float")
 */
protected $wzrost;

/**
 * 
 * @ORM\Column(type="string")
 */
protected $plec;

/**
 * 
 * @ORM\Column(type="integer")
 */
protected $wiek;

/**
 * 
 * @ORM\Column(type="integer")
 */
protected $ppm;

/**
 * @ORM\Column(type="float", nullable = true)
 */
protected $pa;

/**
 * @ORM\Column(type="integer")
 */
protected $paType;

/**
 * @ORM\Column(type="integer")
 */
protected $cpm;

/**
 * @ORM\Column(type="integer")
 */
protected $dietType;

/**
 * @ORM\Column(type="integer")
 */
protected $dietCpm;

public function __construct()
{
    parent::__construct();
}

public function setWzrost($wzrost)
{
    $this->wzrost = $wzrost;
    $this->updatePpm();
    
}


public function getWzrost()
{
    return $this->wzrost;
}

public function setWaga($waga)
{
    $this->waga = $waga;
    $this->updatePpm();

}

public function getWaga()
{
    return $this->waga;
}

public function setWiek($wiek)
{
    $this->wiek = $wiek;
    $this->updatePpm();

}

public function getWiek()
{
    return $this->wiek;
}

public function setPlec($plec)
{
    $this->plec = $plec;
    $this->updatePpm();
    $this->updatePa();
}

public function getPlec()
{
    return $this->plec;
}


public function updatePpm()
{
  if($this->getPlec() == "kobieta"){  
    $this->ppm = round(655.1 + 9.563 * $this->getWaga() + 1.85 * $this->getWzrost() - 4.676 * $this->getWiek());
  }
  else{
    $this->ppm = round(66.5 + 13.75 * $this->getWaga() + 5.033 * $this->getWzrost() - 6.755 * $this->getWiek());
  }
  $this->updateCpm();
}


public function getPpm()
{
    return $this->ppm;
}

public function updatePa()
{
    if($this->plec == 'kobieta'){
        if($this->paType == 1){
            $this->pa = 1.0;
        }
        if($this->paType == 2){
            $this->pa = 1.12;
        }
        if($this->paType == 3){
            $this->pa = 1.27;
        }
        if($this->paType == 4){
            $this->pa = 1.45; 
        }
    }
    if($this->plec == 'mezczyzna'){
        if($this->paType == 1){
            $this->pa = 1.0;
        }
        if($this->paType == 2){
            $this->pa = 1.11;
        }
        if($this->paType == 3){
            $this->pa = 1.25;
        }
        if($this->paType == 4){
            $this->pa = 1.48;
        }
    }
    $this->updateCpm();
}

public function getPa()
{
    return $this->pa;
}

public function setPaType($paType)
{
    $this->paType = $paType;
    $this->updatePa();
}

public function getPaType()
{
    return $this->paType;
}

public function updateCpm()
{
    $this->cpm = round($this->getPpm() * $this->getPa());
}

public function getCpm()
{
    return $this->cpm;
}

public function setDietType($dietType)
{
    $this->dietType = $dietType;
    $this->setDietCpm();
}

public function getDietType()
{
    return $this->dietType;
}

public function setDietCpm()
{
    if($this->dietType == 1){
        $this->dietCpm = raound($this->getCpm() - $this->getCpm() * 0.2);
    }
    if($this->dietType == 2){
        $this->dietCpm = $this->getCpm();
    }
    if($this->dietType == 3){
        $this->dietCpm = round($this->getCpm() + $this->getCpm() * 0.2);
    }
}

public function getDietCpm()
{
    return $this->dietCpm();
}

}
