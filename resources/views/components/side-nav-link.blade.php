@props(['active' => false])
<li>
    <a {{ $attributes }} class="{{ $active ? 'bg-design-primary text-design-secondary' : 'text-design-secondary hover:bg-gray-100'}} flex items-center p-2 rounded-lg dark:text-white dark:hover:bg-gray-700 group" aria-current="{{ $active ? 'page' : false }}">
       <span class="ms-3">{{ $slot }}</span>
    </a>
</li>