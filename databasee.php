<?php
class Database{
    private $host = "localhost";
    private $uname = "root";
    private $pass = "";
    private $db = "malasngoding";
    private $conn;

    function __construct(){
        $this->conn = new mysqli($this->host, $this->uname, $this->pass, $this->db);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    function tampil_data(){
        $hasil = array();
        $query = "SELECT * FROM user";
        $result = $this->conn->query($query);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $hasil[] = $row;
            }
        }
        return $hasil;
    }

    function input($nama, $alamat, $usia){
        $query = "INSERT INTO user (nama, alamat, usia) VALUES ('$nama', '$alamat', '$usia')";
        if ($this->conn->query($query) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    function hapus($id){
        $query = "DELETE FROM user WHERE id='$id'";
        if ($this->conn->query($query) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    function edit($id){
        $hasil = array();
        $query = "SELECT * FROM user WHERE id='$id'";
        $result = $this->conn->query($query);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $hasil[] = $row;
            }
        }
        return $hasil;
    }

    function update($id, $nama, $alamat, $usia){
        $query = "UPDATE user SET nama='$nama', alamat='$alamat', usia='$usia' WHERE id='$id'";
        if ($this->conn->query($query) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
}
?>