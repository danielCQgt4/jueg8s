<?php

class Session
{
    private $host = '192.168.100.8';

    function Session()
    {
        session_start();
    }

    public function changeName($name)
    {
        session_name($name);
    }

    public function getHost()
    {
        return $this->host;
    }

    public function setUser($pass, $usu)
    {
        $_SESSION['user'] = $usu;
        $_SESSION['pass'] = $pass;
    }

    public function setError($error)
    {
        $_SESSION['error'] = $error;
    }

    public function setSuccess($success)
    {
        $_SESSION['success'] = $success;
    }

    public function setOther($other)
    {
        $_SESSION['other'] = $other;
    }

    public function setOther2($other2)
    {
        $_SESSION['other2'] = $other2;
    }

    public function getOther()
    {
        return $_SESSION['other'];
    }

    public function getOther2()
    {
        return $_SESSION['other2'];
    }

    public function getError()
    {
        return $_SESSION['error'];
    }

    public function getSuccess()
    {
        return $_SESSION['success'];
    }

    public function getUser()
    {
        return $_SESSION['user'];
    }

    public function getPassword()
    {
        return $_SESSION['pass'];
    }

    public function closeSession()
    {
        session_unset();
        session_destroy();
    }
}
