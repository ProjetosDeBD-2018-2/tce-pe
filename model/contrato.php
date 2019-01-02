<?php
    require $_SERVER["DOCUMENT_ROOT"]."/tce-pe/structure/auxiliar.php";

    function cadastrar($cpf, $nome) {
        $conexao = conectar();
        $sql = "INSERT INTO jogador values ('$cpf', '$nome')";
        $execucao = mysqli_query($conexao, $sql) or false;
        desconectar($conexao);

        return $execucao;
    }

    function exibir($sql) {
        $conexao = conectar();
        $resultado = mysqli_query($conexao, $sql);
        desconectar($conexao);

        $arr = array(
            'dados' => $resultado,
            'total' => mysqli_num_rows($resultado)
        );

        return $arr;
    };

    function lerEspecifico($cpf) {
        $conexao = conectar();
        $sql = "SELECT * FROM jogador WHERE cpf='$cpf'";
        $resultado = mysqli_query($conexao, $sql);
        desconectar($conexao);

        $array = [];

        while($elemento = mysqli_fetch_array($resultado)) {
            $array = $elemento;
        }

        return $array;
    }

    function atualizar($cpf, $nome) {
        $conexao = conectar();
        $sql = "UPDATE jogador SET nome='$nome' WHERE cpf='$cpf'";
        $execucao = mysqli_query($conexao, $sql) or false;
        desconectar($conexao);

        return $execucao;
    }

    function excluir($cpf) {
        $conexao = conectar();
        $sql = "DELETE FROM jogador WHERE cpf='$cpf'";
        $execucao = mysqli_query($conexao, $sql) or false;
        desconectar($conexao);

        return $execucao;
    };
