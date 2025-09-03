<div>
    <h1>DASHBOARD</h1>

    @if($message = session()->get('message'))
        <div>{{ $message }}</div>
    @endif

    <a href="{{ route('links.create') }}">Criar</a>

    <ul>
        @foreach ($links as $link)
            <li>
                <a href="{{ route('links.edit', $link) }}">{{ $link->name }}</a>
                <span>{{ $link->link }}</span>
                <span>{{ $link->name_plataform }}</span>

                <form action="{{ route('links.destroy', $link) }}" method="post" onsubmit="return confirm('Tem certeza?')">
                    @csrf
                    @method('DELETE')

                    <button>Deletar</button>
                </form>
            </li>
        @endforeach
    </ul>
    
</div>
