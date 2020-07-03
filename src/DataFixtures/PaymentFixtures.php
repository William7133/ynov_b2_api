<?php

namespace App\DataFixtures;

use App\Entity\Payment;
use App\Repository\ProjetRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class PaymentFixtures extends Fixture implements DependentFixtureInterface
{
    /**
     * @var \App\Entity\Projet[]
     */
    private $projects;

    private $projectRepository;
    /**
     * PaymentFixtures constructor.
     * @param ProjetRepository $projectRepository
     */
    public function __construct(ProjetRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function load(ObjectManager $manager)
    {
        $this->projects = $this->projectRepository->findAll();
        for($i=0;$i<4;$i++){
            $payment = new Payment();
            $payment->setAmount(100*$i+200);
            $payment->setComment("Payment numéro : ".($i+1));
            $payment->setDonatorName("William");
            $payment->setPaymentDate(new \DateTime());
            $payment->setProject($this->projects[array_rand($this->projects)]);
            $manager->persist($payment);
        }

        $manager->flush();
    }

    /**
     * @inheritDoc
     */
    public function getDependencies()
    {
        return array(
            ProjectFixtures::class,
        );
    }
}
