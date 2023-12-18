let body = document.body;
const topBar = document.querySelector(".topBar");
const gameTitle = document.querySelector(".gameTitle");
const actionButtons = document.querySelector(".actionButtons");
const helpButton = document.querySelector(".helpButton");
const score = document.querySelector(".score");
const timeLeft = document.querySelector(".timeLeft");
const textMessage = document.querySelector(".textMessage");
const startButton = document.querySelector(".startButton");

const organicStartButton = document.querySelector(".organicCategory");
const glassStartButton = document.querySelector(".glassCategory");
const paperCardboardStartButton = document.querySelector(".paperCardboardCategory");
const plasticsStartButton = document.querySelector(".plasticsCategory");

const trashCan = document.querySelector(".trashCan");
const container = document.querySelector(".container");
const gameContainer = document.querySelector(".gameContainer");
const gameOverMessage = document.querySelector(".gameOverMessage");
const gameOverMessage2 = document.querySelector(".gameOverMessage2");
const youWinMessage = document.querySelector(".youWinMessage");
const afterGameButtons = document.querySelector(".afterGameButtons");
const nextGameButton = document.querySelector(".nextGameButton");
const helpContent = document.querySelector('.helpContent');
const closeButton = document.getElementById('closeButton');

    helpButton.addEventListener('click', function () {
        helpContent.style.display = 'block';
    });

    closeButton.addEventListener('click', function () {
        helpContent.style.display = 'none';
    });

afterGameButtons.style.display = 'none';
nextGameButton.style.display = 'none';
topBar.style.display = 'none';

const organicImageSources = [
  'images/organic/apple.png',
  'images/organic/banana.png',
  'images/organic/egg.png',
  'images/organic/fish.png'
];

const plasticsImageSources = [
  'images/plastics/can.png',
  'images/plastics/bleachBottle.png',
  'images/plastics/plasticBag.png',
  'images/plastics/waterBottle.png'
];

const paperCardboardImageSources = [
  'images/paperAndCardboard/newspaper.png',
  'images/paperAndCardboard/cardboardBox.png',
  'images/paperAndCardboard/cerealBox.png',
  'images/paperAndCardboard/cardboardTube.png'
];

const glassImageSources = [
  'images/glass/canningJar.png',
  'images/glass/glassBottle.png',
  'images/glass/testTube.png',
  'images/glass/wineGlass.png'
];

const imageSources = [
  organicImageSources,
  plasticsImageSources,
  paperCardboardImageSources,
  glassImageSources
];



let countdownInterval;
let boundTrashCan = trashCan.getBoundingClientRect();
let boundGameContainer = gameContainer.getBoundingClientRect();
let gameContainerWidth = boundGameContainer.width;
let trashCanWidth = trashCan.offsetWidth;
trashCan.style.left = ((gameContainerWidth - trashCanWidth) / 2) + 'px'
trashCan.style.display = "none";


let keys = {
  ArrowRight: false,
  ArrowLeft: false,
};

let isOrganicMode = false;
let isGlassMode = false;
let isPaperCardboardMode = false;
let isPlasticsMode = false;

document.addEventListener("keydown", pressKeyOn);
document.addEventListener("keyup", pressKeyOff);
container.style.zIndex = "999";

function pressKeyOn(event) {
  event.preventDefault();
  keys[event.key] = true;
}

function pressKeyOff(event) {
  event.preventDefault();
  keys[event.key] = false;
}

let player = {
  score: 0,
  timeToFinish: 0,
  currentlyPlaying: false,
  speed: 15,
  totalElement: 0,
  totalBomb: 0,
  lives: 3,
};

function isCollide(a, b) {
  let aRect = a.getBoundingClientRect();
  let bRect = b.getBoundingClientRect();

  return !(
    aRect.bottom < bRect.top ||
    aRect.top > bRect.bottom ||
    aRect.right < bRect.left ||
    aRect.left > bRect.right
  );
}

function scoreUpdate() {
  score.textContent = player.score;
  timeLeft.textContent = player.timeToFinish;
}

