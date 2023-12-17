// Array de preguntas
let preguntas = [
    {
        pregunta: "¿Qué tipo de árboles se pueden ver a ambos lados del río?",
        imagen: "./imagenes/arbol.jpg",
        opciones: ["Robles", "Banyan (Árbol sagrado de la India)", "Pinos", "Palmeras"],
        respuesta: 1,
        explicacion: "El Banyan es un árbol sagrado en la India, conocido por su simbolismo espiritual y su amplia sombra."
    },
    {
        pregunta: "¿Qué elemento del paisaje indica que la imagen podría estar representando una región costera de la India?",
        imagen: "./imagenes/Palmera.jpg",
        opciones: ["El río", "Las montañas", "Las palmeras", "El bote"],
        respuesta: 2,
        explicacion: "Las palmeras son típicas de las regiones costeras de la India, ya que prosperan en climas cálidos y húmedos."
    },
    {
        pregunta: "¿Qué estilo arquitectónico sugiere el diseño del templo?",
        imagen: "./imagenes/Templo.jpg",
        opciones: ["Estilo Nagara", "Estilo Dravida", "Estilo Vesara", "Estilo Gupta"],
        respuesta: 0,
        explicacion: "El diseño del templo sugiere el estilo arquitectónico Nagara, caracterizado por su torre en forma de montaña escalonada."
    },
    {
        pregunta: "¿Cómo se llama el estilo de decoración que se observa?",
        imagen: "./imagenes/arquitectura.jpg",
        opciones: ["Estilo Mughal", "Estilo Rajasthani", "Estilo Gupta", "Estilo Drávida"],
        respuesta: 2,
        explicacion: "La decoración del edificio refleja el estilo Gupta, conocido por su elegancia y detalles artísticos."
    },
    {
        pregunta: "¿Qué elemento no es típico de un paisaje tradicional indio?",
        imagen: "./imagenes/Brote.jpg",
        opciones: ["El templo", "El brote rojo", "La montaña", "El pájaro en el árbol"],
        respuesta: 1,
        explicacion: "El brzote rojo no es típico de un paisaje tradicional indio y podría ser una adición artística o fuera de contexto."
    },
    {
        pregunta: "¿Qué elemento del paisaje podría sugerir que la imagen está representando una región específica de la India?",
        imagen: "./imagenes/Region.jpg",
        opciones: ["El río sugiere que es la región de Kerala.", "Las montañas sugieren que es la región del Himalaya.", "Los árboles verdes sugieren que es la región de Assam.", "El pájaro volando en el cielo sugiere que es la región de Rajasthan."],
        respuesta: 1,
        explicacion: "Las montañas sugieren que la imagen podría representar la región del Himalaya, famosa por sus altas cordilleras."
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
// ... (tu código anterior)

// ... (tu código anterior)

function mostrarPregunta() {
    let pregunta = preguntas[preguntaActual];
    document.querySelector(".question img").src = pregunta.imagen;
    document.querySelector("#enunciado").textContent = pregunta.pregunta;
    document.querySelector(".options").innerHTML = "";
    document.querySelector(".options").classList.remove("explanation"); // Remover la clase de explicación

    for (let i = 0; i < pregunta.opciones.length; i++) {
        let boton = document.createElement("button");
        boton.textContent = pregunta.opciones[i];
        boton.classList.add("option");
        boton.onclick = function() {
            // Comprobar si la respuesta es correcta
            const respuestaCorrecta = i === pregunta.respuesta;

            // Mostrar la explicación con un contador
            mostrarExplicacion(respuestaCorrecta, pregunta.explicacion);

            // Reproducir el sonido según la respuesta
            reproducirSonido(respuestaCorrecta);

            // Actualizar la bombilla y clases CSS según la respuesta
            if (respuestaCorrecta) {
                puntaje++;
                boton.classList.add("correct");
                cambiarImagenBombilla(true); // Cambiar imagen a encendida
            } else {
                boton.classList.add("incorrect");
                cambiarImagenBombilla(false); // Mantener la imagen apagada
            }

            // Pasar a la siguiente pregunta después de 4 segundos
            preguntaActual++;
            if (preguntaActual < preguntas.length) {
                setTimeout(function() {
                    mostrarPregunta();
                }, 4000);
            } else {
                // Mostrar puntaje final
                alert("¡Quiz terminado! Tu puntaje es: " + puntaje);
            }
        };
        document.querySelector(".options").appendChild(boton);
    }
}

function mostrarExplicacion(respuestaCorrecta, explanation) {
    const explicacionElement = document.createElement("div");
    explicacionElement.classList.add("explicacion");

    if (respuestaCorrecta) {
        explicacionElement.classList.add("correct-explanation");
        explicacionElement.textContent = "¡Correcto! " + explanation;
    } else {
        explicacionElement.classList.add("incorrect-explanation");
        explicacionElement.textContent = "Incorrecto. La respuesta correcta es: " + explanation;
    }


    document.querySelector(".options").appendChild(explicacionElement);
    document.querySelector(".options").classList.add("explanation"); // Agregar la clase de explicación

    // Ocultar la explicación después de 4 segundos
    setTimeout(function() {
        document.querySelector(".explicacion").style.display = "none";
    }, 4000);
}

 // Verificar si el puntaje es 10 o más
 if (player.score >= 10) {
    youWinMessage.innerHTML = "HAS GANADO!";
    nextGameButton.style.display = "block";
  } else {
    gameOverMessage.innerHTML = "HAS PERDIDO :(";
    gameOverMessage2.innerHTML = "Pero no pasa nada, vuelve a jugar para que Laia pueda coger el vuelo hacia Brasil!";
    nextGameButton.style.display = "none";
  }


document.getElementById("scoreInput").value = player.score;



// Iniciar el quiz
mostrarPregunta();
