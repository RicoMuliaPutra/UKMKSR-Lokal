@props(['disabled' => false])
<input
    @disabled($disabled)
    {{
        $attributes->merge([
            'class' => '
                w-96 h-12
                border border-gray-400
                dark:border-gray-600
                bg-white dark:bg-white
                text-gray-800 dark:text-black text-bold
                focus:border-indigo-500 dark:focus:border-indigo-600
                focus:ring focus:ring-indigo-200 dark:focus:ring-indigo-600
                rounded-md shadow-sm
            '
        ])
    }}
>

