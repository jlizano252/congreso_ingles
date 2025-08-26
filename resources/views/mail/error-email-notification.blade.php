<style>
    * { font-family: "Nunito", sans-serif; font-size: 12px; }
    h4 { font-weight: bold; color: #1b5464; margin: 0; font-size: 1.1em }
    p { color: #1d232a; line-height: 2; margin: 0}
</style>

<h4>Message:</h4>
@if( is_array($error) )
    @foreach($error as $row)
        {{ $row }}
    @endforeach
@else
    {{ $error }}
@endif
