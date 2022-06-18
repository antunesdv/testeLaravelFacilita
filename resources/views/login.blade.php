<!DOCTYPE html>
<html lang="PT-BR">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Teste Laravel</title>    
  <meta name="author" content="Henrique Antunes">
  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link rel="stylesheet" href="{{URL::asset('assets/vendor/aos/aos.css')}}">
  <link rel="stylesheet" href="{{URL::asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{URL::asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}">
  <link rel="stylesheet" href="{{URL::asset('assets/vendor/boxicons/css/boxicons.min.css')}}">
  <link rel="stylesheet" href="{{URL::asset('assets/vendor/glightbox/css/glightbox.min.css')}}">
  <link rel="stylesheet" href="{{URL::asset('assets/vendor/swiper/swiper-bundle.min.css')}}">
  <link rel="stylesheet" href="{{URL::asset('assets/css/style.css')}}">
</head>

<body>

<!-- ======= Top Bar ======= -->
<section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
            <i class="bi bi-envelope d-flex align-items-center"><a>hhammes00@gmail.com</a></i>
            <i class="bi bi-phone d-flex align-items-center ms-4"><span>(51) 983550052</span></i>
        </div>
        <div class="social-links d-none d-md-flex align-items-center">                        
            <a href="https://www.linkedin.com/in/henrique-antunes-8b5652134/" class="linkedin"><i class="bi bi-linkedin"></i></a>                        
        </div>
    </div>
</section>

<!-- ======= Header ======= -->
<header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">      
      <img class="nav-link px-lg-4" src="assets/img/logo.jpg" alt="logo zilto tonrearia" width="120px">
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt=""></a>-->
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="#hero">Inicio</a></li>
          <li><a class="nav-link scrollto active" href="/login">Login Administrativo</a></li>          
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
</header><!-- End Header -->
<style>
    .divider:after, .divider:before {
        content: "";
        flex: 1;
        height: 1px;
        background: #eee;
    }
    .h-custom {
        height: calc(100% - 73px);
    }
    @media (max-width: 450px) {
        .h-custom {
            height: 100%;
        }
    }
</style>
<main id="main">
    <section class="">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                    class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form method="post" action="/verifyLogin">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />                        
                        <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                            <p class="lead fw-normal mb-0 me-3">Login Administrativo</p>                            
                        </div>
                        <div class="divider d-flex align-items-center my-4"></div>
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input name="user" type="text" class="form-control form-control-lg" placeholder="Login" />
                            <label class="form-label">Usuário de Acesso</label>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <input name="password" type="password" class="form-control form-control-lg" placeholder="Senha" />
                            <label class="form-label">Senha</label>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">                                                        
                            <a class="text-body">Esqueceu a senha? Entre em contato com o Administrador.</a>
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Entrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
  </main>
</body>
</html>