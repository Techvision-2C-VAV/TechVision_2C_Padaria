<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Padaria Grano d’Oro</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link rel="stylesheet" href="src/styles/header.css">
  <link rel="stylesheet" href="src/styles/styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <header>
    <nav id="navbar">
      <i class="fa-solid fa-bread-slice" id="nav_logo" >grano</i>

      <ul id="nav_list">
        <li class="nav-item active">
            <a href="#home ">Início</a>
        </li>
        <li class="nav-item">
            <a href="#menu ">Cardápio</a>
        </li>
        <li class="nav-item">
            <a href="#testimonials ">Avaliações</a>
        </li>
      </ul>
    <button class="btn-default">
     Conheça-nos
    </button>

    <button id="mobile_btn">
      <i class="fa-solid fa-bars" > </i>
    </button>

    </nav>
   
    <div id="mobile_menu">
      <ul id="mobile_nav_list">
        <li class="nav-item">
            <a href="#home ">Início</a>
        </li>
        <li class="nav-item">
            <a href="#menu ">Cardápio</a>
        </li>
        <li class="nav-item">
            <a href="#testimonials ">Avaliações</a>
        </li>
      </ul>
      <button class="btn-default">
     Conheça-nos
    </button>
    </div>

  </header>

  <main id="content">
    <sction id="home">
      <div id="cta">

        <h1 id="title">
          O sabor vai até 
          <span>você</span>
        </h1>

        <p id="description">aaaaaaaaa aaaa aaaaaaaaaaa aaaaaaaa aaaaa aaa
          aaaaaaaa aaaaaaaaaaaa aaa aaaaa aaaaa
        </p>

        <div id="cta_buttons">
         <a href="#" class="btn-default"> Ver Cardápio</a> 

         <a href="tel: +1123456789" id="phone_button">
          <button class="btn-default" > 
            <i class="fa-solid fa-phone">
              (11) 12345-6789
            </i>
          </button>
         </a>
        </div>
      </div>

    <div id="banner">

    </div>
    </sction>
  </main>
  
  <script src="src/javascript/script.js"></script>
</body>
</html>
