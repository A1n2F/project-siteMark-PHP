@vite('resources/css/app.css')

<div class="w-screen h-screen bg-black text-gray-200 flex flex-col items-center justify-center">
    <div class="flex flex-col items-center w-[1000px] h-screen">
        <img src="/image/logo.svg" alt="" class="mt-20">
        
        <div class="flex items-center justify-between w-full my-20">
            <div>
                <h1 class="text-white font-semibold text-2xl">Links</h1>
                <span class="w-6 h-1 bg-[#ED702D] flex"></span>
            </div>

            <div class="flex items-center gap-4">
                <a 
                    href="{{ route('links.create') }}" 
                    class="h-10 px-2 flex items-center text-black bg-[#ED702D] rounded-full font-semibold cursor-pointer hover:bg-[#d35410] transition-all">
                    + Adicionar link
                </a>
                </button>
            </div>
        </div>

        @if($message = session()->get('message'))
            <div class="bg-green-700 text-black font-semibold py-2 px-10 rounded-full w-6xl text-center">{{ $message }}</div>
        @endif

        <ul class="flex flex-col gap-4 w-[1000px]">
            @foreach ($links as $link)
                <li class="flex items-center gap-2">

                    @unless($loop->last)
                        <form action="{{ route('links.down', $link) }}" method="post">
                            @csrf
                            @method('PATCH')

                            <button>
                                <img src="/image/arrowDown.svg" alt="" class="w-6 h-6 cursor-pointer">
                            </button>
                        </form>
                    @endunless

                    @unless($loop->first)
                        <form action="{{ route('links.up', $link) }}" method="post">
                            @csrf
                            @method('PATCH')

                            <button>
                                <img src="/image/arrowUp.svg" alt="" class="w-6 h-6 cursor-pointer">
                            </button>
                        </form>
                    @endunless

                    <div class="bg-gray-600 flex items-center justify-between gap-3 w-full px-4 py-2 rounded-2xl">
                        <div class="flex items-center gap-3">
                            <img src="/storage/{{ $link->photo_link }}" alt="Link Image" class="w-18 h-20 rounded-2xl" />
                            <div class="flex flex-col gap-2">
                                <div class="flex items-center gap-2">
                                    <h1 class="text-xl font-semibold">{{ $link->name }}</h1>
                                    <span class="bg-blue-300 px-2 rounded-2xl font-semibold text-black">{{ $link->name_plataform }}</span>
                                </div>
                                <span>{{ $link->link }}</span>
                            </div>
                        </div>

                        <div class="flex items-center gap-2">
                            <form action="{{ route('links.destroy', $link) }}" method="post" onsubmit="return confirm('Tem certeza?')">
                                @csrf
                                @method('DELETE')

                                <button>
                                    <img 
                                        src="/image/trash.svg" 
                                        alt="" 
                                        class="w-12 h-12 cursor-pointer hover:bg-[#ED702D] hover:mr-2 rounded-full transition-all">
                                </button>
                            </form>

                            <div>
                                <a href="{{ route('links.edit', $link) }}">
                                    <img src="/image/edit.svg" alt="" class="w-6 h-6 hover:bg-[#ED702D] hover:w-10 hover:h-10 hover:p-2 rounded-full transition-all">
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>

        <div class="flex items-center justify-center mt-20 border border-gray-500 rounded-full gap-6 py-4 px-5">
            <a href="{{ route('dashboard') }}" class="hover:bg-[#ED702D] w-10 h-10 flex items-center justify-center rounded-full transition-all">
                <img src="/image/list2.svg" alt="" class="w-20 h-20"/>
            </a>

            <a href="{{ route('profile') }}" class="hover:bg-[#ED702D] w-10 h-10 flex items-center justify-center rounded-full transition-all">
                <img src="/image/user2.svg" alt="" class="w-10 h-10"/>
            </a>

            <a href="{{ route('logout') }}" class="hover:bg-[#ED702D] w-10 h-10 flex items-center justify-center rounded-full transition-all">
                <img src="/image/logout.svg" alt="" class="w-6 h-6"/>
            </a>
        </div>
    </div>
</div>
