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

    .input-wrapper.focused {
        transform: translateY(-1px);
    }

    .input-wrapper.focused .input-icon {
        color: theme('colors.primary.500');
    }
</style>
