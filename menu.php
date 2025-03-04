<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <link rel="icon" href="assets/logomenu.png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menu - Osteria Del Pirgo</title>
  <link rel="stylesheet" href="css/normalize.min.css">
  <link rel="stylesheet" href="css/aos.css">
  <link rel="stylesheet" href="./style.css">
  <style>
    @import url("css/pt-sans.css");

    body {
      font-family: "PT Sans", sans-serif !important;
      text-align: center;
      background-color: #f8f8f8;
    }

    .language-selector {
  text-align: center;
  margin: 10px 0;
}

.language-selector img {
  width: 30px;
  height: 20px;
  cursor: pointer;
  margin: 0 5px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

    .menu {
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 20px;
    }
    .menu h1 {
      font-size: 2.5em;
      margin-bottom: 10px;
      text-shadow: 1px 1px 1px #000000;
      font-family: "PT Sans", sans-serif !important;
    }
    .categories {
      display: flex;
      gap: 20px;
      margin: 20px 0;
    }
    .custom-font{
      font-family: "Alex Brush", cursive;
      color: #000000;
      font-size: 75px;
      line-height: 0;
    }
    .categories button {
      padding: 10px 15px;
      border: none;
      background-color: #ffffff;
      color: black;
      cursor: pointer;
      border-radius: 5px;
      font-size: 1.5em;
    }
    .categories button:hover {
      background-color: #d2d2d2;
    }
    .menu-items {
      width: 80%;
      max-width: 800px;
    }
    .menu-item {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background: white;
      padding: 10px;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      margin: 10px 0;
      cursor: pointer;
    }
    .menu-item img {
      width: 80px;
      height: 80px;
      border-radius: 5px;
      object-fit: cover;
    }
    .menu-item .info {
      flex: 1;
      padding: 0 15px;
      text-align: left;
    }
    .menu-item .price {
      font-weight: bold;
      color: #000000;
    }
    .popup {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.7);
      justify-content: center;
      align-items: center;
    }
    .popup-content {
      background: white;
      padding: 20px;
      border-radius: 10px;
      text-align: center;
      max-width: 500px;
      position: relative;
    }
    .popup img {
      width: 100%;
      border-radius: 10px;
    }
    .popup .close {
      position: absolute;
      top: 10px;
      right: 10px;
      cursor: pointer;
      font-size: 20px;
      font-weight: bold;
    }
  </style>




<script type="text/javascript">
  function googleTranslateElementInit() {
    new google.translate.TranslateElement(
      {pageLanguage: 'it', layout: google.translate.TranslateElement.InlineLayout.SIMPLE},
      'google_translate_element'
    );
  }
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

</head>
<body>

  <section class="menu">
  <div class="center">
    
    <div class="logo-container">
      <img src="assets/logomenu.png" alt="Menu" class="logo" data-aos="fade-in" data-aos-duration="2000">
    </div>
    <span id="asterisk" style="text-shadow: 1px 1px 1px  #000000;">*</span>
    <div class="center-text">
      <h1 class="alex-brush"><span class="custom-font" style="text-shadow: 1px 1px 1px  #ffffff;">Menu</span><br /></h1>
    </div>

    <div class="language-selector">
  <img src="assets/flags/it.png" alt="Italiano" onclick="translatePage('it')">
  <img src="assets/flags/en.png" alt="English" onclick="translatePage('en')">
  <img src="flags/fr.png" alt="Français" onclick="translatePage('fr')">
</div>

<!-- Il widget di Google Translate (può essere nascosto) -->
<div id="google_translate_element" style="display: none;"></div>

  </div>
  
    <div class="categories" data-aos="fade-in" data-aos-duration="2000">
      <button onclick="filterMenu('primi')">Primi Piatti</button>
      <button onclick="filterMenu('secondi')">Secondi Piatti</button>
      <button onclick="filterMenu('dolci')">Dolci</button>
    </div>
    <div class="menu-items" id="menu-items" data-aos="fade-in" data-aos-duration="2000">
      <div class="menu-item" data-category="primi" onclick="openPopup('assets/pasta.jpg', 'Carbonara', 'Pasta con uova, pecorino, guanciale e pepe nero.')">
        <img src="assets/pasta.jpg" alt="Carbonara">
        <div class="info">
          <h3>Carbonara</h3>
          <p>Pasta con uova, pecorino, guanciale e pepe nero.</p>
        </div>
        <span class="price">€12</span>
      </div>
      <div class="menu-item" data-category="secondi" onclick="openPopup('assets/bistecca.jpg', 'Bistecca alla Fiorentina', 'Taglio di carne cotto alla griglia, servito al sangue.')">
        <img src="assets/bistecca.jpg" alt="Bistecca">
        <div class="info">
          <h3>Bistecca alla Fiorentina</h3>
          <p>Taglio di carne cotto alla griglia, servito al sangue.</p>
        </div>
        <span class="price">€25</span>
      </div>
      <div class="menu-item" data-category="dolci" onclick="openPopup('assets/tiramisu.jpg', 'Tiramisù', 'Dolce classico italiano con mascarpone, caffè e cacao.')">
        <img src="assets/tiramisu.jpg" alt="Tiramisù">
        <div class="info">
          <h3>Tiramisù</h3>
          <p>Dolce classico italiano con mascarpone, caffè e cacao.</p>
        </div>
        <span class="price">€6</span>
      </div>
    </div>
  </section>
  <div class="popup" id="popup">
    <div class="popup-content">
      <span class="close" onclick="closePopup()">&times;</span>
      <img id="popup-img" src="" alt="">
      <h3 id="popup-title"></h3>
      <p id="popup-desc"></p>
    </div>
  </div>
  <script>
    function filterMenu(category) {
      let items = document.querySelectorAll('.menu-item');
      items.forEach(item => {
        item.style.display = item.getAttribute('data-category') === category ? 'flex' : 'none';
      });
    }
    function openPopup(imgSrc, title, desc) {
      document.getElementById('popup-img').src = imgSrc;
      document.getElementById('popup-title').textContent = title;
      document.getElementById('popup-desc').textContent = desc;
      document.getElementById('popup').style.display = 'flex';
    }
    function closePopup() {
      document.getElementById('popup').style.display = 'none';
    }
  </script>
  <script src="js/aos.js"></script>
  <script>
  AOS.init({
    once: true, // L'animazione si verifica solo una volta
    startEvent: 'DOMContentLoaded', // Attiva l'animazione appena la pagina è caricata
  });
</script>

<script>
  function changeLanguage(lang) {
    var interval = setInterval(function () {
      var select = document.querySelector(".goog-te-combo");
      if (select) {
        select.value = lang;
        select.dispatchEvent(new Event("change"));
        clearInterval(interval); // Ferma il ciclo una volta trovato il selettore
      }
    }, 500);
  }
</script>




</body>
</html>