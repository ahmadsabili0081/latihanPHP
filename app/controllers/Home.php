<?php
class Home extends Controller
{
  public function index()
  {
    $data['title'] = "Halaman Home";

    // kita mengambil nama dari model dan menjalankan methodnya
    $data['nama'] = $this->model('User_Model')->getUser();
    $this->view('templates/header', $data);
    $this->view('home/index', $data);
    $this->view('templates/footer');
  }
}
