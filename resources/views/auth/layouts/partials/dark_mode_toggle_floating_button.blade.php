<!-- Dark Mode Toggle - Floating button -->
<div class="fixed top-4 right-4 z-50">
    <button @click="darkMode = !darkMode; localStorage.setItem('darkMode', darkMode)"
        class="dark-mode-toggle p-3 rounded-2xl bg-white/80 dark:bg-gray-800/80 text-gray-700 dark:text-gray-300 shadow-lg hover:shadow-xl border border-gray-200/50 dark:border-gray-700/50 backdrop-blur-xl transition-all duration-300 hover:scale-110"
        :title="darkMode ? 'Switch to Light Mode' : 'Switch to Dark Mode'">
        <i class="fa-solid fa-sun h-5 w-5" x-show="darkMode"></i>
        <i class="fa-solid fa-moon h-5 w-5" x-show="!darkMode"></i>
    </button>
</div>
