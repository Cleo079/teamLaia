let carousel = document.querySelectorAll('.carousel');
  let leftArrow = document.querySelector('.flecha.izquierda');
  let rightArrow = document.querySelector('.flecha.derecha');
  var current = localStorage.getItem('carouselPosition') || 0;

  function cls(){
    for (let i = 0; i < carousel.length; i++) {
      carousel[i].style.display = 'none';
    }
  }

  function updateArrowsVisibility() {
    leftArrow.style.display = current == 0 ? 'none' : 'block';
    rightArrow.style.display = current == carousel.length - 1 ? 'none' : 'block';
  }

  function next() {
    if (current < carousel.length - 1) {
      current++;
      cls();
      carousel[current].style.display = 'block';
    }
    updateArrowsVisibility();
    localStorage.setItem('carouselPosition', current);
  }

  function prev() {
    if (current > 0) {
      current--;
      cls();
      carousel[current].style.display = 'block';
    }
    updateArrowsVisibility();
    localStorage.setItem('carouselPosition', current);
  }

  function start(){
    cls();
    carousel[current].style.display = 'block';
    updateArrowsVisibility();
  }

  start();