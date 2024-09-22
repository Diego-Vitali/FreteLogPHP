<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contate-nos</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="adminlte/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="adminlte/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="css/ind.css">
</head>

<body class="layout-top-nav control-sidebar-slide-open layout-navbar-fixed" style="height: auto;">
<div class="wrapper">

<?php include 'includes\component\navbarindex.php' ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Contate-nos!</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card cardRosa">
        <div class="card-body row">
          <div class="col-5 text-center d-flex align-items-center justify-content-center">
            <div class="">
              <h2>FreteLog</h2>
              <p class="lead mb-5 textoPreto">Ibitirama, 1809 - Vila Prudente, São Paulo - SP<br>
                Fone: (11) 94077-9440
              </p>
            </div>
          </div>
          <div class="col-7">
            <div class="form-group">
              <label for="inputName">Nome:</label>
              <input type="text" id="inputName" class="form-control" />
            </div>
            <div class="form-group">
              <label for="inputEmail">E-Mail</label>
              <input type="email" id="inputEmail" class="form-control" />
            </div>
            <div class="form-group">
              <label for="inputSubject">Assunto</label>
              <input type="text" id="inputSubject" class="form-control" />
            </div>
            <div class="form-group">
              <label for="inputMessage">Mensagem</label>
              <textarea id="inputMessage" class="form-control" rows="4"></textarea>
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-primary" value="Enviar Mensagem">
            </div>
          </div>
        </div>
      </div>

    </section>
    <!-- /.content -->
  </div>