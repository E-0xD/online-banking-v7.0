<style>
    body {
        font-family: "Inter", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        background-color: theme('colors.background');
        color: theme('colors.foreground');
    }

    ::-webkit-scrollbar {
        width: 8px;
        height: 8px;
    }

    ::-webkit-scrollbar-track {
        background: #e2e8f0;
    }

    /* slate-200 */
    ::-webkit-scrollbar-thumb {
        background: #94a3b8;
        border-radius: 4px;
    }

    /* slate-400 */
    ::-webkit-scrollbar-thumb:hover {
        background: #64748b;
    }

    /* slate-500 */
    .dark ::-webkit-scrollbar-track {
        background: #374151;
    }

    /* gray-700 */
    .dark ::-webkit-scrollbar-thumb {
        background: #6b7280;
    }

    /* gray-500 */
    .dark ::-webkit-scrollbar-thumb:hover {
        background: #9ca3af;
    }

    /* gray-400 */
    .custom-scrollbar::-webkit-scrollbar {
        width: 6px;
        height: 6px;
    }

    .custom-scrollbar::-webkit-scrollbar-track {
        background: transparent;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 3px;
    }

    /* slate-300 */
    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: #94a3b8;
    }

    /* slate-400 */
    .dark .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #6b7280;
    }

    /* gray-500 */
    .dark .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: #9ca3af;
    }

    /* gray-400 */
    .shine-effect-container {
        position: relative;
        overflow: hidden;
    }

    .shine-effect {
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background-image: linear-gradient(to right, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.2) 50%, rgba(255, 255, 255, 0) 100%);
        transform: rotate(45deg);
        opacity: 0;
        transition: opacity 0.5s;
    }

    .shine-effect-container:hover .shine-effect {
        opacity: 1;
        animation: shine-once 1.5s ease-in-out;
    }

    .fade-in-section {
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 0.6s ease-out, transform 0.6s ease-out;
    }

    .fade-in-section.is-visible {
        opacity: 1;
        transform: translateY(0);
    }

    /* Floating elements animation */
    .floating {
        animation: floating 3s ease-in-out infinite;
    }

    .floating-slow {
        animation: floating 6s ease-in-out infinite;
    }

    .floating-slower {
        animation: floating 8s ease-in-out infinite;
    }

    @keyframes floating {
        0% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-10px);
        }

        100% {
            transform: translateY(0px);
        }
    }

    /* Interactive elements */
    .input-wrapper {
        position: relative;
        transition: all 0.3s ease;
    }

    .input-wrapper:focus-within {
        transform: translateY(-2px);
    }

    .input-icon {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        left: 1rem;
        color: #94a3b8;
        transition: color 0.3s ease;
    }

    .input-wrapper:focus-within .input-icon {
        color: var(--primary-color);
    }

    input:focus+.input-toggle {
        color: var(--primary-color);
    }

    .dark .input-icon {
        color: #6b7280;
    }

    /* Dark mode toggle button styling */
    .dark-mode-toggle {
        transition: all 0.3s ease;
    }

    .dark-mode-toggle:hover {
        transform: scale(1.1);
    }
</style>

