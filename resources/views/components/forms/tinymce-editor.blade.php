<div>
    <textarea id="editorinstance" {!! $attributes->merge(['class' => 'rounded-md shadow-sm border-gray-300']) !!}> {!! $slot ?? '' !!}</textarea>
</div>