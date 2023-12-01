document.addEventListener('DOMContentLoaded', function () {
    function createClones(rowId) {
      var row = document.getElementById(rowId);
      var images = row.querySelectorAll('img');
      var cloneContainer = document.createDocumentFragment();
  
      for (var i = 0; i < images.length; i++) {
        var clone = images[i].cloneNode(true);
        cloneContainer.appendChild(clone);
      }
  
      row.appendChild(cloneContainer);
    }
  
    function scrollBrands(rowId, speed) {
      createClones(rowId);
  
      var row = document.getElementById(rowId);
      var intervalId; // Variable to store the interval ID
  
      function scrollRow() {
        if (row.scrollLeft >= row.scrollWidth / 2) {
          row.scrollLeft = 0;
        } else {
          row.scrollLeft += speed;
        }
      }
  
      intervalId = setInterval(scrollRow, 30);
  
      // Stop the scrolling animation when clicking on internal links
      var internalLinks = document.querySelectorAll('a[href^="#"]');
      internalLinks.forEach(function (link) {
        link.addEventListener('click', function (event) {
          event.preventDefault();
  
          clearInterval(intervalId);
  
          // Scroll to the target position
          var targetId = this.getAttribute('href').substring(1);
          var targetElement = document.getElementById(targetId);
  
          if (targetElement) {
            var targetPosition = targetElement.offsetTop;
  
            window.scrollTo({
              top: targetPosition,
              behavior: 'smooth'
            });
  
            // After scrolling to the target position, restart the animation
            function restartAnimation() {
              if (window.scrollY >= targetPosition) {
                intervalId = setInterval(scrollRow, 30);
                window.removeEventListener('scroll', restartAnimation);
              }
            }
  
            window.addEventListener('scroll', restartAnimation);
          }
        });
      });
    }
  
    // Call the scrollBrands function for each row
    scrollBrands('brandsR1', 1);
    scrollBrands('brandsR2', 2);
    scrollBrands('brandsR3', 1);
  });
  