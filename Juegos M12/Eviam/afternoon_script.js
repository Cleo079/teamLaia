let level1 = [
    [1,1,0,1],
    [1,1,1,1],
    [1,0,1,0],
    [1,0,1,1]
];

let mazeArray = level1;
let maze = document.getElementById("maze-container");
let warrior= document.getElementById("warrior");
// let warrior_up = document.getElementById("warrior_up");
// let warrior_left = document.getElementById("warrior_left");
// let warrior_right = document.getElementById("warrior_right");

// function warriorPosition(x, y) {
//     position = [x , y];
//     return position;
// }

function createMaze() {
    for (let i = 0; i < mazeArray.length; i++) {
        let row = document.createElement("div");
        row.classList.add("row");

        for (let j = 0; j < mazeArray[i].length; j++) {
            let cell = document.createElement("div");
            cell.classList.add("cell");

            if (mazeArray[i][j] == 0) {
                cell.classList.add("wall");
            }
            
            if (i == 0 && j == 0) {
                mazeArray[i][j] = 2;
            }
            row.appendChild(cell);
        }
        maze.appendChild(row);
    }
}

function getWarriorPosition() {
    let position = [-1 , -1];
    for (let i = 0; i < mazeArray.length; i++) {
        for (let j = 0; j < mazeArray[i].length; j++) {
            position[0] = i;
            position[1] = j;
        }
    }
    console.log(position);
    return position;
}
getWarriorPosition();


document.addEventListener("keydown",
    function(e)
    {
        let warrior= document.getElementById("warrior");
        let warriorLeft = warrior.offsetLeft;
        let warriorTop = warrior.offsetTop;
        let warriorPosition = getWarriorPosition();

        if (e.key == "ArrowRight") {
            if (warriorLeft < (mazeArray.length - 1) * 50) {
                warriorLeft += 52;
                warrior.style.left = warriorLeft + "px";
            }
        }
        if (e.key == "ArrowLeft") {
            if (warriorLeft > 0) {
                warriorLeft -= 52;
                warrior.style.left = warriorLeft + "px";
            }
        }
        if (e.key == "ArrowUp") {
            if (warriorTop > 0) {
                warriorTop -= 52;
                warrior.style.top = warriorTop + "px";
            }
        }
        if (e.key == "ArrowDown") {
            if (warriorTop < (level1.length - 1) * 50)
                warriorTop += 52;
                warrior.style.top = warriorTop + "px";
        }
    }
);
