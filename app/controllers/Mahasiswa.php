<?php
class Mahasiswa extends Controller
{
  public function index()
  {
    $data['title'] = "Halaman Mahasiswa";
    $data['mhs'] = $this->modelMahasiswa('Mahasiswa_model')->getAllMahasiswa();
    $this->view('templates/header', $data);
    $this->view('mahasiswa/index', $data);
    $this->view('templates/footer');
  }
  public function detail($id)
  {
    $data['title'] = "Detail Mahasiswa";
    $data['mhs'] = $this->modelMahasiswa('Mahasiswa_model')->getMahasiswaById($id);
    $this->view('templates/header', $data);
    $this->view('mahasiswa/detail', $data);
    $this->view('templates/footer');
  }
  public function tambah()
  {
    if ($this->modelMahasiswa('Mahasiswa_model')->tambahMahasiswa($_POST)  > 0) {
      Flasher::setFlash('Berhasil', 'Ditambahkan', 'success');
      header('Location:' . BASE_URL . "mahasiswa");
      exit;
    } else {
      Flasher::setFlash('Gagal', 'Ditambahkan', 'danger');
      header('Location:' . BASE_URL . "mahasiswa");
      exit;
    }
  }
  public function hapus($id)
  {
    if ($this->modelMahasiswa('Mahasiswa_model')->hapusDataMahasiswa($id)  > 0) {
      Flasher::setFlash('Berhasil', 'Dihapus', 'success');
      header('Location:' . BASE_URL . "mahasiswa");
      exit;
    } else {
      Flasher::setFlash('Gagal', 'Dihapus', 'danger');
      header('Location:' . BASE_URL . "mahasiswa");
      exit;
    }
  }
  public function ubah($id)
  {
    $data['title'] = "Ubah Data Mahasiswa";
    $data['mhs'] = $this->modelMahasiswa('Mahasiswa_model')->getMahasiswaById($id);
    $this->view('templates/header', $data);
    $this->view('mahasiswa/ubah', $data);
    $this->view('templates/footer');
  }
  public function ubahData()
  {
    if ($this->modelMahasiswa('Mahasiswa_model')->ubahData($_POST)  > 0) {
      Flasher::setFlash('Berhasil', 'Diubah', 'success');
      header('Location:' . BASE_URL . "mahasiswa");
      exit;
    } else {
      Flasher::setFlash('Gagal', 'Diubah', 'danger');
      header('Location:' . BASE_URL . "mahasiswa");
      exit;
    }
  }
  public function cariMahasiswa()
  {
    $data['title'] = "Halaman Mahasiswa";
    $data['mhs'] = $this->modelMahasiswa('Mahasiswa_model')->cariDataMahasiswa();
    $this->view('templates/header', $data);
    $this->view('mahasiswa/index', $data);
    $this->view('templates/footer');
  }
}