let selectedCategory = null;

organicStartButton.addEventListener("click", () => selectCategory("organic"));
glassStartButton.addEventListener("click", () => selectCategory("glass"));
paperCardboardStartButton.addEventListener("click", () => selectCategory("paperCardboard"));
plasticsStartButton.addEventListener("click", () => selectCategory("plastics"));

const playButton = document.querySelector(".playButton");

playButton.addEventListener("click", () => {
  // Check if a category is selected
  if (selectedCategory) {
    // Determine which category is selected and start the game accordingly
    if (selectedCategory === "organic") {
      startOrganicMode();
    } else if (selectedCategory === "glass") {
      startGlassMode();
    } else if (selectedCategory === "paperCardboard") {
      startPaperCardboardMode();
    } else if (selectedCategory === "plastics") {
      startPlasticsMode();
    }
  } else {
    // If no category is selected, provide a message or handle it as needed
    window.alert("Por favor, selecciona una categoría");
  }
});

function selectCategory(category) {
  // Si la categoría ya está seleccionada, deselecciónala
  if (selectedCategory === category) {
    console.log(`Deseleccionando ${category}`);
    document.querySelector(`.${category}Category`).style.backgroundColor = "";
    selectedCategory = null;
  } else {
    // Desseleccionar la categoría anterior si ya hay una seleccionada
    if (selectedCategory) {
      console.log(`Deseleccionando ${selectedCategory}`);
      document.querySelector(`.${selectedCategory}Category`).style.backgroundColor = "";
    }

    // Seleccionar la nueva categoría
    selectedCategory = category;
    console.log(`Seleccionando ${category}`);
    document.querySelector(`.${category}Category`).style.backgroundColor = "rgba(224, 211, 198, 0.08)";
  }
}

function startOrganicMode() {
  isOrganicMode = true;
  // Cambiar la imagen de la papelera para el modo orgánico
  trashCan.style.backgroundImage = "url('images/menuOrganicTrashcan.png')";
  startGame(); // Iniciar el juego
}

function startGlassMode() {
  isGlassMode = true;
  // Cambiar la imagen de la papelera para el modo glass
  trashCan.style.backgroundImage = "url('images/menuGlassTrashcan.png')";
  startGame(); // Iniciar el juego
}

function startPaperCardboardMode() {
  isPaperCardboardMode = true;
  // Cambiar la imagen de la papelera para el modo paperCardboard
  trashCan.style.backgroundImage = "url('images/menuPaperCardboardTrashcan.png')";
  trashCan.style.width = "160px";
  trashCan.style.height = "163px";
  startGame(); // Iniciar el juego
}

function startPlasticsMode() {
  isPlasticsMode = true;
  // Cambiar la imagen de la papelera para el modo plstics
  trashCan.style.backgroundImage = "url('images/menuPlasticsTrashcan.png')";
  trashCan.style.width = "160px";
  trashCan.style.height = "186px";
  startGame(); // Iniciar el juego
}

function startGame() {
  if (selectCategory) {
    body.style.backgroundImage = 'url("./images/background.png")';
    container.style.display = "none";
    trashCan.style.display = "block";
    topBar.style.display = 'block';
    gameTitle.style.display = 'none';
    actionButtons.style.display = 'none';
    helpButton.style.display = 'none';
    const countdownElement = document.getElementById('countdown');
    countdownElement.style.display = 'block'; // Asegurar que el contador sea visible al comenzar el juego
  
    countdownFadeEffect(3);
  
    function countdownFadeEffect(count) {
      if (count >= 0) {
        countdownElement.textContent = count;
        count--;
  
        setTimeout(function () {
          countdownFadeEffect(count);
        }, 1000);
      } else {
        countdownElement.style.display = 'none'; // Ocultar el contador una vez finalizada la cuenta regresiva
  
        setTimeout(function () {
          startGameAfterCountdown();
        }, 100);
      }
    }
    
  
    function startGameAfterCountdown() {
      trashCan.style.display = "block";
      player.score = 0;
      player.timeToFinish = 30;
      player.totalElement = 100;
      player.totalBomb = 1;
      player.currentlyPlaying = true;
    
      scoreUpdate();
    
      countdownInterval = setInterval(function () {
        player.timeToFinish--;
        scoreUpdate();
    
        if (player.timeToFinish === 0) {
          clearInterval(countdownInterval);
          endGame();
        }
      }, 1000);
    
      setupEnemies(3);
      setupBombs(1);
      requestAnimationFrame(playGame);
    }
  }
}

