<?php
/**
 * Created by PhpStorm.
 * User: pn-user30
 * Date: 07.09.17
 * Time: 14:34
 */

namespace MaximPrihodko\Bundle\UserBundle\Model;


class UserModelPlainObject implements UserModelInterface
{
    protected $username;
    protected $password;

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }
}