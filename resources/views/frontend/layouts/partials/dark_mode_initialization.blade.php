 <!-- Dark mode initialization -->
 <script>
     const isDarkMode = localStorage.getItem('darkMode') === 'true' ||
         (!localStorage.getItem('darkMode') && window.matchMedia('(prefers-color-scheme: dark)').matches);

     if (isDarkMode) {
         document.documentElement.classList.add('dark');
     }
 </script>
