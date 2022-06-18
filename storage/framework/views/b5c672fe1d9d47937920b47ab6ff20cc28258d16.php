<?php
session_start();
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
    <div class="main-content position-relative max-height-vh-100 h-100 ps ps--active-y">
      <div class="card shadow-lg mx-4 card-profile-bottom">
        <div class="card-body p-3">
          <div class="row gx-4">
            <div class="col-auto">
              <div class="avatar avatar-xl position-relative">
                <img src="../assets/img/team-1.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
              </div>
            </div>
            <div class="col-auto my-auto">
              <div class="h-100">
              <h5 class="mb-1"> Cadastro de Livros </h5>
              <p class="mb-0 font-weight-bold text-sm"> Livros </p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
            <div class="nav-wrapper position-relative end-0">
              <ul class="nav nav-pills nav-fill p-1" role="tablist">
                <li class="nav-item">
                  <a class="nav-link mb-0 px-0 py-1 active d-flex align-items-center justify-content-center " data-bs-toggle="tab" href="#" role="tab" aria-selected="true">
                    <i class="ni ni-app"></i>
                    <span class="ms-2">Botão Auxiliar</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center " data-bs-toggle="tab" href="#" role="tab" aria-selected="false">
                    <i class="ni ni-email-83"></i>
                    <span class="ms-2">Botão Auxiliar</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center " data-bs-toggle="tab" href="#" role="tab" aria-selected="false">
                    <i class="ni ni-settings-gear-65"></i>
                    <span class="ms-2">Deslogar</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>        
    <form action="/LivrosCadastro" method="post" >
      <div class="container-fluid py-4">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
            <div class="card-body">
            <p class="text-uppercase text-sm">Informações Necessárias</p>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Nome da Obra</label>
                  <input class="form-control" type="text" name="nome" value=""required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Autor</label>
                  <input class="form-control" type="text" name="autor" value=""required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Status</label>
                  <input class="form-control" type="text" name="status" value=""required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Número do Registro</label>
                  <input class="form-control" type="text" name="registro" value=""required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Gênero</label>
                  <input class="form-control" type="text" name="genero" value=""required>
                </div>
              </div>
              <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />                        
          </div>        
          <button type="submit" class="btn btn-primary btn-sm ms-auto">Cadastrar Livro</button>
        </div>
      </div>            
    </form>  
  </div>
</body>
</html><?php /**PATH C:\xampp\htdocs\testeAppFacilita\resources\views/cadastroLivros.blade.php ENDPATH**/ ?>