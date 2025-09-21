<!-- Enhanced Alerts -->

{{-- <div class="bg-green-50/90 dark:bg-green-900/30 backdrop-blur-sm border border-green-200/50 dark:border-green-800/50 text-green-700 dark:text-green-300 p-3 mb-4 rounded-xl"
    role="alert">
    <div class="flex items-center">
        <i class="fas fa-check-circle mr-2 text-green-500 text-sm"></i>
        <p class="text-sm font-medium">A new verification code has been sent to your email.</p>
    </div>
</div> --}}

@if (session()->has('error'))
    {{-- <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
        <span class="font-medium">{{ session('error') }}</span>
    </div> --}}

    <div class="bg-red-50/90 dark:bg-red-900/30 backdrop-blur-sm border border-red-200/50 dark:border-red-800/50 text-red-700 dark:text-red-300 p-3 mb-4 rounded-xl"
        role="alert">
        <div class="flex items-center">
            <i class="fas fa-exclamation-triangle mr-2 text-red-500 text-sm"></i>
            <p class="text-sm font-medium">{{ session('error') }}</p>
        </div>
    </div>
@elseif (session()->has('success'))
    {{-- <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
        role="alert">
        <span class="font-medium">{{ session('success') }}</span>
    </div> --}}
    <div class="bg-green-50/90 dark:bg-green-900/30 backdrop-blur-sm border border-green-200/50 dark:border-green-800/50 text-green-700 dark:text-green-300 p-3 mb-4 rounded-xl"
        role="alert">
        <div class="flex items-center">
            <i class="fas fa-check-circle mr-2 text-green-500 text-sm"></i>
            <p class="text-sm font-medium">{{ session('success') }}</p>
        </div>
    </div>
@endif
