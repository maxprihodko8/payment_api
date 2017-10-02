<?php

namespace MaximPrihodko\Bundle\AppBundle\Entity\voter;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * VoterGroup
 *
 * @ORM\Table(name="voter_group")
 * @ORM\Entity(repositoryClass="MaximPrihodko\Bundle\AppBundle\Repository\voter\VoterGroupRepository")
 */
class VoterGroup
{

    public function __construct()
    {
        $this->voters = new ArrayCollection();
    }

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;

    /**
     * @var Voter[]
     *
     * @ORM\ManyToMany(targetEntity="MaximPrihodko\Bundle\AppBundle\Entity\voter\Voter", inversedBy="groups")
     */
    private $voters;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return VoterGroup
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
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return VoterGroup
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return bool
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * @return array
     */
    public function getVoters(): array
    {
        return $this->voters;
    }
}

