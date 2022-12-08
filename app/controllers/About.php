<?php
class About extends Controller
{
  public function index($nama = "ahmad sabili alghifari", $pekerjaan = "programmer")
  {
    $data['nama'] = $nama;
    $data['pekerjaan'] = $pekerjaan;
    $data['title'] = 'Halaman About';
    $this->view('templates/header', $data);
    $this->view('about/index', $data);
    $this->view('templates/footer');
  }
  public function page()
  {
    $data['title'] = 'Halaman Page';
    $this->view('templates/header', $data);
    $this->view('about/page');
    $this->view('templates/footer');
  }
}
