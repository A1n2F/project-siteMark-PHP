<div>
    <h1>DASHBOARD</h1>

    @if($message = session()->get('message'))
        <div>{{ $message }}</div>
    @endif

    <ul>
        @foreach ($links as $link)
            <li>
                <a href="{{ route('links.edit', $link) }}">{{ $link->name }}</a>
                <span>{{ $link->link }}</span>
                <span>{{ $link->name_plataform }}</span>
            </li>
        @endforeach
    </ul>
    
</div>
