<input
    type="{{ $type ?? 'text' }}"
    name="{{ $name }}"
    id="{{ $id }}"
    placeholder="{{ $placeholder }}"
    value="{{ old($name) }}"
    {{ $attributes->merge(['class' => 'w-full rounded-xl p-3 border-[1px] border-gray-400"']) }}
>

