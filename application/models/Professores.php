<?php
class Professores extends Welcome{
    function obterUsuario ($email, $senha){
    $query = $this->db->get_where('professores', ['email' => $email, 'senha' => $senha]);

    return $query->row();

    }  
}

?>