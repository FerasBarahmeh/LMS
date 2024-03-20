@props(['height' => 200,])

@push('css')
    <style>
        .ck-editor__editable {
            height: {{ $height }}px !important;
        }
    </style>
@endpush


<textarea {{ $attributes['id'] ?? 'editor' }}  {!! $attributes->merge(['class' =>'']) !!}>{{ $slot }}</textarea>
@push('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/41.2.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#'+@js($attributes['id']) ), {
                toolbar: {
                    items: [
                        'undo', 'redo',
                        '|', 'heading',
                        '|', 'bold', 'italic',
                        '|', 'link', 'blockQuote',
                        '|', 'bulletedList', 'numberedList', 'todoList', 'outdent', 'indent'
                    ],
                    shouldNotGroupWhenFull: true,
                },
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endpush
