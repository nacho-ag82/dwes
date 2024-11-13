<?php 
class Usuario{
    private string $nombre;
    private string $email;
    private string $password;

    public function __construct(string $n,string $e,string $p){
        $this->nombre = $n;
        $this->email = $e;
        $this->password = password_hash($p,PASSWORD_DEFAULT);
    }
    public function __GET($k){
        return $this->$k;
    }

    public function setnewpass($p){
        $this->password = password_hash($p,PASSWORD_DEFAULT);
    }
}
?>