<?php

namespace App\Entity;

use App\Repository\ProjetRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"project_listing:read"}},
 *     attributes={
 *          "formats"={"jsonld", "json", "html", "csv"={"text/csv"}}
 *     }
 * )
 * @ApiFilter(SearchFilter::class, properties={"name": "ipartial"})
 * @ORM\Entity(repositoryClass=ProjetRepository::class)
 */
class Projet
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"payment_listing:read","project_listing:read"})
     */
    private $name;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"payment_listing:read","project_listing:read"})
     */
    private $startDate;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"payment_listing:read","project_listing:read"})
     */
    private $endDate;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"project_listing:read"})
     */
    private $picture;

    /**
     * @ORM\Column(type="text")
     * @Groups({"project_listing:read"})
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     * @Groups("project_listing:read")
     */
    private $goal;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created;

    /**
     * @Groups("project_listing:read")
     */
    private $nbPayments;

    /**
     * @Groups("project_listing:read")
     */
    private $currentTotalAmount;

    /**
     * @ORM\OneToMany(targetEntity=Payment::class, mappedBy="project", orphanRemoval=true)
     * @Groups("project_listing:read")
     */
    private $payments;

    public function __construct()
    {
        $this->payments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTimeInterface $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->endDate;
    }

    public function setEndDate(\DateTimeInterface $endDate): self
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getGoal(): ?int
    {
        return $this->goal;
    }

    public function setGoal(int $goal): self
    {
        $this->goal = $goal;

        return $this;
    }

    public function getCreated(): ?\DateTimeInterface
    {
        return $this->created;
    }

    public function setCreated(\DateTimeInterface $created): self
    {
        $this->created = $created;

        return $this;
    }

    /**
     * @return Collection|Payment[]
     */
    public function getPayments(): Collection
    {
        return $this->payments;
    }

    public function addPayment(Payment $payment): self
    {
        if (!$this->payments->contains($payment)) {
            $this->payments[] = $payment;
            $payment->setProject($this);
        }

        return $this;
    }

    public function removePayment(Payment $payment): self
    {
        if ($this->payments->contains($payment)) {
            $this->payments->removeElement($payment);
            // set the owning side to null (unless already changed)
            if ($payment->getProject() === $this) {
                $payment->setProject(null);
            }
        }

        return $this;
    }

    public function getNbPayments() : int
    {
        return $this->payments->count();
    }

    public function setNbPayments(int $nbPayments) : self
    {
        $this->nbPayments = $nbPayments;

        return $this;
    }

    public function setCurrentTotalAmount(int $currentTotalAmount) : self
    {
        $this->currentTotalAmount = $currentTotalAmount;

        return $this;
    }

    public function getCurrentTotalAmount() : int
    {
        $count = 0;
        foreach ($this->payments as $payment){
            $count += $payment->getAmount();
        }
         return $count;
    }
}
