<?php

class m_koneksi {

    private $host = "localhost",
            $username = "root",
            $pass = "",
            $db = "apotek_kece"; 

    public $koneksi;

    function __construct() {
        $this->koneksi = mysqli_connect($this->host, $this->username, $this->pass, $this->db);

        if ($this->koneksi) {
            // koneksi berhasil, tidak perlu echo apapun
            return $this->koneksi;
        } else {
            die("Koneksi ke database gagal: " . mysqli_connect_error());
        }
    }
}

$koneksi = new m_koneksi();
