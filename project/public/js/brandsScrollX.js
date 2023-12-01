document.addEventListener("DOMContentLoaded", function () {
        

    // NewArrivals Scroll
      let isMouseDownNA = false;
      let startXNA;
      let scrollLeftNA;
  
      const brandsR1 = document.getElementById('brandsR1');
      
      brandsR1.addEventListener('mousedown', (e) => {
          isMouseDownNA = true;
          startXNA = e.pageX - brandsR1.offsetLeft;
          scrollLeftNA = brandsR1.scrollLeft;
          brandsR1.style.cursor = 'grabbing';
      });
  
      brandsR1.addEventListener('mouseup', () => {
          isMouseDownNA = false;
          brandsR1.style.cursor = 'grab';
      });
  
      brandsR1.addEventListener('mouseleave', () => {
          isMouseDownNA = false;
          brandsR1.style.cursor = 'grab';
      });
  
      brandsR1.addEventListener('mousemove', (e) => {
          if (!isMouseDownNA) return;
          e.preventDefault();
          const x = e.pageX - brandsR1.offsetLeft;
          const walk = (x - startXNA) * 3;
          brandsR1.scrollLeft = scrollLeftNA - walk;
      });
    

    let isMouseDownNA2 = false;
      let startXNA2;
      let scrollLeftNA2;

      const brandsR2 = document.getElementById('brandsR2');
      
      brandsR2.addEventListener('mousedown', (e) => {
          isMouseDownNA2 = true;
          startXNA2 = e.pageX - brandsR2.offsetLeft;
          scrollLeftNA2 = brandsR2.scrollLeft;
          brandsR2.style.cursor = 'grabbing';
      });
  
      brandsR2.addEventListener('mouseup', () => {
          isMouseDownNA2 = false;
          brandsR2.style.cursor = 'grab';
      });
  
      brandsR2.addEventListener('mouseleave', () => {
          isMouseDownNA2 = false;
          brandsR2.style.cursor = 'grab';
      });
  
      brandsR2.addEventListener('mousemove', (e) => {
          if (!isMouseDownNA2) return;
          e.preventDefault();
          const x = e.pageX - brandsR2.offsetLeft;
          const walk = (x - startXNA2) * 3;
          brandsR2.scrollLeft = scrollLeftNA2 - walk;
      });


      let isMouseDownNA3 = false;
      let startXNA3;
      let scrollLeftNA3;

      const brandsR3 = document.getElementById('brandsR3');
      
      brandsR3.addEventListener('mousedown', (e) => {
          isMouseDownNA3 = true;
          startXNA3 = e.pageX - brandsR3.offsetLeft;
          scrollLeftNA3 = brandsR3.scrollLeft;
          brandsR3.style.cursor = 'grabbing';
      });
  
      brandsR3.addEventListener('mouseup', () => {
          isMouseDownNA3 = false;
          brandsR3.style.cursor = 'grab';
      });
  
      brandsR3.addEventListener('mouseleave', () => {
          isMouseDownNA3 = false;
          brandsR3.style.cursor = 'grab';
      });
  
      brandsR3.addEventListener('mousemove', (e) => {
          if (!isMouseDownNA3) return;
          e.preventDefault();
          const x = e.pageX - brandsR3.offsetLeft;
          const walk = (x - startXNA3) * 3;
          brandsR3.scrollLeft = scrollLeftNA3 - walk;
      });
    });
