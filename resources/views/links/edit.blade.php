<div>
    <h1>EDITAR UM LINK :: {{ $link->id }}</h1>

    @if($message = session()->get('message'))
        <div>{{ $message }}</div>
    @endif

    <form action="{{ route('links.edit', $link) }}" method="post" enctype="multipart/form-data">
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

        <!-- <div>
            <input name="image" type="file"/>
        </div> -->

        <div>
            <img src="/storage/{{ $link->photo_link  }}" alt="Profile Picture" />
            <input type="file" name="photo_link" />
        </div>

        <br>

        <a href="{{ route('dashboard') }}">Cancelar</a>

        <br>

        <button>Salvar</button>
    </form>
</div>