function setupEnemies(num) {
  for (let x = 0; x < num; x++) {
    makeEnemies();
  }
}

function setupBombs(num) {
  for (let x = 0; x < num; x++) {
    const randomInterval = Math.floor(Math.random() * 30000);
    setInterval(makeBomb, randomInterval);
  }
}

function makeBomb() {
  if (player.timeToFinish > 0 && player.totalBomb > 0) {
    player.totalBomb--;
    scoreUpdate();

    const bombImage = 'images/bomb.png'; // Adjust the image path as needed

    let bomb = document.createElement("div");
    bomb.style.backgroundImage = `url(${bombImage})`;
    bomb.classList.add("element");

    let minDistance = 20;
    do {
      bomb.x = Math.floor(Math.random() * (boundGameContainer.width - 100));
      if (bomb.x < 0) {
        bomb.x = 100;
      }
      bomb.y = Math.floor(Math.random() * 500) * -1 - 200;
    } while (isTooCloseToOthers(bomb, minDistance));

    let maxSpeed = 10;
    bomb.speed = Math.min(Math.ceil(Math.random() * 10) + 3, maxSpeed);

    gameContainer.appendChild(bomb);
    bomb.style.left = bomb.x + "px";
    bomb.style.top = bomb.y + "px";
  }
}


