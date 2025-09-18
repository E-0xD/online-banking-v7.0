 <!-- Language Translation Script -->
 <script type="text/javascript">
     let currentLanguage = 'en';

     function changeLanguage(langCode) {
         if (langCode === currentLanguage) return;

         currentLanguage = langCode;
         updateFlagDisplay(langCode);

         // Store language preference
         localStorage.setItem('selectedLanguage', langCode);

         // Use Microsoft Translator (more reliable than Google)
         if (langCode === 'en') {
             // Reset to original language
             location.reload();
         } else {
             // Redirect to Microsoft Translator
             const currentUrl = encodeURIComponent(window.location.href);
             const translateUrl = `https://www.microsofttranslator.com/bv.aspx?from=en&to=${langCode}&a=${currentUrl}`;
             window.open(translateUrl, '_blank');
         }
     }

     function updateFlagDisplay(langCode) {
         const flags = {
             'en': '🇺🇸',
             'es': '🇪🇸',
             'fr': '🇫🇷',
             'de': '🇩🇪',
             'it': '🇮🇹',
             'pt': '🇵🇹'
         };

         // Update desktop flag
         const desktopFlag = document.querySelector('.relative.group button span');
         if (desktopFlag && flags[langCode]) {
             desktopFlag.textContent = flags[langCode];
         }

         // Update mobile flag  
         const mobileFlag = document.querySelector('[x-data*="languageOpen"] .bg-gradient-to-br span');
         if (mobileFlag && flags[langCode]) {
             mobileFlag.textContent = flags[langCode];
         }
     }

     // Simple client-side translation using MyMemory API (free)
     async function translatePage(langCode) {
         if (langCode === 'en') {
             location.reload();
             return;
         }

         try {
             // Show loading indicator
             showTranslationLoading();

             // Get all translatable text elements
             const textElements = document.querySelectorAll(
                 'h1, h2, h3, h4, h5, h6, p, span:not(.no-translate), button:not(.no-translate), a:not(.no-translate), div:not(.no-translate)'
             );
             const textsToTranslate = [];

             textElements.forEach(element => {
                 const text = element.textContent.trim();
                 // Skip if empty, is a number, contains only symbols, or is marked as no-translate
                 if (text &&
                     text.length > 1 &&
                     !element.classList.contains('no-translate') &&
                     !element.closest('.no-translate') &&
                     !/^[\d\s\$\€\£\¥\+\-\*\/\=\(\)\[\]\{\}\<\>\|\\\^\~\`\!\@\#\%\&\_\?\.\,\;\:\"\']+$/.test(
                        text) &&
                    !element.querySelector('input, select, textarea, img, svg') &&
                    element.children.length === 0) {

                    textsToTranslate.push({
                        element: element,
                        originalText: text
                    });
                }
            });

            // Translate in batches to avoid API limits
            const batchSize = 10;
            for (let i = 0; i < textsToTranslate.length; i += batchSize) {
                const batch = textsToTranslate.slice(i, i + batchSize);
                await translateBatch(batch, langCode);

                // Small delay between batches
                if (i + batchSize < textsToTranslate.length) {
                    await new Promise(resolve => setTimeout(resolve, 500));
                }
            }

            hideTranslationLoading();

        } catch (error) {
            console.error('Translation error:', error);
            hideTranslationLoading();
            alert('Translation service is currently unavailable. Please try again later.');
        }
    }

    async function translateBatch(batch, langCode) {
        for (const item of batch) {
            try {
                const translatedText = await translateText(item.originalText, langCode);
                if (translatedText && translatedText !== item.originalText) {
                    item.element.textContent = translatedText;
                }
            } catch (error) {
                console.error('Error translating text:', error);
                // Continue with next item if one fails
            }
        }
    }

    async function translateText(text, targetLang) {
        try {
            // Use MyMemory API (free, no API key required)
            const response = await fetch(
                `https://api.mymemory.translated.net/get?q=${encodeURIComponent(text)}&langpair=en|${targetLang}`
            );
            const data = await response.json();

            if (data.responseStatus === 200 && data.responseData && data.responseData.translatedText) {
                return data.responseData.translatedText;
            }

            // Fallback: try LibreTranslate if MyMemory fails
            return await translateWithLibre(text, targetLang);

        } catch (error) {
            console.error('Translation API error:', error);
            // Fallback to basic dictionary for common words
            return translateBasic(text, targetLang);
        }
    }

    async function translateWithLibre(text, targetLang) {
        try {
            // LibreTranslate public instance (backup)
            const response = await fetch('https://libretranslate.com/translate', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    q: text,
                    source: 'en',
                    target: targetLang,
                    format: 'text'
                })
            });

            const data = await response.json();
            return data.translatedText || text;

        } catch (error) {
            console.error('LibreTranslate error:', error);
            return text;
        }
    }

    function translateBasic(text, targetLang) {
        // Basic dictionary for common banking terms
        const dictionary = {
            'es': {
                'Home': 'Inicio',
                'About': 'Acerca de',
                'Services': 'Servicios',
                'Contact': 'Contacto',
                'Login': 'Iniciar Sesión',
                'Register': 'Registrarse',
                'Open Account': 'Abrir Cuenta',
                'Banking': 'Banca',
                'Personal Banking': 'Banca Personal',
                'Business Banking': 'Banca Empresarial',
                'Loans': 'Préstamos',
                'Cards': 'Tarjetas',
                'Language': 'Idioma'
            },
            'fr': {
                'Home': 'Accueil',
                'About': 'À propos',
                'Services': 'Services',
                'Contact': 'Contact',
                'Login': 'Connexion',
                'Register': 'S\'inscrire',
                'Open Account': 'Ouvrir un Compte',
                'Banking': 'Banque',
                'Personal Banking': 'Banque Personnelle',
                'Business Banking': 'Banque d\'Entreprise',
                'Loans': 'Prêts',
                'Cards': 'Cartes',
                'Language': 'Langue'
            },
            'de': {
                'Home': 'Startseite',
                'About': 'Über uns',
                'Services': 'Dienstleistungen',
                'Contact': 'Kontakt',
                'Login': 'Anmelden',
                'Register': 'Registrieren',
                'Open Account': 'Konto Eröffnen',
                'Banking': 'Banking',
                'Personal Banking': 'Privatkundengeschäft',
                'Business Banking': 'Firmenkundengeschäft',
                'Loans': 'Kredite',
                'Cards': 'Karten',
                'Language': 'Sprache'
            },
            'it': {
                'Home': 'Casa',
                'About': 'Chi siamo',
                'Services': 'Servizi',
                'Contact': 'Contatto',
                'Login': 'Accedi',
                'Register': 'Registrati',
                'Open Account': 'Apri Conto',
                'Banking': 'Banking',
                'Personal Banking': 'Banking Personale',
                'Business Banking': 'Banking Aziendale',
                'Loans': 'Prestiti',
                'Cards': 'Carte',
                'Language': 'Lingua'
            },
            'pt': {
                'Home': 'Início',
                'About': 'Sobre',
                'Services': 'Serviços',
                'Contact': 'Contato',
                'Login': 'Entrar',
                'Register': 'Registrar',
                'Open Account': 'Abrir Conta',
                'Banking': 'Bancário',
                'Personal Banking': 'Banco Pessoal',
                'Business Banking': 'Banco Empresarial',
                'Loans': 'Empréstimos',
                'Cards': 'Cartões',
                'Language': 'Idioma'
            }
        };

        return dictionary[targetLang] && dictionary[targetLang][text] ? dictionary[targetLang][text] : text;
    }

    function getLanguageName(code) {
        const names = {
            'es': 'Spanish',
            'fr': 'French',
            'de': 'German',
            'it': 'Italian',
            'pt': 'Portuguese'
        };
        return names[code] || code;
    }

    function showTranslationLoading() {
        // Create loading overlay
        const overlay = document.createElement('div');
        overlay.id = 'translation-loading';
        overlay.className = 'fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50';
        overlay.innerHTML = `
                                                                                   <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 text-center">
                                                                                       <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-primary-600 mx-auto mb-4"></div>
                                                                                       <p class="text-gray-700 dark:text-gray-300">Translating page...</p>
                                                                                   </div>
                                                                               `;
         document.body.appendChild(overlay);
     }

     function hideTranslationLoading() {
         const overlay = document.getElementById('translation-loading');
         if (overlay) {
             overlay.remove();
         }
     }

     // Initialize on page load
     document.addEventListener('DOMContentLoaded', function() {
         // Load saved language preference
         const savedLanguage = localStorage.getItem('selectedLanguage');
         if (savedLanguage && savedLanguage !== 'en') {
             currentLanguage = savedLanguage;
             updateFlagDisplay(savedLanguage);
         }
     });

     // Update the changeLanguage function to use the new approach
     window.changeLanguage = function(langCode) {
         currentLanguage = langCode;
         updateFlagDisplay(langCode);
         localStorage.setItem('selectedLanguage', langCode);

         if (langCode === 'en') {
             location.reload();
         } else {
             translatePage(langCode);
         }
     };
 </script>
