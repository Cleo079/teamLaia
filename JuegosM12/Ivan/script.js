let matrix = shuffleMatrix();
// let matrix = [
//     ['1', '2', '3'],
//     ['4', '5', '6'],
//     ['7', '', '8']
// ];

let board = document.querySelector('.board');
let startBtn = document.querySelector('#start');
let firstScreen = document.querySelector('.first-screen');
let startBtnContainer = document.querySelector('.startBtn-container');
let counterElement = document.querySelector('.counter');
let pistaElement = document.querySelector('.pista');
let pauseElement = document.querySelector('.pause');
let counter = 240;
let playerWin = false;

/*Animacion botones*/
startBtn.addEventListener('mousedown', ()=> {
    startBtn.style.top = '4px';
});

startBtn.addEventListener('mouseup', ()=> {
    startBtn.style.top = '0px';
});




//Boton jugar de nuevo
startBtn.addEventListener('click', ()=> {
    firstScreen.style.display = 'none';
    startBtnContainer.style.display = 'none';
    counterElement.style.display = 'block';
    pistaElement.style.display = 'block';
    matrix = shuffleMatrix();
    // matrix = [
    //     ['1', '2', '3'],
    //     ['4', '5', '6'],
    //     ['7', '', '8']
    // ];
    drawTokens();
    counter = 240;
    playerWin = false;
    startCounter();
    addEventListeners();
});





function drawTokens(){
    board.innerHTML = '';
    matrix.forEach(row => row.forEach(element => {
        if(element == ''){
            board.innerHTML += `<div class='empty'>${element}</div>`
        }else if(element == '1'){
            board.innerHTML += `<div class='token1'>${element}</div>`
        }else if(element == '2'){
            board.innerHTML += `<div class='token2'>${element}</div>`
        }else if(element == '3'){
            board.innerHTML += `<div class='token3'>${element}</div>`
        }else if(element == '4'){
            board.innerHTML += `<div class='token4'>${element}</div>`
        }else if(element == '5'){
            board.innerHTML += `<div class='token5'>${element}</div>`
        }else if(element == '6'){
            board.innerHTML += `<div class='token6'>${element}</div>`
        }else if(element == '7'){
            board.innerHTML += `<div class='token7'>${element}</div>`
        }else if(element == '8'){
            board.innerHTML += `<div class='token8'>${element}</div>`
        }
        else{
            board.innerHTML += `<div class='token'>${element}</div>`
        }
    }));
}

// var imagePaths = {
//     '1': 'Arriba-Izquierda.png',
//     '2': 'Arriba-Centro.png',
//     '3': 'Arriba-Derecha.png',
//     '4': 'Centro-Izquierda.png',
//     '5': 'Centro-Centro.png',
//     '6': 'Centro-Derecha.png',
//     '7': 'Abajo-Izquierda.png',
//     '8': 'Abajo-Centro.png',
//     '': ''
//     // Agrega más entradas según sea necesario para otros tokens
// };
// function drawTokens() {
//     board.innerHTML = '';
//     matrix.forEach(row => row.forEach(element => {
//         if(element == ''){
//             board.innerHTML += `<div class='empty'>${element}</div>`
//         }
//         else{
//             var imagePath = imagePaths[element] || '';
//             board.innerHTML += `<div class='token' style='background-image: url("${imagePath}")'></div>`;
//         }
//     }));
// }

function addEventListeners(){
    let tokens = document.querySelectorAll('.token, .token1, .token2, .token3, .token4, .token5, .token6, .token7, .token8');
    tokens.forEach(token => token.addEventListener('click', ()=>{
        let actualPosition = searchPosition(token.innerText);
        let emptyPosition = searchPosition('');
        let movement = canItMove(actualPosition, emptyPosition);
        console.log(movement);
        if(movement !== false){
            updateMatrix(token.innerText, actualPosition, emptyPosition);

            let result = compareMatrix();
            
            if(result === true){
                playerWin = true;
                startBtnContainer.style.display = 'block';
                startBtn.innerText = "Restart";

                confetti({
                    particleCount: 150,
                    spread: 180
                });
            }

            drawTokens();
            addEventListeners();
        }
    }))
}

