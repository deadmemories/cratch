<?php

namespace App\Models;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @ORM\Column(name="login", type="string", length=50)
     */
    private $login;

    public function getLogin()
    {
        return $this->login;
    }

    public function setLogin(string $name)
    {
        $this->login = $name;

        return $this;
    }
}