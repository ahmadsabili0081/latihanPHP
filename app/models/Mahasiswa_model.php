<?php

class Mahasiswa_Model
{
  private $table = 'mahasiswa';
  private $db;

  public function __construct()
  {
    $this->db = new Database();
  }

  public function getAllMahasiswa()
  {
    $this->db->query('SELECT * FROM' . ' ' . $this->table);
    return $this->db->resultSet();
  }
  public function getMahasiswaById($id)
  {
    // tujuan untuk tidak langsung menaruh id karna agar menghindari sql injection
    $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_mahasiswa=:id');
    $this->db->bind('id', $id);
    return $this->db->single();
  }
  public function tambahMahasiswa($data)
  {
    $query = "INSERT INTO mahasiswa (nama,nim,email,jurusan) VALUES (:nama,:nim,:email,:jurusan)";
    $this->db->query($query);
    $this->db->bind('nama', $data['nama']);
    $this->db->bind('nim', $data['nim']);
    $this->db->bind('email', $data['email']);
    $this->db->bind('jurusan', $data['jurusan']);

    $this->db->execute();

    return $this->db->rowCount();
  }
  public function hapusDataMahasiswa($id)
  {
    $query = "DELETE FROM mahasiswa WHERE id_mahasiswa=:id";
    $this->db->query($query);
    $this->db->bind('id', $id);
    $this->db->execute();

    return $this->db->rowCount();
  }
  public function ubahData($data)
  {
    $query = "UPDATE mahasiswa SET 
      nama = :nama,
      nim = :nim,
      email = :email,
      jurusan = :jurusan 
      WHERE id_mahasiswa=:id_mahasiswa
    ";
    $this->db->query($query);
    $this->db->bind('nama', $data['nama']);
    $this->db->bind('nim', $data['nim']);
    $this->db->bind('email', $data['email']);
    $this->db->bind('jurusan', $data['jurusan']);
    $this->db->bind('id_mahasiswa', $data['id_mahasiswa']);
    $this->db->execute();

    return $this->db->rowCount();
  }
  public function cariDataMahasiswa()
  {
    $cari = $_POST['search'];
    $query = "SELECT *FROM mahasiswa WHERE nama LIKE :cari";
    $this->db->query($query);
    $this->db->bind('cari', "%$cari%");
    $this->db->execute();
    return $this->db->resultSet();
  }
}
