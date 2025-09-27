 <script>
     // Toggle active class & set method
     document.querySelectorAll('.deposit-method').forEach(method => {
         method.addEventListener('click', function() {
             document.querySelectorAll('.deposit-method').forEach(m => m.classList.remove('active'));
             this.classList.add('active');
             document.getElementById('selectedMethod').value = this.dataset.method;
         });
     });

     // Quick amount buttons
     document.querySelectorAll('.quick-amount').forEach(button => {
         button.addEventListener('click', function() {
             const amount = this.innerText.replace('$', '');
             document.getElementById('amount').value = amount;
         });
     });
 </script>
