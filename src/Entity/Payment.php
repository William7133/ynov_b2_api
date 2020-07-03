<?php

namespace App\Entity;

use App\Repository\PaymentRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"payment_listing:read"}},
 *     attributes={
 *          "formats"={"jsonld", "json", "html", "csv"={"text/csv"}}
 *     }
 * )
 * @ORM\Entity(repositoryClass=PaymentRepository::class)
 */
class Payment
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
    private $donatorName;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"payment_listing:read","project_listing:read"})
     */
    private $amount;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"payment_listing:read","project_listing:read"})
     */
    private $comment;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"payment_listing:read","project_listing:read"})
     */
    private $paymentDate;

    /**
     * @ORM\ManyToOne(targetEntity=Projet::class, inversedBy="payments",cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"payment_listing:read"})
     */
    private $project;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDonatorName(): ?string
    {
        return $this->donatorName;
    }

    public function setDonatorName(string $donatorName): self
    {
        $this->donatorName = $donatorName;

        return $this;
    }

    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function setAmount(int $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getPaymentDate(): ?\DateTimeInterface
    {
        return $this->paymentDate;
    }

    public function setPaymentDate(\DateTimeInterface $paymentDate): self
    {
        $this->paymentDate = $paymentDate;

        return $this;
    }

    public function getProject(): ?Projet
    {
        return $this->project;
    }

    public function setProject(?Projet $project): self
    {
        $this->project = $project;

        return $this;
    }
}
