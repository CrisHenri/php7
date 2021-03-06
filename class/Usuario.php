<?php
   class Usuario {

    private $idUsuario;
    private $desLogin;
    private $desSenha;
    private $dtCadastro;




    //getters and setters
    public function getIdUsuario() {
      return $this->idUsuario;
    }
    public function setIdUsuario($idUsuario) {
      $this->idUsuario = $idUsuario;
    }

    public function getDesLogin() {
      return $this->desLogin;
    }
    public function setDesLogin($desLogin) {
      $this->desLogin = $desLogin;
    }

    public function getDesSenha() {
      return $this->desSenha;
    }
    public function setDesSenha($desSenha) {
      $this->desSenha = $desSenha;
    }

    public function getDtCadastro() {
      return $this->dtCadastro;
    }
    public function setDtCadastro($dtCadastro) {
      $this->dtCadastro = $dtCadastro;
    }

    public function loadById($id) {
      $sql = new Sql();

      $results = $sql->select("SELECT * FROM tb_usuarios WHERE idUsuario = :ID",array(":ID" => $id));

      if(count($results) > 0){

        $row = $results[0];

        $this->setIdUsuario($row['idUsuario']);
        $this->setDesLogin($row['desLogin']);
        $this->setDesSenha($row['desSenha']);
        $this->setDtCadastro(new DateTime($row['dtCadastro']));
      }
    }

    public static function getList(){
      $sql = new Sql();

      return $sql->select("SELECT * FROM tb_usuarios ORDER BY desLogin");
    }

    public static function search($login) {
      $sql = new Sql();

      return $sql->select("SELECT * FROM tb_usuarios WHERE desLogin LIKE :SEARCH ORDER BY desLogin ", array(
        ':SEARCH'=>"%".$login."%"
      ));
    }

    public function logar($login, $password){
        $sql = new Sql();

        $result = $sql->select("SELECT * FROM tb_usuarios WHERE desLogin = :LOGIN AND desSenha = :PASSWORD ", array(
          ':LOGIN' => $login,
          ':PASSWORD' => $password
        ));

        if(count($result) > 0){

            $row = $result[0];

            $this->setIdUsuario($row['idUsuario']);
            $this->setDesLogin($row['desLogin']);
            $this->setDesSenha($row['desSenha']);
            $this->setDtCadastro(new DateTime($row['dtCadastro']));
          }else {
            throw new Exception("Login ou senha inválidos!");
          }
    }

    public function __toString() {
      return json_encode(array(
        "idUsuario" => $this->getIdUsuario(),
        "desLogin" => $this->getDesLogin(),
        "desSenha" => $this->getDesSenha(),
        "dtCadastro" => $this->getDtCadastro()->format("d/m/Y H:i:s")
      ));
    }



   }
 ?>