function searchPosition(element){
    let rowIndex = 0;
    let columnIndex = 0;
    matrix.forEach((row, index) => {
        let rowElement = row.findIndex(item => item == element);
        if(rowElement !== -1){
            rowIndex = index;
            columnIndex = rowElement;
        }
    })
    return [rowIndex, columnIndex];
}

function canItMove(actualPosition, emptyPosition){
    if(actualPosition[1] == emptyPosition[1]){

        if(actualPosition[0] - emptyPosition[0] > 1 || actualPosition[0] - emptyPosition[0] < -1){
            return false;
        }

        /*if(actualPosition[0] - emptyPosition[0] == -1){
            return 'down';
        }else if(actualPosition[0] - emptyPosition[0] == 1){
            return 'up';
        }else{
            return 'noMove';
        }*/
    }else if(actualPosition[0] == emptyPosition[0]){

        if(actualPosition[1] - emptyPosition[1] > 1 || actualPosition[1] - emptyPosition[1] < -1){
            return false;
        }

        /*if(actualPosition[1] - emptyPosition[1] == -1){
            return 'right';
        }else if(actualPosition[1] - emptyPosition[1] == 1){
            return 'left';
        }else{
            return 'noMove';
        }*/
    }else{
        return false;
    }
}

function updateMatrix(element, actualPosition, emptyPosition){
    matrix[actualPosition[0]][actualPosition[1]] = '';
    matrix[emptyPosition[0]][emptyPosition[1]] = element;
}

function shuffleMatrix(){
    let shuffleMatrix = [
        [],
        [],
        []
    ];


    let array = ['1', '2', '3', '4', '5', '6', '7', '8', ''];
    let shuffleArray = array.sort(() => Math.random()-0.5);

    let column = 0;
    let row = 0;
    shuffleArray.forEach(element => {
        shuffleMatrix[row].push(element);
        if(column < 2){
            column++;
        }else{
            column = 0;
            row++;
        }
    })
    return shuffleMatrix;
}

function compareMatrix(){
    let counter = 0;
    let finalMatrix = [
        ['1', '2', '3'],
        ['4', '5', '6'],
        ['7', '8', '']
    ];
    matrix.forEach((row, indexRow) => {
        row.forEach((element, indexColumn) => {
            if(element == finalMatrix[indexRow][indexColumn]){
                counter--;
            }
        })
    })
    if(counter == 9){
        return true;
    }else{
        return false;
    }
}

// Contador
function startCounter(){
    counterElement.innerText = counter;
    let counterId = setInterval(()=>{
        counter--;
    
        if(counter <= 0){
            clearInterval(counterId);
            counterElement.style.display = 'none';
            board.innerHTML = '<p class="game-over">Ya no hay tiempo, cagaste!</p>';
            startBtnContainer.style.display = 'block';
            startBtn.innerText = "Restart";
        }
        else{
            counterElement.innerText = counter;
        }
    
        if(playerWin == true){
            clearInterval(counterId);
        }
        
    }, 1000)
}
function mostrarPrevisualizacion(carta) {
    // Obtener el contenido de la carta
    var contenidoCarta = carta.innerHTML;

    // Obtener el elemento de previsualización
    var previsualizacion = document.getElementById('previsualizacion');

    // Establecer el contenido de la previsualización
    previsualizacion.innerHTML = contenidoCarta;

    // Mostrar la previsualización
    previsualizacion.style.display = 'block';
}

// Función para ocultar la previsualización
function ocultarPrevisualizacion() {
    // Obtener el elemento de previsualización
    var previsualizacion = document.getElementById('previsualizacion');

    // Ocultar la previsualización
    previsualizacion.style.display = 'none';
}