function makeEnemies() {
  if (player.timeToFinish > 0 && player.totalElement > 0) {
    player.totalElement--;
    scoreUpdate();

    // Imágenes aleatorias de la categoría actual
    const randomOrganicImage = organicImageSources[Math.floor(Math.random() * organicImageSources.length)];
    const randomPlasticsImage = plasticsImageSources[Math.floor(Math.random() * plasticsImageSources.length)];
    const randomPaperCardboardImage = paperCardboardImageSources[Math.floor(Math.random() * paperCardboardImageSources.length)];
    const randomGlassImage = glassImageSources[Math.floor(Math.random() * glassImageSources.length)];

    // Selección de una imagen aleatoria de cualquier categoría
    const randomImage = imageSources.flat()[Math.floor(Math.random() * imageSources.flat().length)];

    let chosenImage;
    if (Math.random() < 0.6) { // 60% de probabilidad de ser de la categoría correcta
      chosenImage = isOrganicMode ? randomOrganicImage :
                    isPlasticsMode ? randomPlasticsImage :
                    isPaperCardboardMode ? randomPaperCardboardImage :
                    isGlassMode ? randomGlassImage : randomImage;
    } else {
      chosenImage = randomImage;
    }

    let div = document.createElement("div");
    div.style.backgroundImage = `url(${chosenImage})`;
    div.classList.add("element");

    let minDistance = 20;
    do {
      div.x = Math.floor(Math.random() * (boundGameContainer.width - 100));
      if (div.x < 0) {
        div.x = 100;
      }
      div.y = Math.floor(Math.random() * 500) * -1 - 200;
    } while (isTooCloseToOthers(div, minDistance));

    let maxSpeed = 10;
    div.speed = Math.min(Math.ceil(Math.random() * 10) + 3, maxSpeed);

    gameContainer.appendChild(div);
    div.style.left = div.x + "px";
    div.style.top = div.y + "px";
  }
}
  
  // Check if the newly created div is too close to existing divs
  function isTooCloseToOthers(newDiv, minDistance) {
    const existingDivs = document.querySelectorAll(".element");
  
    for (let i = 0; i < existingDivs.length; i++) {
      const existingDiv = existingDivs[i];
      const dx = newDiv.x - existingDiv.x;
      const dy = newDiv.y - existingDiv.y;
      const distance = Math.sqrt(dx * dx + dy * dy);
  
      if (distance < minDistance) {
        return true;
      }
    }
  
    return false;
  }
  

  function bgMover(e) {
    e.y += e.speed;
  
    if (e.y > window.innerHeight - 100) {
      gameContainer.removeChild(e);
      if (e.style.backgroundImage.includes("bomb")) {
        makeBomb();
      } else {
        makeEnemies();
      }
    } else {
      e.style.top = e.y + "px";
  
      if (isCollide(trashCan, e)) {
        const imageUrl = e.style.backgroundImage;
  
        if (imageUrl.includes("bomb")) {
          player.score -= 5; // Subtract 5 points for hitting a bomb
        } else {
          if ((isOrganicMode && imageUrl.includes("images/organic")) ||
              (isPlasticsMode && imageUrl.includes("images/plastics")) ||
              (isPaperCardboardMode && imageUrl.includes("images/paperAndCardboard")) ||
              (isGlassMode && imageUrl.includes("images/glass"))) {
            player.score++;
          } else {
            player.score--;
          }
        }
  
        gameContainer.removeChild(e);
        scoreUpdate();
  
        if (!imageUrl.includes("bomb")) {
          makeEnemies();
        } else {
          makeBomb();
        }
      }
    }
  }

  function playGame() {
    if (player.currentlyPlaying) {
      if (keys.ArrowLeft && boundTrashCan.x > 0) {
        boundTrashCan.x -= player.speed;
      }
      if (keys.ArrowRight && boundTrashCan.x < (boundGameContainer.width - boundTrashCan.width)) {
        boundTrashCan.x += player.speed;
      }
  
      // Asegurar que el trashcan no se salga del límite derecho
      if (boundTrashCan.x < 0) {
        boundTrashCan.x = 0;
      }
      if (boundTrashCan.x > (boundGameContainer.width - boundTrashCan.width)) {
        boundTrashCan.x = boundGameContainer.width - boundTrashCan.width;
      }
  
      trashCan.style.left = boundTrashCan.x + "px";
      gameContainer.style.overflowX = "hidden"; // Restringir el scroll horizontal
      requestAnimationFrame(playGame);
  
      let temporalElement = document.querySelectorAll(".element");
      for (let i = 0; i < temporalElement.length; i++) {
        bgMover(temporalElement[i]);
      }
    }
  }
  
  

  afterGameButtons.addEventListener("click", () => {
    // Recargar la página
    location.reload();
  });
  
  function endGame() {
    body.style.backgroundImage = 'url("./images/menuBackground.png")';

    trashCan.style.display = "none";

    topBar.style.display = 'none';

    const enemyElements = document.querySelectorAll(".element");
    enemyElements.forEach((element) => {
      gameContainer.removeChild(element);
    });

    // Verificar si el puntaje es 10 o más
    if (player.score >= 15) {
      youWinMessage.innerHTML = "HAS GANADO!";
      nextGameButton.style.display = "block";
    } else {
      gameOverMessage.innerHTML = "HAS PERDIDO :(";
      gameOverMessage2.innerHTML = "Pero no pasa nada, vuelve a jugar para que Laia pueda coger el vuelo hacia Brasil!";
      nextGameButton.style.display = "none";
    }

    document.getElementById("scoreInput").value = player.score;
  
    
    afterGameButtons.style.display = 'block';
    youWinMessage.style.zIndex = "999";
    gameOverMessage.style.zIndex = "999";
    player.currentlyPlaying = false;
    document.body.style.overflowY = "hidden";
  }
  
  const backButton = document.querySelector(".backButton");

  backButton.addEventListener("click", () => {
    // Especifica la ruta del archivo al que deseas redirigir
    const newPath = "../../../landingPageM12/gameInterface/carrouselJuegos.html";

    // Cambia la ubicación del navegador al nuevo archivo
    window.location.href = newPath;
});