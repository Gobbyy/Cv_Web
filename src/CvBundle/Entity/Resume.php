<?php

namespace CvBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Resume
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Resume
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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="poste", type="string", length=255)
     */
    private $poste;

    /**
     * @var array
     *
     * @ORM\Column(name="formation", type="array")
     */
    private $formation;

    /**
     * @var array
     *
     * @ORM\Column(name="experience", type="array")
     */
    private $experience;

    /**
     * @var string
     *
     * @ORM\Column(name="shortresume", type="text")
     */
    private $shortresume;

    /**
     * @var array
     *
     * @ORM\Column(name="langues", type="array")
     */
    private $langues;

    /**
     * @var array
     *
     * @ORM\Column(name="competences", type="array")
     */
    private $competences;


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
     * Set nom
     *
     * @param string $nom
     *
     * @return Resume
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Resume
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set poste
     *
     * @param string $poste
     *
     * @return Resume
     */
    public function setPoste($poste)
    {
        $this->poste = $poste;

        return $this;
    }

    /**
     * Get poste
     *
     * @return string
     */
    public function getPoste()
    {
        return $this->poste;
    }

    /**
     * Set formation
     *
     * @param array $formation
     *
     * @return Resume
     */
    public function setFormation($formation)
    {
        $this->formation = $formation;

        return $this;
    }

    /**
     * Get formation
     *
     * @return array
     */
    public function getFormation()
    {
        return $this->formation;
    }

    /**
     * Set experience
     *
     * @param array $experience
     *
     * @return Resume
     */
    public function setExperience($experience)
    {
        $this->experience = $experience;

        return $this;
    }

    /**
     * Get experience
     *
     * @return array
     */
    public function getExperience()
    {
        return $this->experience;
    }

    /**
     * Set shortresume
     *
     * @param string $shortresume
     *
     * @return Resume
     */
    public function setShortresume($shortresume)
    {
        $this->shortresume = $shortresume;

        return $this;
    }

    /**
     * Get shortresume
     *
     * @return string
     */
    public function getShortresume()
    {
        return $this->shortresume;
    }

    /**
     * Set langues
     *
     * @param array $langues
     *
     * @return Resume
     */
    public function setLangues($langues)
    {
        $this->langues = $langues;

        return $this;
    }

    /**
     * Get langues
     *
     * @return array
     */
    public function getLangues()
    {
        return $this->langues;
    }

    /**
     * Set competences
     *
     * @param array $competences
     *
     * @return Resume
     */
    public function setCompetences($competences)
    {
        $this->competences = $competences;

        return $this;
    }

    /**
     * Get competences
     *
     * @return array
     */
    public function getCompetences()
    {
        return $this->competences;
    }
}
