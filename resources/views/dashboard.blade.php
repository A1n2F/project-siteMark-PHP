<div>
    <h1>DASHBOARD</h1>
    <h2>User {{ auth()->user()->name }} :: {{ auth()->id() }}</h2>
    <a href="{{ route('profile') }}">Atualizar Profile</a>

    @if($message = session()->get('message'))
        <div>{{ $message }}</div>
    @endif

    <a href="{{ route('links.create') }}">Criar</a>

    <ul>
        @foreach ($links as $link)
            <li style="display:flex">

                @unless($loop->last)
                    <form action="{{ route('links.down', $link) }}" method="post">
                        @csrf
                        @method('PATCH')

                        <button>Down</button>
                    </form>
                @endunless

                @unless($loop->first)
                    <form action="{{ route('links.up', $link) }}" method="post">
                        @csrf
                        @method('PATCH')

                        <button>Up</button>
                    </form>
                @endunless

                <a href="{{ route('links.edit', $link) }}">{{ $link->id }}. {{ $link->name }}</a>
                <span>{{ $link->link }}</span>
                <span>{{ $link->name_plataform }}</span>

                <img src="/storage/{{ $link->photo_link }}" alt="Link Image" />

                <form action="{{ route('links.destroy', $link) }}" method="post" onsubmit="return confirm('Tem certeza?')">
                    @csrf
                    @method('DELETE')

                    <button>Deletar</button>
                </form>
            </li>
        @endforeach
    </ul>
    
</div>
