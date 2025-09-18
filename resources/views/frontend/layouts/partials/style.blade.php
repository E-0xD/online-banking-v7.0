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
         animation: float 3s ease-in-out infinite;
     }

     .floating-slow {
         animation: float 6s ease-in-out infinite;
     }

     .floating-slower {
         animation: float 8s ease-in-out infinite;
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

     /* Gradient backgrounds */
     .gradient-bg {
         background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
     }

     .gradient-primary {
         background: linear-gradient(135deg, #0ea5e9 0%, #3b82f6 100%);
     }

     .gradient-secondary {
         background: linear-gradient(135deg, #64748b 0%, #475569 100%);
     }

     /* Mobile Fixed Buttons */
     .mobile-fixed-buttons {
         position: fixed;
         bottom: 0;
         left: 0;
         right: 0;
         margin: 0 auto;
         z-index: 50;
         display: flex;
     }

     @media (min-width: 1024px) {
         .mobile-fixed-buttons {
             display: none;
         }
     }
 </style>
