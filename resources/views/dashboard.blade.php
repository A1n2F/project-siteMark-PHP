<div>
    <h1>DASHBOARD</h1>

    <ul>
        @foreach ($links as $link)
            <li>
                <a href="/links/{{ $link->id }}">{{ $link->name }}</a>
                <span>{{ $link->link }}</span>
                <span>{{ $link->name_plataform }}</span>
            </li>
        @endforeach
    </ul>
    
</div>
