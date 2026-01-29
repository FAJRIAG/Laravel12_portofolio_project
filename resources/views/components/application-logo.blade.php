<div class="text-xl font-bold text-gray-800 dark:text-gray-200 tracking-tight" {{ $attributes }}>
    {{ \App\Models\About::first()->logo_text ?? 'JriDev.' }}
</div>