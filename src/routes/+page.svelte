
<body>
  <div class="container">
      <!-- Logo du Club avec effet explosion -->
      <img src="/images/logo.png" alt="Logo du Club de Football" class="logo">
      
      <!-- Phrase d'accueil percutante -->
      <p class="welcome-text">Vivez chaque instant comme un champion !</p>
      
      <!-- Lien pour entrer sur le site -->
      <a data-sveltekit-reload href="/Accueil" class="enter-link">Entrer sur le site</a>
  </div>
</body>
<style>
  /* Styles Globaux */
  body {
      background: linear-gradient(135deg, #ffffff, #ffffff);
      height: 100vh;
      overflow: hidden;
      margin: 0;
      font-family: 'Inconsolata', monospace;
      display: flex;
      justify-content: center;
      align-items: center;
      position: relative;
      flex-direction: column;
  }


  @keyframes moveBall {
      0% {
          transform: translate(0, 0) rotate(0deg);
          opacity: 0.7;
      }
      50% {
          transform: translate(200px, -200px) rotate(180deg);
          opacity: 0.3;
      }
      100% {
          transform: translate(-200px, 200px) rotate(360deg);
          opacity: 0.7;
      }
  }

  /* Container pour centrer */
  .container {
      text-align: center;
      z-index: 2;
  }

  /* Logo du Club */
  .logo {
      width: 300px;
      height: 300px;
      margin-bottom: 20px;
      animation: explodeIn 2s cubic-bezier(0.68, -0.55, 0.27, 1.55) forwards;
      transition: transform 1s cubic-bezier(0.25, 1, 0.5, 1);
  }

  /* Effet explosion du logo */
  @keyframes explodeIn {
      0% {
          transform: scale(0);
          opacity: 0;
      }
      60% {
          transform: scale(1.3);
          opacity: 1;
      }
      100% {
          transform: scale(1);
      }
  }

  /* Phrase d'accueil percutante */
  .welcome-text {
      font-size: 38px;
      color: #000000;
      font-weight: bold;
      letter-spacing: 3px;
      text-transform: uppercase;
      text-shadow: 3px 3px 10px rgba(170, 227, 248, 0.3);
      margin-top: 20px;
      opacity: 0;
      animation: textPopUp 2s ease-in-out 2s forwards; /* Apparaît après le logo */
  }

  @keyframes textPopUp {
      0% {
          transform: translateY(50px);
          opacity: 0;
      }
      100% {
          transform: translateY(0);
          opacity: 1;
      }
  }

  /* Lien pour entrer sur le site */
  .enter-link {
      text-decoration: none;
      background: linear-gradient(135deg, #685e5b, #a8ebff);
      color: white;
      padding: 15px 50px;
      font-size: 24px;
      font-weight: bold;
      border-radius: 40px;
      display: inline-block;
      margin-top: 30px;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      box-shadow: 0 15px 30px rgba(193, 232, 247, 0.7);
      opacity: 0;
      animation: buttonAppear 2s ease-in-out 4s forwards; /* Apparaît après le texte */
  }

  @keyframes buttonAppear {
      0% {
          transform: translateY(50px);
          opacity: 0;
      }
      100% {
          transform: translateY(0);
          opacity: 1;
      }
  }

  .enter-link:hover {
      transform: scale(1.15) translateY(-10px);
      box-shadow: 0 20px 50px rgba(58, 56, 52, 0.9);
  }
</style>


