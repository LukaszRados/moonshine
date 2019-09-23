<article class='boat-specs'>
    <div class='boat-specs__text'>
        <h2>
            {{ __('messages.specs.header.line_1') }}<br>
            {{ __('messages.specs.header.line_2') }}<br>
            {{ __('messages.specs.header.line_3') }}
        </h2>
        @isset($include_description)
            <p>{{ __('messages.specs.body') }}</p>
        @endisset
        <table>
            @foreach (__('messages.specs.table') as $row) 
                <tr>
                    <td>{{ $row['title'] }}</td>
                    <td>{{ $row['value'] }}</td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class='boat-specs__figure'>
        <img src='{{ asset('img/jeanneau-36.jpg') }}' alt='Moonshine - Plan'>
    </div>
</article>
