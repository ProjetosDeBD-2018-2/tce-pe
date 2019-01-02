<?php
    require $_SERVER["DOCUMENT_ROOT"]."/tce-pe/model/contrato.php";

    if(isset($_POST["acao"])) {
        if ($_POST["acao"]=="excluir"){
            $dados = array(
                "cpf" => $_POST["cpf"]
            );
            exclusao($dados);
        } else {
            $dados = array(
                "cpf" => desmascarar($_POST["cpf"], 'cpf'),
                "nome" => $_POST["nome"]
            );

            if ($_POST["acao"]=="cadastrar"){
                cadastro($dados);
            }

            if ($_POST["acao"]=="atualizar"){
                atualizacao($dados);
            }
        }
    }

    function exibeDados(){
        $sql = "SELECT * FROM contrato";

        $resultado = exibir($sql);

        if ($resultado['total'] > 0) {
            return $resultado['dados'];
        } else {
            return false;
        }
    }

    function exibeDadosPorAno($ano){
        $sql = "SELECT * FROM contrato WHERE anocontrato='$ano'";

        $resultado = exibir($sql);

        if ($resultado['total'] > 0) {
            return $resultado['dados'];
        } else {
            return false;
        }
    }

    function exibeDadosMaiores(){
        $sql = "SELECT * FROM contrato ORDER BY valorcontrato DESC LIMIT 10";

        $resultado = exibir($sql);

        if ($resultado['total'] > 0) {
            return $resultado['dados'];
        } else {
            return false;
        }
    }

    function verificacao($cpf) {
        $resultado = lerEspecifico($cpf);

        if ($resultado) {
            return $resultado;
        } else {
            return false;
        }

    }

    function cadastro($valor) {
        $permissao = cadastrar($valor["cpf"],$valor["nome"]);

        if($permissao){
            $_SESSION["alertaTipo"] = "success";
            $_SESSION["alertaMensagem"] = "<b>Sucesso ao cadastrar jogador!</b>";
        } else {
            $_SESSION["alertaTipo"] = "danger";
            $_SESSION["alertaMensagem"] = "<b>Erro ao cadastrar jogador!</b>";
        }
        header("Location: ../view/exibirContrato.php");
    }

    function atualizacao($valor) {
        $permissao = atualizar($valor["cpf"],$valor["nome"]);

        if($permissao){
            $_SESSION["alertaTipo"] = "success";
            $_SESSION["alertaMensagem"] = "<b>Sucesso ao atualizar jogador!</b>";
        } else {
            $_SESSION["alertaTipo"] = "danger";
            $_SESSION["alertaMensagem"] = "<b>Erro ao atualizar jogador!</b>";
        }
        header("Location: ../view/exibirContrato.php");
    }

    function exclusao($valor) {
        $permissao = excluir($valor["cpf"]);

        if($permissao){
            $_SESSION["alertaTipo"] = "success";
            $_SESSION["alertaMensagem"] = "<b>Sucesso ao excluir jogador!</b>";
        } else {
            $_SESSION["alertaTipo"] = "danger";
            $_SESSION["alertaMensagem"] = "<b>Erro ao excluir jogador!</b>";
        }
        header("Location: ../view/exibirContrato.php");
    }
?>
