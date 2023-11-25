document.addEventListener("DOMContentLoaded", function () {
        

    // NewArrivals Scroll
      let isMouseDownNA = false;
      let startXNA;
      let scrollLeftNA;
  
      const newArrivals = document.getElementById('newArrivalsImageGallery');
      
      newArrivals.addEventListener('mousedown', (e) => {
          isMouseDownNA = true;
          startXNA = e.pageX - newArrivals.offsetLeft;
          scrollLeftNA = newArrivals.scrollLeft;
          newArrivals.style.cursor = 'grabbing';
      });
  
      newArrivals.addEventListener('mouseup', () => {
          isMouseDownNA = false;
          newArrivals.style.cursor = 'grab';
      });
  
      newArrivals.addEventListener('mouseleave', () => {
          isMouseDownNA = false;
          newArrivals.style.cursor = 'grab';
      });
  
      newArrivals.addEventListener('mousemove', (e) => {
          if (!isMouseDownNA) return;
          e.preventDefault();
          const x = e.pageX - newArrivals.offsetLeft;
          const walk = (x - startXNA) * 3;
          newArrivals.scrollLeft = scrollLeftNA - walk;
      });
    });