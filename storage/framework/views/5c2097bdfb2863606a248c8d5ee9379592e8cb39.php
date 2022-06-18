<?php
session_start();
$data = session('user');
if((!isset($data))){  
  header("Location: /dashboard");  
}
?>
<!DOCTYPE html>
<html lang="PT-BR">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Teste Laravel</title>    
  <meta name="author" content="Henrique Antunes">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" />  
  <link id="pagestyle" href=".././assets/css/argon-dashboard.css" rel="stylesheet" />
</head>
<body class="g-sidenav-show bg-gray-100">
    <?php if(Session::has('error')): ?>
    <div id="ofBar">
        <div id="ofBar-logo">
            <i class="ni ni-notification-70"></i>
        </div>
        <div id="ofBar-content"> <?php echo e(Session::get('error')); ?></div>
        <div id="ofBar-right">    
            <a id="close-bar">x</a>
        </div>
    </div>
    <?php endif; ?>
    <?php if(Session::has('success')): ?>
    <div id="ofBar">
        <div id="ofBar-logo">
            <i class="ni ni-notification-70"></i>
        </div>
        <div id="ofBar-content"> <?php echo e(Session::get('success')); ?></div>
        <div id="ofBar-right">    
            <a id="close-bar">x</a>
        </div>
    </div>
    <?php endif; ?>
    <script src="../assets/js/argon-dashboard.min.js?v=2.0.2"></script>
  <style>
    #ofBar {
      background: #fff;
      z-index: 999999999;
      font-size: 16px;
      color: #333;
      padding: 16px 40px;
      font-weight: 400;
      display: flex;
      justify-content: space-between;
      align-items: center;
      position: fixed;
      top: 40px;
      width: 30%;
      border-radius: 8px;
      left: 0;
      right: 0;
      margin-left: auto;
      margin-right: auto;
      box-shadow: 0 13px 27px -5px rgba(50,50,93,0.25), 0 8px 16px -8px rgba(0,0,0,0.3), 0 -6px 16px -6px rgba(0,0,0,0.025);
    }

    #ofBar-logo img {
      height: 50px;
    }

    #ofBar-content {
      display: inline;
      padding: 0 15px;
    }

    #ofBar-right {
      display: flex;
      align-items: center;
    }

    #ofBar b {
      font-size: 15px !important;
    }
    
    #count-down {
      display: initial;
      padding-left: 10px;
      font-weight: bold;
      font-size: 20px;
    }
    #close-bar {
      font-size: 17px;
      opacity: 0.5;
      cursor: pointer;
    }
    #close-bar:hover{
      opacity: 1;
    }
    #btn-bar {
      background-image: linear-gradient(310deg, #141727 0%, #3A416F 100%);
      color: #fff;
      border-radius: 4px;
      padding: 10px 20px;
      font-weight: bold;
      text-transform: uppercase;
      text-align: center;
      font-size: 12px;
      opacity: .95;
      margin-right: 20px;
      box-shadow: 0 5px 10px -3px rgba(0,0,0,.23), 0 6px 10px -5px rgba(0,0,0,.25);
    }
    #btn-bar, #btn-bar:hover, #btn-bar:focus, #btn-bar:active {
      text-decoration: none !important;
      color: #fff !important;
    }
    #btn-bar:hover{
      opacity: 1;
    }

    #btn-bar span, #ofBar-content span {
      color: red;
      font-weight: 700;
    }

    #oldPriceBar {
      text-decoration: line-through;
      font-size: 16px;
      color: #fff;
      font-weight: 400;
      top: 2px;
      position: relative;
    }
    #newPrice{
      color: #fff;
      font-size: 19px;
      font-weight: 700;
      top: 2px;
      position: relative;
      margin-left: 7px;
    }

    #fromText {
      font-size: 15px;
      color: #fff;
      font-weight: 400;
      margin-right: 3px;
      top: 0px;
      position: relative;
    }

    @media(max-width: 991px){

    }
    @media (max-width: 768px) {
      #count-down {
        display: block;
        margin-top: 15px;
      }

      #ofBar {
        flex-direction: column;
        align-items: normal;
      }

      #ofBar-content {
        margin: 15px 0;
        text-align: center;
        font-size: 18px;
      }

      #ofBar-right {
        justify-content: flex-end;
      }
    }
  </style>
    <div class="min-height-300 bg-primary position-absolute w-100"></div>
    <!-- aside -->        
    <?php echo $__env->make('aside', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- End aside -->
    <main class="main-content position-relative border-radius-lg ps">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Abas</a></li>                
                <li class="breadcrumb-item text-sm text-white active" aria-current="page">Livros</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">Consulta de Livros</h6>
            </nav>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                
            </div>
            <ul class="navbar-nav  justify-content-end">
                <li class="nav-item d-flex align-items-center">
                <a href="javascript:;" class="nav-link text-white font-weight-bold px-0">
                    <i class="fa fa-user me-sm-1"></i>
                    <span class="d-sm-inline d-none">Deslogar</span>
                </a>
                </li>
                <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                    <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line bg-white"></i>
                    <i class="sidenav-toggler-line bg-white"></i>
                    <i class="sidenav-toggler-line bg-white"></i>
                    </div>
                </a>
                </li>
            </ul>
            </div>
        </div>
        </nav>
        <!-- End Navbar -->

        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Filtrar Livro para Alocar</h6>                            
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">            
                                    <div class="card-body">            
                                        <form action="filtrarLivros" method="post">
                                            <div class="row">                                            
                                                <div class="col-md-6">                                                                                                    
                                                    <input class="form-control" name="txtfiltro" type="text" value="" placeholder="Digite algo que queira buscar" onfocus="focused(this)" onfocusout="defocused(this)" required>
                                                </div>  
                                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />        
                                                <div class="col-md-6">                                                                                                    
                                                    <button type="submit" class="btn btn-primary w-100">Buscar Livro</button>
                                                </div>                                                                                                                               
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                    
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-4">
                            <div class="card-header pb-0">
                                <h6>Livros</h6>
                            </div>
                            <div class="card-body px-0 pt-0 pb-2">
                                <div class="table-responsive p-0">
                                    <table class="table align-items-center justify-content-center mb-0 text-center">
                                        <thead>
                                            <tr>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nome</th>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Autor</th>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Gênero</th>                                                
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Alocar Livro</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                                                                
                                            <tr>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0"><?php echo e($result->nome); ?></p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0"><?php echo e($result->autor); ?></p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0"><?php echo e($result->status); ?></p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0"><?php echo e($result->genero); ?></p>
                                                </td>                         
                                                <?php if($result->status == "Disponível"): ?>
                                                <td style="padding-top:25px !important">
                                                    <a  href="/alocarLivro/<?php echo e($id); ?>/<?php echo e($result->id); ?>" class="btn btn-sm btn-outline-primary">Alocar Livro</a>                                                    
                                                </td>
                                                <?php else: ?>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">Livro Emprestado</p>
                                                </td> 
                                                <?php endif; ?>                       
                                                
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </main>    
</body>
</html><?php /**PATH C:\xampp\htdocs\testeAppFacilita\resources\views/alocarLivros.blade.php ENDPATH**/ ?>