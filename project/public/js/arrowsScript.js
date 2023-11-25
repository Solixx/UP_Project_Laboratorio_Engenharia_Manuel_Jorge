$(document).ready(function() {
    // Seletor para todas as setas em todos os arquivos
    var arrows = $('.arrows');

    arrows.each(function(index) {
      // Ajusta dinamicamente a posição das setas
      var topPosition = index * 100 + 95 + '%';
      $(this).css('top', topPosition);

      if (index === arrows.length - 1) {
        $(this).addClass("arrowsWhite");
      }
    });
  });