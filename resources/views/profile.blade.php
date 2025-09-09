<div>
    <h1>PROFILE</h1>

    @if($message = session('message'))
        <div>{{ $message }}</div>
    @endif

    <form action="{{ route('profile') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <img src="/storage/{{ $user->photo }}" alt="Profile Picture" />
            <input type="file" name="photo" />
        </div>

        <br>

        <div>
            <input name="name" placeholder="Nome" value="{{ old('name', $user->name) }}" />
            @error('name')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <br>

        <div>
            <input name="email" placeholder="Email" value="{{ old('email', $user->email) }}" />
            @error('email')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <br>

        <div>
            <textarea name="description" placeholder="Bio">{{ old('description', $user->description) }}</textarea>
            @error('description')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <a href="{{ route('dashboard') }}">Cancelar</a>
        
        <br>

        <button>Update</button>
    </form>
</div>
