@vite('resources/css/app.css')

<div>
    <h1 class="text-red-500">Site Mark</h1>
    <img src="/storage/{{ $user->photo }}" alt="Profile Picture">
    <h2>User {{ $user->name }} :: {{ $user->id }}</h2>
    <h3>{{ $user->description }}</h3>
    <h3>{{ $user->handler }}</h3>

    <ul>
        @foreach ($user->links as $link)
            <li>
                <a href="{{ $link->link }}" target="_blank">{{ $link->id }}. {{ $link->name }}</a>
                <span>{{ $link->link }}</span>
                <span>{{ $link->name_plataform }}</span>

                <img src="/storage/{{ $link->photo_link }}" alt="Link Image" />
            </li>
        @endforeach
    </ul>
    
</div>
