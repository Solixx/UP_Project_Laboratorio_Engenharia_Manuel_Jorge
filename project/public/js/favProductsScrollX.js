document.addEventListener("DOMContentLoaded", function () {
        

    // NewArrivals Scroll
      let isMouseDownNA = false;
      let startXNA;
      let scrollLeftNA;
  
      const favProds = document.getElementById('favProductsImageGallery');
      
      favProds.addEventListener('mousedown', (e) => {
          isMouseDownNA = true;
          startXNA = e.pageX - favProds.offsetLeft;
          scrollLeftNA = favProds.scrollLeft;
          favProds.style.cursor = 'grabbing';
      });
  
      favProds.addEventListener('mouseup', () => {
          isMouseDownNA = false;
          favProds.style.cursor = 'grab';
      });
  
      favProds.addEventListener('mouseleave', () => {
          isMouseDownNA = false;
          favProds.style.cursor = 'grab';
      });
  
      favProds.addEventListener('mousemove', (e) => {
          if (!isMouseDownNA) return;
          e.preventDefault();
          const x = e.pageX - favProds.offsetLeft;
          const walk = (x - startXNA) * 3;
          favProds.scrollLeft = scrollLeftNA - walk;
      });
    });