<!-- Ultra Modern Loading Animation -->
<style>
    .page-loading {
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 100%;
        transition: all .6s cubic-bezier(0.4, 0, 0.2, 1);
        background: radial-gradient(ellipse at center, rgba(14, 165, 233, 0.08) 0%, rgba(255, 255, 255, 0.95) 50%, rgba(255, 255, 255, 1) 100%);
        backdrop-filter: blur(2px);
        visibility: hidden;
        z-index: 9999;
    }

    .dark .page-loading {
        background: radial-gradient(ellipse at center, rgba(14, 165, 233, 0.12) 0%, rgba(17, 24, 39, 0.95) 50%, rgba(17, 24, 39, 1) 100%);
    }

    .page-loading.active {
        opacity: 1;
        visibility: visible;
    }

    .page-loading-inner {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        transition: all .4s cubic-bezier(0.4, 0, 0.2, 1);
        opacity: 0;
    }

    .page-loading.active>.page-loading-inner {
        opacity: 1;
    }

    .loading-container {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        position: relative;
    }

    /* Floating particles background */
    .loading-particles {
        position: absolute;
        width: 300px;
        height: 300px;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        pointer-events: none;
    }

    .particle {
        position: absolute;
        width: 4px;
        height: 4px;
        background: linear-gradient(45deg, #0ea5e9, #4f46e5);
        border-radius: 50%;
        opacity: 0.6;
        animation: floatParticle 4s ease-in-out infinite;
    }

    .particle:nth-child(1) {
        top: 20%;
        left: 20%;
        animation-delay: 0s;
    }

    .particle:nth-child(2) {
        top: 80%;
        left: 80%;
        animation-delay: 0.5s;
    }

    .particle:nth-child(3) {
        top: 60%;
        left: 20%;
        animation-delay: 1s;
    }

    .particle:nth-child(4) {
        top: 30%;
        left: 70%;
        animation-delay: 1.5s;
    }

    .particle:nth-child(5) {
        top: 70%;
        left: 30%;
        animation-delay: 2s;
    }

    .particle:nth-child(6) {
        top: 10%;
        left: 60%;
        animation-delay: 2.5s;
    }

    .loading-animation {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 120px;
        height: 120px;
        margin-bottom: 2rem;
        position: relative;
        filter: drop-shadow(0 0 20px rgba(14, 165, 233, 0.2));
    }

    /* Outer orbital rings */
    .loading-animation .orbit-ring {
        position: absolute;
        border-radius: 50%;
        border: 2px solid rgba(14, 165, 233, 0.2);
        animation: rotateOrbit 8s linear infinite;
    }

    .orbit-ring:nth-child(1) {
        width: 100%;
        height: 100%;
        border-top: 2px solid #0ea5e9;
        border-right: 2px solid rgba(14, 165, 233, 0.3);
        animation-duration: 2s;
    }

    .orbit-ring:nth-child(2) {
        width: 80%;
        height: 80%;
        top: 10%;
        left: 10%;
        border-bottom: 2px solid #0ea5e9;
        border-left: 2px solid rgba(14, 165, 233, 0.3);
        animation-duration: 2.5s;
        animation-direction: reverse;
    }

    .orbit-ring:nth-child(3) {
        width: 60%;
        height: 60%;
        top: 20%;
        left: 20%;
        border-top: 2px solid #0ea5e9;
        border-right: 2px solid rgba(14, 165, 233, 0.3);
        animation-duration: 3s;
    }

    /* Inner spinning circles */
    .loading-animation .inner-circle {
        position: absolute;
        width: 15px;
        height: 15px;
        border-radius: 50%;
        background: #0ea5e9;
        box-shadow: 0 0 10px rgba(14, 165, 233, 0.6);
        animation: spinInner 2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
    }

    .inner-circle:nth-child(4) {
        border-top: 3px solid #0ea5e9;
        border-right: 3px solid rgba(14, 165, 233, 0.4);
        animation-delay: 0s;
    }

    .inner-circle:nth-child(5) {
        border-bottom: 3px solid #0ea5e9;
        border-left: 3px solid rgba(14, 165, 233, 0.4);
        animation-delay: 0.3s;
        animation-direction: reverse;
    }

    /* Glowing core with morphing effect */
    .loading-animation .core {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background: linear-gradient(45deg, #0ea5e9, #4f46e5);
        background-size: 200% 200%;
        box-shadow:
            0 0 20px rgba(14, 165, 233, 0.6),
            0 0 40px rgba(14, 165, 233, 0.3),
            inset 0 0 10px rgba(255, 255, 255, 0.3);
        animation: coreGlow 2s ease-in-out infinite, morphCore 4s ease-in-out infinite;
    }

    /* Enhanced text with multiple effects */
    .page-loading .text {
        font-weight: 700;
        letter-spacing: 0.1em;
        margin-top: 1.5rem;
        font-size: 1.1rem;
        position: relative;
        background: linear-gradient(90deg, #0ea5e9, #0ea5e9, #4f46e5, #0ea5e9, #0ea5e9);
        background-size: 300% auto;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        animation: textShimmer 3s linear infinite;
        text-shadow: 0 0 30px rgba(14, 165, 233, 0.3);
    }

    .page-loading .text::before {
        content: '';
        position: absolute;
        top: -2px;
        left: -2px;
        right: -2px;
        bottom: -2px;
        background: linear-gradient(45deg, transparent, rgba(14, 165, 233, 0.1), transparent);
        border-radius: 4px;
        z-index: -1;
        animation: textGlow 2s ease-in-out infinite alternate;
    }

    /* Subtitle with fade effect */
    .page-loading .subtitle {
        font-size: 0.75rem;
        color: #64748b;
        font-weight: 500;
        margin-top: 0.5rem;
        letter-spacing: 0.05em;
        animation: subtitleFade 2s ease-in-out infinite;
    }

    /* Progress indicator */
    .loading-progress {
        width: 200px;
        height: 2px;
        background: #f1f5f9;
        border-radius: 1px;
        margin-top: 1.5rem;
        overflow: hidden;
        position: relative;
    }

    .loading-progress::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, #0ea5e9, transparent);
        animation: progressSlide 2s ease-in-out infinite;
    }

    /* Keyframe animations */
    @keyframes floatParticle {

        0%,
        100% {
            transform: translateY(0px) rotate(0deg);
            opacity: 0.6;
        }

        50% {
            transform: translateY(-20px) rotate(180deg);
            opacity: 1;
        }
    }

    @keyframes rotateOrbit {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    @keyframes spinInner {
        0% {
            transform: rotate(0deg) scale(1);
        }

        50% {
            transform: rotate(180deg) scale(1.1);
        }

        100% {
            transform: rotate(360deg) scale(1);
        }
    }

    @keyframes coreGlow {
        0% {
            transform: translate(-50%, -50%) scale(0.8);
            box-shadow:
                0 0 20px rgba(14, 165, 233, 0.6),
                0 0 40px rgba(14, 165, 233, 0.3),
                inset 0 0 10px rgba(255, 255, 255, 0.3);
        }

        100% {
            transform: translate(-50%, -50%) scale(1.2);
            box-shadow:
                0 0 30px rgba(14, 165, 233, 0.8),
                0 0 60px rgba(14, 165, 233, 0.4),
                inset 0 0 15px rgba(255, 255, 255, 0.5);
        }
    }

    @keyframes morphCore {

        0%,
        100% {
            border-radius: 50%;
            background-position: 0% 50%;
        }

        25% {
            border-radius: 40%;
            background-position: 100% 50%;
        }

        50% {
            border-radius: 30%;
            background-position: 0% 50%;
        }

        75% {
            border-radius: 40%;
            background-position: 100% 50%;
        }
    }

    @keyframes textShimmer {
        0% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }
    }

    @keyframes textGlow {
        0% {
            opacity: 0.3;
        }

        100% {
            opacity: 0.7;
        }
    }

    @keyframes subtitleFade {

        0%,
        100% {
            opacity: 0.5;
            transform: translateY(0px);
        }

        50% {
            opacity: 1;
            transform: translateY(-2px);
        }
    }

    @keyframes progressSlide {
        0% {
            left: -100%;
        }

        50% {
            left: 0%;
        }

        100% {
            left: 100%;
        }
    }
</style>
