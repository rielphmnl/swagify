@props([
    'name' => 'required'
])

@error($name)
    <p class="text-red-700 text-xs">{{ $message }}</p>
@enderror