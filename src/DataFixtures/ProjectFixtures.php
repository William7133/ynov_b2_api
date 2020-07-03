<?php

namespace App\DataFixtures;

use App\Entity\Projet;
use DateInterval;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProjectFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $date = new \DateTime();
        for($i=1;$i<=4;$i++){
            $project = new Projet();
            $project->setName("Project ".$i);
            $project->setStartDate($date );
            $project->setCreated($date );
            $project->setDescription("c'est le projet numéro : ".$i);
            $project->setGoal(1000*$i);
            $project->setPicture("https://picsum.photos/200/300");
            $project->setEndDate($date->add(new DateInterval('P6M')));
            $manager->persist($project);
        }

        $manager->flush();
    }

}
