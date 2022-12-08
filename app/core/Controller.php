<?php

class Controller
{
  public function view($view, $data = [])
  {
    require_once('../app/views/' . $view . ".php");
  }
  public function model($model)
  {
    require_once('../app/models/' . $model . ".php");
    return new User_Model();
  }
  public function modelMahasiswa($model)
  {
    require_once('../app/models/' . $model . ".php");
    return new Mahasiswa_Model();
  }
}
