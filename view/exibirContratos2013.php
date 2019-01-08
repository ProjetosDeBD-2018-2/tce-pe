<?php
    require $_SERVER["DOCUMENT_ROOT"]."/tce-pe/control/contrato.php";
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Transparência PE</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/resume.min.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">
        <span class="d-block d-lg-none">Transparência</span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="../index.html">Início</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="exibirContrato.html">Contratos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="exibirTermoAditivo.php">Termos aditivos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="exibirUnidadeGestora.php">Unidades gestoras</a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="container-fluid p-0">
      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="contratos">
        <div class="my-auto">
          <h1 class="mb-0">TRANSPARÊNCIA
              <span class="text-primary">PE</span>
            </h1>
            
            <div class="subheading mb-5">UFRPE · DEINFO · BSI · Projeto de Banco de Dados 2018.2
            </div>
            <h2 class="mb-5">Todos os contratos do ano de 2013</h2>

          <table class="table table-hover">
              <thead>
                <tr>
                  <th>Nº</th>
                  <th>Ano</th>
                  <th>CPF/CNPJ</th>
                  <th>Vigência</th>
                  <th>Objeto</th>
                  <th>Valor</th>
                  <th>Estágio</th>
                  <th>Situação</th>
                </tr>
              </thead>
              <tbody>
              <?php
              $dados = exibeDadosPorAno(2013);
              if (!$dados) {
                  echo "<tr><td class='text-center' colspan='3'>Nenhum registro</td></tr>";
              } else {
                  foreach ($dados as $value) {
                      echo "<tr>
                              <td>".$value["numerocontrato"]."</td>
                              <td>".$value["anocontrato"]."</td>
                              <td>".$value["cpf_cnpj"]."</td>
                              <td>".$value["vigencia"]."</td>
                              <td>".$value["objeto"]."</td>
                              <td>R$".number_format($value["valorcontrato"],2,",",".")."</td>
                              <td>".$value["estagiocontrato"]."</td>
                              <td>".$value["situacaocontrato"]."</td>
                            </tr>";
                        }
                  }
              ?>
              </tbody>
            </table>

        </div>

      </section>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/resume.min.js"></script>

  </body>

</html>
