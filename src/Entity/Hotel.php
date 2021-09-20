<?php

namespace App\Entity;

use App\Repository\ChambresRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HotelRepository::class)
 */
class Hotel
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lieu;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Chambre", mappedBy="hotel", fetch="EXTRA_LAZY")
     */
    private $chambres;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param mixed $titre
     * @return Hotel
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLieu()
    {
        return $this->lieu;
    }

    /**
     * @param mixed $lieu
     * @return Hotel
     */
    public function setLieu($lieu)
    {
        $this->lieu = $lieu;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getChambres()
    {
        return $this->chambres;
    }

    /**
     * @param mixed $chambres
     * @return Hotel
     */
    public function setChambres($chambres)
    {
        $this->chambres = $chambres;
        return $this;
    }
}
