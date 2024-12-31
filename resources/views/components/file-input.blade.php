<!-- resources/views/components/file-input.blade.php -->
@props(['disabled' => false])

<input type="file" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-file-input mt-1 block w-full']) !!}>
