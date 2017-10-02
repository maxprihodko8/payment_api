<?php
/**
 * Created by PhpStorm.
 * User: pn-user30
 * Date: 29.09.17
 * Time: 16:08
 */

namespace MaximPrihodko\Bundle\AppBundle\Entity\user;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class UserData
 * @package MaximPrihodko\Bundle\AppBundle\Entity
 * @ORM\Entity(repositoryClass="MaximPrihodko\Bundle\AppBundle\Repository\user\UserDataRepository")
 */
class UserData extends User
{
    /**
     * @var string
     * @ORM\Column(name="name", type="string", length=1000, nullable=true)
     */
    private $name;

    /**
     * @var string
     * @ORM\Column(name="surname", type="string", length=1000, nullable=true)
     */
    private $surname;

    /**
     * @var string
     * @ORM\Column(name="image", type="string", length=1000, nullable=true)
     */
    private $image;

    /**
     * @var int
     * @ORM\Column(name="status", type="integer")
     */
    private $status;

    /**
     * @var int
     * @ORM\Column(name="company_id", type="integer")
     * @ORM\OneToOne(targetEntity="MaximPrihodko\Bundle\AppBundle\Entity\Company", inversedBy="id")
     */
    private $company_id;

    /**
     * @return mixed
     */
    public function getCompanyId()
    {
        return $this->company_id;
    }

    /**
     * @param mixed $company_id
     */
    public function setCompanyId($company_id)
    {
        $this->company_id = $company_id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    /**
     * @param string $surname
     */
    public function setSurname(string $surname)
    {
        $this->surname = $surname;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage(string $image)
    {
        $this->image = $image;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus(int $status)
    {
        $this->status = $status;
    }


}