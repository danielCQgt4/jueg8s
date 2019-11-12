<?php
class Conection
{

    private $usu = 'jueg8s';
    private $pass = 'jueg8sPass';
    private $conn;

    function Conection()
    {
        $this->conn = null;
        $this->pass = "";
        $this->usu = "";
    }

    private function createConnection()
    {
        try {
            $this->conn = new PDO('mysql:host=localhost;dbname=dbname', 'username', 'password');
            $this->conn = new PDO("oci:dbname=localhost/orcl.us-central1-a.c.cycwebservice.internal", $this->usu, $this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //$this->conn = oci_connect($this->usu, $this->pass,'localhost/orcl');
            return $this->conn;
        } catch (PDOException $exc) {
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
