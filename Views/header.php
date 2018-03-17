<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head;
        any other head content must come *after* these tags -->
  <title>SGA | Painel Administrativo</title>    
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins.  -->
  <link rel="stylesheet" href="../dist/css/skins/skin-blue.min.css">
  
  <!--BOOTSTRAP de paginação-->
  <link href="../dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" href="../dist/css/estilo.css">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>SGA</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SGA</b></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Control Sidebar Toggle Button -->
          <li><a><?php echo dataatual()?></a></li>
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">        
          <h4 class="center"><?php echo ucwords($_SESSION['user_name']); ?></h4>   
      </div>

      <!-- search form (Optional) -->
     <!-- <form name="frmBusca" method="post" action="../controllers/busca.php" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="cxnome" id="cxnome" class="form-control" placeholder="Digite o nome">
              <span class="input-group-btn">
                  <button type="submit" name="buscar" id="search-btn" class="btn btn-flat">
                    <i class="fa fa-search"></i>
                  </button>
              </span>
            </div>
          </form> -->
      <!-- /.search form -->

      <!-- Sidebar Menu -->

      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">OPÇÕES</li>
        <!-- Optionally, you can add icons to the links -->
        <li><a href="professor.php"><i class="fa fa-link"></i> <span>Professores</span></a></li>
        <li><a href="aluno.php"><i class="fa fa-link"></i> <span>Alunos</span></a></li>
        <li><a href="modalidade.php"><i class="fa fa-link"></i> <span>Modalidades</span></a></li>
        <li><a href="plano.php"><i class="fa fa-link"></i> <span>Planos</span></a></li>
        <li><a href="pagamento.php"><i class="fa fa-link"></i> <span>Pagamento</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content container-fluid">