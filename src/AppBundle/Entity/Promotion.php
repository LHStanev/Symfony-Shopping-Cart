<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Promotion
 *
 * @ORM\Table(name="promotions")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PromotionRepository")
 */
class Promotion
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="discount", type="integer")
     * @Assert\NotBlank(message="Please, enter a discount percent!")
     * @Assert\Range(min="1",max="99", minMessage="Please enter a positive number!", maxMessage="Promotion can't be larger than 99 percent!")
     */
    private $discount;

    /**
     * @var \DateTime
     * @ORM\Column(name="startDate", type="date")
     * @Assert\NotBlank(message="Please, enter a start date.")
     * @Assert\Date()
     */
    private $startDate;

    /**
     * @var \DateTime
     * @ORM\Column(name="endDate", type="date")
     * @Assert\NotBlank(message="Please, enter an end date.")
     * @Assert\Date()
     */
    private $endDate;

    /**
     * @var Genre
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Genre",inversedBy="promotions")
     */
    private $genre;

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
     * Set startDate
     *
     * @param \DateTime $startDate
     *
     * @return Promotion
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     *
     * @return Promotion
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get endDate
     *
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @return Genre
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * @param Genre $genre
     */
    public function setGenre(Genre $genre)
    {
        $this->genre = $genre;
    }

    /**
     * @return int
     */
    public function getDiscount(): ?int
    {
        return $this->discount;
    }

    /**
     * @param int $discount
     */
    public function setDiscount(int $discount)
    {
        $this->discount = $discount;
    }
}

