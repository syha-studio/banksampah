@props(['active' => false])
<a {{ $attributes }}
    class="{{ $active ? 'bg-design-primary text-design-secondary' : 'text-design-white hover:bg-gray-500 hover:text-design-white' }} block rounded-md px-3 py-2 text-sm font-medium"
    aria-current="{{ $active ? 'page' : false }}">
    {{ $slot }}
</a>