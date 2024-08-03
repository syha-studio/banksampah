@props([
    'type' => 'text',
    'name',
    'id' => null,
    'label' => null,
    'placeholder' => '',
    'autofocus' => false,
    'not' => null
])

<div>
    <label for="{{ $id }}" class="block mb-2 text-sm font-medium text-design-secondary dark:text-white">{{ $label }}</label>
    <input
        value="{{ old($name) }}"
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $id }}"
        @if($autofocus) autofocus @endif
        class="@error($name) is-invalid @enderror bg-gray-50 border border-gray-300 text-design-secondary text-sm rounded-lg focus:ring-design-primary focus:border-design-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
        placeholder="{{ $placeholder }}" 
        @if(!$not) required @endif>
    @error($name)
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>