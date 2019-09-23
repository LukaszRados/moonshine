<article class='boat-specs'>
    <div class='boat-specs__body'>
        <h2>
            {{ __('messages.specs.header.line_1') }}<br>
            {{ __('messages.specs.header.line_2') }}<br>
            {{ __('messages.specs.header.line_3') }}
        </h2>
        @isset($include_description)
            <p class='boat-specs__text'>{{ __('messages.specs.body') }}</p>
        @endisset
        <table>
            @foreach (__('messages.specs.table') as $row) 
                <tr>
                    <td>{{ $row['title'] }}</td>
                    <td>{{ $row['value'] }}</td>
                </tr>
            @endforeach
        </table>
        @isset($include_link)
            <p class='boat-specs__link'><a href='{{ route('boat') }}'>{{ __('messages.specs.more') }}</a></p>
        @endisset
    </div>
    <div class='boat-specs__figure'>
        <img src='{{ asset('img/jeanneau-36.jpg') }}' alt='Moonshine - Plan'>
    </div>
</article>
