<table class="table">
    <thead>
        <tr>
            <th>Rank</th>
            <th>Url</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($urls as $url)
        <tr> 
            <td>{{ $url->rank }}</td>
            <td><a href="{{ $url->value }}" target="_blank">{{ $url->value }} </a></td>
        </tr>
        @endforeach  
    </tbody>
</table>

{!! $urls->render() !!}