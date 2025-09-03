<div>
    <h1>EDITAR UM LINK :: {{ $link->id }}</h1>

    @if($message = session()->get('message'))
        <div>{{ $message }}</div>
    @endif

    <form action="{{ route('links.edit', $link) }}" method="post">
        @csrf
        @method('put')

        <div>
            <input name="link" placeholder="Link" value="{{ old('link', $link->link) }}" />
            @error('link')
                <span>{{ $message }}</span>
            @enderror
        </div>
        
        <br>
        
        <div>
            <input name="name" placeholder="Name" value="{{ old('name', $link->name) }}" />
            @error('name')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <br>

        <div>
            <input name="name_plataform" placeholder="Name Plataform" value="{{ old('name_plataform', $link->name_plataform) }}" />
            @error('name_plataform')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <br>

        <div>
            <input name="image" placeholder="Image" type="file"/>
            @error('image')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <br>

        <button>Salvar</button>
    </form>
</div>
