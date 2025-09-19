<style>
    .ripple {
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.3);
        transform: scale(0);
        animation: ripple-animation 0.6s linear;
        pointer-events: none;
    }

    @keyframes ripple-animation {
        to {
            transform: scale(4);
            opacity: 0;
        }
    }

    .floating-slow {
        animation: float 8s ease-in-out infinite;
    }

    .floating {
        animation: float 6s ease-in-out infinite;
    }

    .floating-slower {
        animation: float 10s ease-in-out infinite;
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(0px) rotate(0deg);
        }

        50% {
            transform: translateY(-20px) rotate(180deg);
        }
    }

    .step-content {
        min-height: 320px;
    }

    /* Custom focus styles */
    input:focus,
    select:focus {
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }

    /* Smooth transitions for form elements */
    input,
    select,
    button {
        transition: all 0.3s ease;
    }

    /* Enhanced button hover effects */
    button:hover {
        transform: translateY(-1px);
    }

    button:active {
        transform: translateY(0);
    }

    /* Better mobile responsiveness */
    @media (max-width: 768px) {
        .step-content {
            min-height: 280px;
        }
    }

    /* Enhanced form field styling */
    input[type="text"],
    input[type="email"],
    input[type="tel"],
    input[type="password"],
    select {
        font-size: 16px;
        /* Prevents zoom on iOS */
    }

    /* Better checkbox styling */
    input[type="checkbox"] {
        accent-color: rgb(59 130 246);
    }

    /* Ensure icons are properly positioned */
    .relative .absolute {
        z-index: 10;
    }
</style>
