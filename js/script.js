// Initialize AOS (Animate On Scroll)
document.addEventListener('DOMContentLoaded', function() {
  // Initialize AOS animation library
  AOS.init({
      duration: 800,
      easing: 'ease-in-out',
      once: true,
      mirror: false
  });

  // Product filtering functionality
  const filterButtons = document.querySelectorAll('.category-nav .nav-link');
  const productItems = document.querySelectorAll('.product-item');

  // Add click event to filter buttons
  filterButtons.forEach(button => {
      button.addEventListener('click', function(e) {
          e.preventDefault();
          
          // Remove active class from all buttons
          filterButtons.forEach(btn => btn.classList.remove('active'));
          
          // Add active class to clicked button
          this.classList.add('active');
          
          // Get filter value
          const filterValue = this.getAttribute('data-filter');
          
          // Filter products
          filterProducts(filterValue);
      });
  });

  // Filter products function
  function filterProducts(category) {
      productItems.forEach(item => {
          // Reset animations for filtered items
          item.style.opacity = '0';
          
          setTimeout(() => {
              if (category === 'all') {
                  item.classList.remove('hidden');
                  item.setAttribute('data-aos', 'fade-up');
                  AOS.refresh();
              } else if (item.getAttribute('data-category') === category) {
                  item.classList.remove('hidden');
                  item.setAttribute('data-aos', 'fade-up');
                  AOS.refresh();
              } else {
                  item.classList.add('hidden');
              }
              
              item.style.opacity = '1';
          }, 300);
      });
  }

  // Add hover effect for product cards
  const productCards = document.querySelectorAll('.product-card');
  
  productCards.forEach(card => {
      card.addEventListener('mouseenter', function() {
          this.querySelector('.overlay').style.opacity = '1';
          this.querySelector('.overlay .btn').style.transform = 'translateY(0)';
      });
      
      card.addEventListener('mouseleave', function() {
          this.querySelector('.overlay').style.opacity = '0';
          this.querySelector('.overlay .btn').style.transform = 'translateY(20px)';
      });
  });

  // Add scroll reveal animation for section headers
  const sectionHeaders = document.querySelectorAll('.section-header');
  
  window.addEventListener('scroll', function() {
      sectionHeaders.forEach(header => {
          const headerPosition = header.getBoundingClientRect().top;
          const screenPosition = window.innerHeight / 1.3;
          
          if (headerPosition < screenPosition) {
              header.classList.add('fade-in');
          }
      });
  });
});

// Image loading animation
window.addEventListener('load', function() {
  const productImages = document.querySelectorAll('.product-image img');
  
  productImages.forEach(img => {
      // Add loading animation
      img.style.opacity = '0';
      
      // Simulate image loading
      setTimeout(() => {
          img.style.transition = 'opacity 0.5s ease';
          img.style.opacity = '1';
      }, 300 + Math.random() * 500); // Random delay for natural effect
  });
});