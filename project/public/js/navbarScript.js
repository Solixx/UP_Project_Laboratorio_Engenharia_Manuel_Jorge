document.addEventListener('DOMContentLoaded', function () {
    // Adiciona um ouvinte de eventos para o clique no avatar
    if(document.getElementById('avatarImage') != null){
      var avatar = document.getElementById('avatarImage') ? document.getElementById('avatarImage') : null;
      var accountMenu = document.getElementById('accountMenu');

      avatar.addEventListener('click', function () {
        // Alternar a visibilidade do menu
        if (accountMenu.style.display === 'block') {
            accountMenu.style.display = 'none';
        } else {
            accountMenu.style.display = 'block';
        }
      });
    }

    var searchIcon = document.getElementById('searchIconID');
    var searchInput = document.getElementById('searchInputID');
  
    searchIcon.addEventListener('click', function () {
        // Alternar a visibilidade do menu
        if (searchInput.style.display === 'block') {
            searchInput.style.display = 'none';
        } else {
            searchInput.style.display = 'block';
        }
    });


    // Obtém a referência para o elemento .nav
    var navBG = document.querySelector(".navBG");
      var nav = document.querySelector(".nav");
      var navPhoneLines = document.getElementsByClassName("line");
      var accountMenu = document.getElementById('accountMenu');

      // Obtém a posição da <section class="sectionBrand">
      var sectionBrand = document.querySelector("#sectionBrand");
      var sectionBrandPosition = sectionBrand.offsetTop;

      // Obtém a referência para a imagem dentro da .logo
      var logoImage = document.querySelector(".logo img");

      // Atualiza a navigation bar based on the initial scroll position
      updateNavigationBar();

      // Adiciona um ouvinte de rolagem à janela
      window.addEventListener("scroll", function () {
          // Atualiza a navigation bar durante o scroll
          updateNavigationBar();
      });

      function updateNavigationBar() {
          // Obtém a posição de rolagem atual
          var scrollPosition = window.scrollY;

          // Verifica se a posição de rolagem atingiu ou ultrapassou 100vh
          if (scrollPosition < sectionBrandPosition) {
              // Adiciona a classe .navBlack se a posição de rolagem for maior ou igual a 100
              nav.classList.add("navBlack");
              navBG.classList.add("navBG-Black");
              for (let i = 0; i < navPhoneLines.length; i++) {
                  navPhoneLines[i].classList.add("line-white");
              }
              if(document.getElementById('avatarImage') != null){
                  accountMenu.classList.add("myAccountMenu-white");
              }

              searchInput.classList.add("searchInput-white");

              // Atualiza a imagem da logo para outra imagem
              logoImage.src = "../imgs/logo.png";
          } else {
              // Remove a classe .navBlack se a posição de rolagem for menor que 100
              nav.classList.remove("navBlack");
              navBG.classList.remove("navBG-Black");
              if(!document.querySelector('.navPhoneCheckbox').checked){
                  for (let i = 0; i < navPhoneLines.length; i++) {
                      navPhoneLines[i].classList.remove("line-white");
                  }
              } else{
                  for (let i = 0; i < navPhoneLines.length; i++) {
                      navPhoneLines[i].classList.add("line-white");
                  }
              }
              if(document.getElementById('avatarImage') != null){
                  accountMenu.classList.remove("myAccountMenu-white");
              }             
              
              searchInput.classList.remove("searchInput-white");

              // Restaura a imagem original da logo
              logoImage.src = "../imgs/logo-BLACK.png";
          }
      }
});