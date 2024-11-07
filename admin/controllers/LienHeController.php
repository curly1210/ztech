<?php


class LienHeController
{
  public $modelLienHe;

  public function __construct()
  {
    $this->modelLienHe = new LienHe();
  }

  public function index()
  {
    $search = $_POST["ho_ten"] ??  '';

    $lienHes = $this->modelLienHe->getAll($search);
    // var_dump($lienHes);
    require_once('./views/lienhe/list_lien_he.php');
  }

  public function destroy()
  {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      $id = $_POST['id_lien_he'];
      $this->modelLienHe->deleteData($id);
      header('Location: ?act=lien-hes');
      exit();
    }
  }
}
