<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use App\Entity\Persona;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $personas = [
            ["Ana","Lopez","Garcia","666112233","analopez@gmail.com","1970-03-16"],
            ["Luis","Ruiz","Mendiluce","777223344","luisruiz@gmail.com","1971-04-26"],
            ["Roberto","Cordoba","Pimentel","555112233","rober@gmail.com","1980-11-14"],
            ["Iñigo","Gonzalez","Torralba","666334455","inaki@gmail.com","1982-03-09"],
            ["Mariano","Ribas","Rubio","777665544","marino@gmail.com","1978-03-28"],
            ["Lidia","Santos","Rios","333448877","lidilidi@gmail.com","1972-12-02"]
        ];

        foreach($personas as $p) {
            $persona = new Persona();
            $persona->setNombre($p[0]);
            $persona->setApellido1($p[1]);
            $persona->setApellido2($p[2]);
            $persona->setTelefono($p[3]);
            $persona->setCorreoElectronico($p[4]);
            $persona->setFechaNacimiento(\DateTime::createFromFormat('Y-m-d', $p[5]));
            $manager->persist($persona);
        }

        $manager->flush();
    }
}
