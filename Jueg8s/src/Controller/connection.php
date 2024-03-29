<?php

class Conection
{

    private $usu;
    private $pass;
    private $conn;

    function Conection()
    {
        $this->conn = null;
        $this->pass = 'jueg8sPass';
        $this->usu = 'jueg8s';
    }

    public function createConnection()
    {
        try {
            $this->conn = new PDO('mysql:host=localhost;dbname=jueg8s', $this->usu, $this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch (PDOException $exc) {
            echo 'Fail' . $exc;
            return null;
        }
    }

    public function getConexion()
    {
        if ($this->conn) {
            return $this->conn;
        } else {
            return $this->createConnection();
        }
    }

    public function closeConnection()
    {
        oci_close($this->conn);
    }

    public function getUsu()
    {
        return $this->usu;
    }

    public function getPass()
    {
        return $this->pass;
    }

    public function getConn()
    {
        return $this->conn;
    }

    public function setUsu($usu)
    {
        $this->usu = $usu;
    }

    public function setPass($pass)
    {
        $this->pass = $pass;
    }

    function setConn($conn)
    {
        $this->conn = $conn;
    }
}
