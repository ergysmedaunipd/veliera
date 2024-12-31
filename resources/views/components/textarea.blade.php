<!-- resources/views/components/textarea.blade.php -->
@props(['disabled' => false])

<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-textarea mt-1 block w-full']) !!}>{{ $slot }}
</textarea>
