<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Padaria Grano d’Oro</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
  <style>
    :root{
      --accent:#C55A11; /* cor do pão queimado */
      --accent-2:#F3A86B;
      --muted:#6b6b6b;
      --bg:#fffaf6;
      --card:#ffffff;
      font-family: 'Inter', system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial;
    }
    *{box-sizing:border-box}
    body{margin:0;background:linear-gradient(180deg,var(--bg),#fff);color:#222;}
    header{background:linear-gradient(90deg, rgba(197,90,17,0.95), rgba(243,168,107,0.95));color:white;padding:18px 22px;position:sticky;top:0;z-index:1000}
    .container{max-width:1100px;margin:0 auto;padding:20px}
    .brand{display:flex;align-items:center;gap:14px}
    .logo{width:56px;height:56px;border-radius:12px;background:rgba(255,255,255,0.12);display:flex;align-items:center;justify-content:center;font-weight:700;font-size:22px}
    nav{margin-left:auto}
    .nav-list{display:flex;gap:18px;align-items:center}
    .nav-list a{color:white;text-decoration:none;font-weight:600}
    .hero{display:grid;grid-template-columns:1fr 420px;gap:28px;align-items:center;padding:40px 0}
    .hero h1{font-size:40px;margin:0 0 10px}
    .hero p{color:var(--muted);margin:0 0 18px}
    .cta{display:flex;gap:12px}
    .btn{padding:12px 18px;border-radius:10px;border:none;cursor:pointer;font-weight:600}
    .btn-primary{background:var(--card);color:var(--accent);}
    .btn-outline{background:transparent;color:white;border:1px solid rgba(255,255,255,0.18)}

    .card{background:var(--card);border-radius:14px;padding:18px;box-shadow:0 6px 18px rgba(0,0,0,0.06)}
    .product-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:18px;margin-top:18px}
    .product{display:flex;flex-direction:column;gap:10px}
    .product img{width:100%;height:160px;object-fit:cover;border-radius:10px}
    .product h4{margin:0}
    .meta{display:flex;justify-content:space-between;align-items:center;color:var(--muted);font-size:14px}

    .section{padding:40px 0}
    .section-title{display:flex;justify-content:space-between;align-items:center;margin-bottom:18px}

    footer{background:#fff;padding:28px 0;border-top:1px solid #eee}

    /* responsive */
    @media (max-width:980px){
      .hero{grid-template-columns:1fr;}
      .product-grid{grid-template-columns:repeat(2,1fr)}
      .nav-list{display:none}
    }
    @media (max-width:560px){
      .product-grid{grid-template-columns:1fr}
      .logo{width:46px;height:46px;font-size:18px}
      .hero h1{font-size:28px}
    }

    /* small utilities */
    .muted{color:var(--muted)}
    .badge{background:var(--accent-2);padding:6px 10px;border-radius:999px;font-weight:700}
    input,textarea{width:100%;padding:10px;border-radius:8px;border:1px solid #e6e6e6}
  </style>
</head>
<body>
  <header>
    <div class="container" style="display:flex;align-items:center">
      <div class="brand">
        <div class="logo">P&L</div>
        <div>
          <div style="font-weight:700">Padaria Grano d’Oro</div>
          <div style="font-size:12px;color:rgba(255,255,255,0.9)">Pães frescos todos os dias</div>
        </div>
      </div>

      <nav>
        <div class="nav-list">
          <a href="#produtos">Produtos</a>
          <a href="#sobre">Sobre</a>
          <a href="#contato">Contato</a>
          <a href="#horarios" class="badge">Aberto</a>
        </div>
      </nav>
    </div>
  </header>

  <main class="container">
    <section class="hero">
      <div>
        <h1>Pães artesanais, bolos e café — prontos para seu dia.</h1>
        <p>Na Padaria Grano D´Oro preparamos tudo com carinho: ingredientes frescos, receitas tradicionais e atendimento acolhedor. Conheça nossa loja!</p>
        <div class="cta">
          <button class="btn btn-primary">Ver menu</button>
          <button class="btn btn-outline">Encomendar</button>
        </div>

        <div style="margin-top:22px" class="card">
          <div style="display:flex;gap:12px;align-items:center">
            <div style="flex:1">
              <div style="font-weight:700">Promoção do dia</div>
              <div class="muted">Pão francês + café expresso por R$ 6,90</div>
            </div>
            <div style="text-align:right">
              <div style="font-weight:700">Entrega</div>
              <div class="muted">Em até 40 min</div>
            </div>
          </div>
        </div>
      </div>

      <div>
        <div class="card">
          <img src="variosPao.jpg" alt="pães" style="width:100%;height:260px;object-fit:cover;border-radius:10px;margin-bottom:12px">
          <div style="display:flex;justify-content:space-between;align-items:center">
            <div>
              <div style="font-weight:700">Pães da casa</div>
              <div class="muted">Crosta crocante e miolo macio</div>
            </div>
            <div style="font-weight:700;color:var(--accent)">R$ 8,50</div>
          </div>
        </div>
      </div>
    </section>

    <section id="produtos" class="section">
      <div class="section-title">
        <h2>Nosso cardápio</h2>
        <div class="muted">Os favoritos dos clientes</div>
      </div>

      <div class="product-grid">
        <article class="product card">
          <img src="croissant.avif" alt="croissant">
          <h4>Croissant amanteigado</h4>
          <div class="meta"><span class="muted">Pâtisserie</span><span><strong>R$ 6,00</strong></span></div>
        </article>

        <article class="product card">
          <img src="bolochu.jpg" alt="bolo">
          <h4>Bolos</h4>
          <div class="meta"><span class="muted">Fatia</span><span><strong>R$ 7,00</strong></span></div>
        </article>

        <article class="product card">
          <img src="paofrances.avif" alt="pão francês">
          <h4>Pão francês</h4>
          <div class="meta"><span class="muted">Unidade</span><span><strong>R$ 1,50</strong></span></div>
        </article>
      </div>
    </section>

    <section id="sobre" class="section">
      <div class="section-title">
        <h2>Sobre nós</h2>
        <div class="muted">Tradição e sabor</div>
      </div>
      <div class="card">
        <p>Somos uma padaria familiar com receitas passadas de geração em geração. Priorizamos ingredientes locais e preparos artesanais. Além do balcão, aceitamos encomendas para festas e eventos — fale conosco!</p>

        <div style="display:flex;gap:18px;margin-top:14px;flex-wrap:wrap">
          <div style="flex:1;min-width:200px">
            <strong>Endereço</strong>
            <div class="muted">Rua das Flores, 123 — Centro</div>
          </div>
          <div style="flex:1;min-width:200px">
            <strong>Telefone</strong>
            <div class="muted">(11) 98765-4321</div>
          </div>
          <div style="flex:1;min-width:200px">
            <strong>Horário</strong>
            <div class="muted" id="horarios">Seg — Sex: 06:00 — 20:00<br> Sáb: 06:30 — 17:00<br> Dom: 07:00 — 13:00</div>
          </div>
        </div>
      </div>
    </section>



  </main>

  <footer>
    <div class="container" style="display:flex;justify-content:space-between;align-items:center;gap:12px;flex-wrap:wrap">
      <div>
        <strong>Padaria Pão & Amor</strong>
        <div class="muted">© 2025 — Feito com carinho</div>
      </div>
      <div class="muted">Desenvolvido por sua equipe • Política de privacidade</div>
    </div>
  </footer>
</body>
</html>
