/**
   * Movimiento de la barra de navegación del usuario
   */
const list = document.querySelectorAll('.listNavUser');
    function activeLink(){
      list.forEach((item) =>
      item.classList.remove('active'));
      this.classList.add('active');
    }
    list.forEach((item) =>
    item.addEventListener('click',activeLink));

