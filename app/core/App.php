<?php

class App
{
  protected $controller = "Home";
  protected $method = "Index";
  protected $params = [];
  public function __construct()
  {
    $url = $this->parseUrl();
    if (file_exists('../app/controllers/' . $url[0] . '.php')) {
      $this->controller = $url[0];
      unset($url[0]);
    }
    require_once '../app/controllers/' . $this->controller . ".php";
    $this->controller = new $this->controller;

    // method
    if (isset($url[1])) {
      if (method_exists($this->controller, $url[1])) {
        $this->method = $url[1];
        unset($url[1]);
      }
    }
    if (!empty($url)) {
      $this->params = array_values($url);
    }
    // jalankan controller dan method,serta kirimkan params jika ada
    // call_user_func_array() ini  untuk menjalankan controller dan method serta mengirimkan parameter
    call_user_func_array([$this->controller, $this->method], $this->params);
  }

  public function parseUrl()
  {
    if (isset($_GET['url'])) {
      // rtrim digunakan untuk menghapus tanda slash di url
      $url = rtrim($_GET['url'], '/');
      // digunakan untuk membersihkan url dari karakter karakter aneh
      $url = filter_var($url, FILTER_SANITIZE_URL);
      // url nya kita pecah
      $url = explode('/', $url);
      return $url;
    }
  }
}
