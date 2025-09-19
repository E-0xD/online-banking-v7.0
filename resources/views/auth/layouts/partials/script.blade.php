 <!-- Enhanced Page Loading Animation -->
 <script>
     window.onload = function() {
         const preloader = document.querySelector('.page-loading');

         // Add a slight delay to make loading animation more noticeable
         setTimeout(function() {
             preloader.classList.remove('active');
             setTimeout(function() {
                 preloader.remove();
             }, 500);
         }, 800);
     };
 </script>

 <!-- Additional Scripts -->
 <script>
     function togglePasswordVisibility() {
         const passwordInput = document.getElementById('password');
         const showPasswordIcon = document.getElementById('show-password');
         const hidePasswordIcon = document.getElementById('hide-password');

         if (passwordInput.type === 'password') {
             passwordInput.type = 'text';
             showPasswordIcon.classList.add('hidden');
             hidePasswordIcon.classList.remove('hidden');
         } else {
             passwordInput.type = 'password';
             showPasswordIcon.classList.remove('hidden');
             hidePasswordIcon.classList.add('hidden');
         }
     }

     // Enhanced form interactions
     document.addEventListener('DOMContentLoaded', function() {
         // Add floating label effect
         const inputs = document.querySelectorAll('input[type="email"], input[type="password"]');
         inputs.forEach(input => {
             input.addEventListener('focus', function() {
                 this.parentElement.parentElement.classList.add('focused');
             });

             input.addEventListener('blur', function() {
                 if (!this.value) {
                     this.parentElement.parentElement.classList.remove('focused');
                 }
             });
         });

         // Add ripple effect to buttons
         const buttons = document.querySelectorAll('button, a');
         buttons.forEach(button => {
             button.addEventListener('click', function(e) {
                 const ripple = document.createElement('span');
                 const rect = this.getBoundingClientRect();
                 const size = Math.max(rect.width, rect.height);
                 const x = e.clientX - rect.left - size / 2;
                 const y = e.clientY - rect.top - size / 2;

                 ripple.style.width = ripple.style.height = size + 'px';
                 ripple.style.left = x + 'px';
                 ripple.style.top = y + 'px';
                 ripple.classList.add('ripple');

                 this.appendChild(ripple);

                 setTimeout(() => {
                     ripple.remove();
                 }, 600);
             });
         });
     });
 </script>
