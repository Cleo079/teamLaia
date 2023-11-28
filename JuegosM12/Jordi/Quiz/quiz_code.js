// Array de preguntas
let preguntas = [
    {
        pregunta: "¿Qué tipo de árboles se pueden ver a ambos lados del río?",
        imagen: "./imagenes/arbol.jpg",
        opciones: ["Robles", "Banyan (Árbol sagrado de la India)", "Pinos", "Palmeras"],
        respuesta: 1
        //banya
    },
    {
        pregunta: "¿Qué elemento del paisaje indica que la imagen podría estar representando una región costera de la India?",
        imagen: "./imagenes/Palmera.jpg",
        opciones: ["El río", "Las montañas", "Las palmeras", "El bote"],
        respuesta: 2
        //palmera
    },
    {
        pregunta: "¿Qué estilo arquitectónico sugiere el diseño del templo?",
        imagen: "./imagenes/Templo.jpg",
        opciones: ["Estilo Nagara", "Estilo Dravida", "Estilo Vesara", "Estilo Gupta"],
        respuesta: 0
        //nagara
    },
    {
        pregunta: "¿Cómo se llama el estilo de decoración que se observa?",
        imagen: "./imagenes/arquitectura.jpg",
        opciones: ["Estilo Mughal", "Estilo Rajasthani", "Estilo Gupta", "Estilo Drávida"],
        respuesta: 2
        //gupta
    },
    {
        pregunta: "¿Qué elemento no es típico de un paisaje tradicional indio?",
        imagen: "./imagenes/Brote.jpg",
        opciones: ["El templo", "El bote rojo", "La montaña", "El pájaro en el árbol"],
        respuesta: 1
        //brote rojo
    },
    {
        pregunta: "¿Qué elemento del paisaje podría sugerir que la imagen está representando una región específica de la India?",
        imagen: "./imagenes/Region.jpg",
        opciones: ["El río sugiere que es la región de Kerala.", "Las montañas sugieren que es la región del Himalaya.", "Los árboles verdes sugieren que es la región de Assam.", "El pájaro volando en el cielo sugiere que es la región de Rajasthan."],
        respuesta: 1
        //himalaya 
    }
];


// Variables para llevar el control del quiz
let preguntaActual = 0;
let puntaje = 0;

// Función para reproducir el sonido según la respuesta
function reproducirSonido(respuestaCorrecta) {
    const audio = new Audio(respuestaCorrecta ? "./imagenes/correcto.mp3" : "./imagenes/incorrecto.mp3");
    audio.play();
}

// Función para cambiar la imagen de la bombilla
function cambiarImagenBombilla(encendida) {
    const bombillas = document.querySelectorAll(".bombillas img");
    bombillas[preguntaActual].src = encendida ? "./imagenes/bombilla encendida.png" : "./imagenes/bombilla apagada.png";
}

function empezarQuiz() {
    // Ocultar el mensaje y mostrar el quiz
    document.getElementById("instrucciones").style.display = "none";
    document.getElementById("quiz-container").style.display = "block";
}

// Función para mostrar la pregunta actual
function mostrarPregunta() {
    let pregunta = preguntas[preguntaActual];
    document.querySelector(".question img").src = pregunta.imagen;
    document.querySelector("#enunciado").textContent = pregunta.pregunta;
    document.querySelector(".options").innerHTML = "";
    for (let i = 0; i < pregunta.opciones.length; i++) {
        let boton = document.createElement("button");
        boton.textContent = pregunta.opciones[i];
        boton.classList.add("option");
        boton.onclick = function() {
            // Comprobar si la respuesta es correcta
            const respuestaCorrecta = i === pregunta.respuesta;
            if (respuestaCorrecta) {
                puntaje++;
            }
            
            // Reproducir el sonido según la respuesta
            reproducirSonido(respuestaCorrecta);

            // Actualizar la bombilla y clases CSS según la respuesta
            if (respuestaCorrecta) {
                boton.classList.add("correct");
                cambiarImagenBombilla(true); // Cambiar imagen a encendida
            } else {
                boton.classList.add("incorrect");
                cambiarImagenBombilla(false); // Mantener la imagen apagada
            }

            // Pasar a la siguiente pregunta
            preguntaActual++;
            if (preguntaActual < preguntas.length) {
                setTimeout(mostrarPregunta, 1000);
            } else {
                // Mostrar puntaje final
                alert("¡Quiz terminado! Tu puntaje es: " + puntaje);
            }
        };
        document.querySelector(".options").appendChild(boton);
    }
}

// Iniciar el quiz
mostrarPregunta();
