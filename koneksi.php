<?php
class koneksi {
    private $host = "localhost";
    private $user = "tifbmyho_angkasa";
    private $pass = "@JTIpolije2023";
    private $db = "tifbmyho_angkasa";
    protected $koneksi;

    public function __construct() {
        try {
            $this->koneksi = new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->pass);
            $this->koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getKoneksi() {
        return $this->koneksi;
    }
}
?>