// Variable global para almacenar las traducciones
let translations;
const botonJuegaAhora = document.querySelector(".botonJuegaAhora");
const botonJuegaAhoraFondo = document.querySelector(".botonJuegaAhoraFondo");

// Función para cargar el archivo JSON según el idioma
function cargarTraducciones(idioma) {
    // Utiliza el idioma proporcionado para construir la ruta al archivo JSON
    const rutaJSON = `/teamLaia/landingPageM12/landing/language/${idioma}.json`;

    // Realiza una solicitud AJAX para cargar el JSON
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Parsea el JSON y almacénalo en la variable global
            translations = JSON.parse(xhr.responseText);

            // Llama a la función para actualizar los textos en la página
            actualizarTextos();
        }
    };
    xhr.open('GET', rutaJSON, true);
    xhr.send();
}

// Función para actualizar los textos en la página
function actualizarTextos() {
    // Recorre todos los elementos con el atributo data-section y data-value
    const elementos = document.querySelectorAll('[data-section][data-value]');
    elementos.forEach(elemento => {
        const seccion = elemento.getAttribute('data-section');
        const valor = elemento.getAttribute('data-value');

        // Verifica si hay una traducción para la sección y valor específicos
        if (translations?.[seccion]?.[valor]) {
            // Actualiza el contenido del elemento con la traducción correspondiente
            elemento.innerHTML = translations[seccion][valor];
        }
    });
}

// Inicializa el idioma al cargar la página
cargarTraducciones('es');

// Función para cambiar el idioma al hacer clic en una bandera
function cambiarIdioma(idioma) {
    cargarTraducciones(idioma);
}

botonJuegaAhora.addEventListener("click", () => {
    // Especifica la ruta del archivo al que deseas redirigir
    const newPath = "../gameInterface/mainPage.php";

    // Cambia la ubicación del navegador al nuevo archivo
    window.location.href = newPath;
});

botonJuegaAhoraFondo.addEventListener("click", () => {
    // Especifica la ruta del archivo al que deseas redirigir
    const newPath = "../gameInterface/mainPage.php";

    // Cambia la ubicación del navegador al nuevo archivo
    window.location.href = newPath;
});