<div>
    <label for="{{ $id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $label }}</label>
    <select id="{{ $id }}" name="{{ $name }}" class="@error($name) is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-design-primary focus:border-design-primary block w-full p-2.5">
        <option value="">{{ $placeholder }}</option>
        @foreach ($options as $option)
            <option value="{{ $option->id }}">{{ $option->name }}</option>
        @endforeach
        @error($name)
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </select>
</div>