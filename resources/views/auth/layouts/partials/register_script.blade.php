<!-- Additional Scripts -->
<script src="/frontend/code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    let currentStep = 1;
    const totalSteps = 4;

    function togglePassword(fieldId) {
        const field = document.getElementById(fieldId);
        const eye = document.getElementById(fieldId + '-eye');

        if (field.type === 'password') {
            field.type = 'text';
            eye.classList.remove('fa-eye');
            eye.classList.add('fa-eye-slash');
        } else {
            field.type = 'password';
            eye.classList.remove('fa-eye-slash');
            eye.classList.add('fa-eye');
        }
    }

    function updateProgress() {
        const progressPercentage = (currentStep / totalSteps) * 100;
        $('#progress-bar').css('width', progressPercentage + '%');
        $('#current-step').text(currentStep);

        // Update step indicators
        for (let i = 1; i <= totalSteps; i++) {
            const indicator = $(`#step-${i}-indicator`);
            const label = indicator.next('span');

            if (i <= currentStep) {
                indicator.removeClass('bg-gray-300 dark:bg-gray-600 text-gray-500')
                    .addClass('bg-primary-600 text-white');
                label.removeClass('text-gray-500 dark:text-gray-400')
                    .addClass('text-primary-600 dark:text-primary-400 font-medium');
            } else {
                indicator.removeClass('bg-primary-600 text-white')
                    .addClass('bg-gray-300 dark:bg-gray-600 text-gray-500');
                label.removeClass('text-primary-600 dark:text-primary-400 font-medium')
                    .addClass('text-gray-500 dark:text-gray-400');
            }
        }
    }

    function showStep(step) {
        $('.step-content').hide();
        $(`#step-${step}`).fadeIn(300);

        // Update navigation buttons
        if (step === 1) {
            $('#prev-btn').hide();
        } else {
            $('#prev-btn').show();
        }

        if (step === totalSteps) {
            $('#next-btn').hide();
            $('#submit-btn').show();
        } else {
            $('#next-btn').show();
            $('#submit-btn').hide();
        }

        updateProgress();
    }

    function validateStep(step) {
        let isValid = true;
        const requiredFields = $(`#step-${step} input[required], #step-${step} select[required]`);

        requiredFields.each(function() {
            const field = $(this);
            const value = field.val().trim();

            if (!value) {
                field.addClass('border-red-500 focus:border-red-500 focus:ring-red-500');
                isValid = false;
            } else {
                field.removeClass('border-red-500 focus:border-red-500 focus:ring-red-500');
            }
        });

        // Additional validation for step 4 (passwords)
        if (step === 4) {
            const password = $('#password').val();
            const confirmPassword = $('#password_confirmation').val();
            const terms = $('#terms').is(':checked');

            if (password !== confirmPassword) {
                $('#password_confirmation').addClass('border-red-500 focus:border-red-500 focus:ring-red-500');
                isValid = false;
            }

            if (!terms) {
                isValid = false;
            }
        }

        return isValid;
    }

    $(document).ready(function() {
        // Initialize first step
        showStep(1);

        // Next button click
        $('#next-btn').click(function() {
            if (validateStep(currentStep)) {
                if (currentStep < totalSteps) {
                    currentStep++;
                    showStep(currentStep);
                }
            }
        });

        // Previous button click
        $('#prev-btn').click(function() {
            if (currentStep > 1) {
                currentStep--;
                showStep(currentStep);
            }
        });

        // PIN input validation (numbers only, max 4 digits)
        $('#pin').on('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '').slice(0, 4);
        });

        // Currency symbol handling
        $('#curr').change(function() {
            const selectedOption = $(this).find('option:selected');
            const symbol = selectedOption.data('symbol');
            if (symbol) {
                $('#s_curr').val(symbol);
            }
        });

        // Real-time validation feedback
        $('input[required], select[required]').on('blur', function() {
            const field = $(this);
            const value = field.val().trim();

            if (!value) {
                field.addClass('border-red-500 focus:border-red-500 focus:ring-red-500');
            } else {
                field.removeClass('border-red-500 focus:border-red-500 focus:ring-red-500');
            }
        });

        // Password confirmation validation
        $('#password_confirmation').on('input', function() {
            const password = $('#password').val();
            const confirmPassword = $(this).val();

            if (password !== confirmPassword) {
                $(this).addClass('border-red-500 focus:border-red-500 focus:ring-red-500');
            } else {
                $(this).removeClass('border-red-500 focus:border-red-500 focus:ring-red-500');
            }
        });

        // Add ripple effect to buttons
        $('button, a').on('click', function(e) {
            const button = $(this);
            const ripple = $('<span class="ripple"></span>');
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;

            ripple.css({
                width: size + 'px',
                height: size + 'px',
                left: x + 'px',
                top: y + 'px'
            });

            button.append(ripple);

            setTimeout(() => {
                ripple.remove();
            }, 600);
        });
    });
</script>
