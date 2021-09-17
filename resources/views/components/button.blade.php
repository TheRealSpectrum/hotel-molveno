<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-centerinline-block text-sm px-8 py-3 bg-blue-500 leading-none border rounded-lg text-white border-blue hover:border-transparent hover:text-teal-500 hover:bg-gray-400 mt-4 lg:mt-0']) }}>
    {{ $slot }}
</button>
