<?php

// Inicia sessões
session_start();
// Verifica se existe os dados da sessão de login
if(!isset($_SESSION["siape"]) || !isset($_SESSION["senha"]))
{
    echo "<script> alert('Usuário Não Logado! Login Obrigatório.'); location.href='index.html'; </script>";

}
?>
