document.addEventListener("DOMContentLoaded", function () {
    let immaginiSfondo = [
"cozze.jpeg",
"pesce.jpeg",
"tonno.jpeg",
"crema.jpeg"
    ];

    let header = document.querySelector("header");
    let indice = 0;

    function cambiaSfondo() {
        header.style.backgroundImage = `url('${immaginiSfondo[indice]}')`;
        header.style.backgroundSize = "cover";
        header.style.backgroundPosition = "center";
        indice = (indice + 1) % immaginiSfondo.length; // Ciclo infinito tra le immagini
    }

    // Cambia sfondo ogni 5 secondi
    setInterval(cambiaSfondo, 5000);

    // Imposta il primo sfondo all'avvio
    cambiaSfondo();
});

