@vite('resources/css/app.css')

<div class="w-screen h-screen bg-black text-gray-200 flex flex-col items-center justify-center">
    <div class="flex flex-col items-center w-screen h-full py-10 px-52">
        <img src="/image/logo.svg" alt="">

        @if($message = session('message'))
            <div class="bg-green-700 text-black font-semibold py-2 px-10 rounded-full w-6xl text-center">{{ $message }}</div>
        @endif

        <form action="{{ route('profile') }}" method="post" enctype="multipart/form-data" class="w-6xl">
            @csrf
            @method('PUT')

            <div class="flex items-center justify-between w-full my-12">
                <div>
                    <h1 class="text-white font-semibold text-2xl">Perfil</h1>
                    <span class="w-6 h-1 bg-[#ED702D] flex"></span>
                </div>

                <div class="flex items-center gap-4">
                    <a href="{{ route('dashboard') }}" class="hover:text-[#d35410] transition-all">Cancelar</a>
                    <button class="w-30 h-10 text-black bg-[#ED702D] rounded-full font-semibold cursor-pointer hover:bg-[#d35410] transition-all">
                        Salvar
                    </button>
                </div>
            </div>

            <div class="flex items-center justify-between gap-10 mt-30">
                <div class="w-full flex flex-col gap-5">
                    <div class="flex flex-col w-full">
                        <span class="text-lg text-white mb-2">Nome</span>
                        <input 
                        name="name" 
                        placeholder="Seu nome" 
                        value="{{ old('name', $user->name) }}" 
                        class="px-2 py-3 bg-gray-700 text-gray-200 rounded-xl" 
                        />
                        @error('name')
                        <span class="text-red-400">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="flex flex-col w-full">
                        <span class="text-lg text-white mb-2">E-mail</span>
                        <input 
                        name="email"
                        placeholder="example@email.com" 
                        value="{{ old('email', $user->email) }}" 
                        class="px-2 py-3 bg-gray-700 text-gray-200 rounded-xl" 
                        />
                        @error('email')
                        <span class="text-red-400">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="flex flex-col w-full">
                        <span class="text-lg text-white mb-2">E-mail</span>
                        <textarea 
                        name="description" 
                        placeholder="Bio" 
                        value="{{ old('email') }}" 
                        class="px-2 py-3 bg-gray-700 text-gray-200 rounded-xl" 
                        >{{ old('description', $user->description) }}</textarea>
                        @error('description')
                        <span class="text-red-400">{{ $message }}</span>
                            @enderror
                        </div>

                    <div class="flex items-center gap-1 w-full">
                        <span class="text-lg text-white mb-2">sitemark.com.br/</span>
                        <input 
                        name="handler"
                        placeholder="@seulink" 
                        value="{{ old('handler', $user->handler) }}" 
                        class="border border-gray-600 text-gray-200 rounded-xl mb-1" 
                        />
                        @error('handler')
                        <span class="text-red-400">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-col items-center gap-2">
                    <img src="/storage/{{ $user->photo }}" alt="Profile Picture" class="rounded-2xl h-72" />

                    <div class="flex gap-2">
                        <img src="/image/download.svg" alt="" class="w-6 h-6">
                        <input type="file" name="photo" class="cursor-pointer"/>
                    </div>
                </div>
            </div>
        </form>

        <div class="flex items-center justify-center mt-40 border border-gray-500 rounded-full gap-6 py-4 px-5">
            <a href="{{ route('dashboard') }}" class="hover:bg-[#ED702D] w-10 h-10 flex items-center justify-center rounded-full transition-all">
                <img src="/image/list.svg" alt="" class="w-6 h-6"/>
            </a>

            <img src="/image/user.svg" alt="" class="w-10 h-10"/>

            <a href="{{ route('logout') }}" class="hover:bg-[#ED702D] w-10 h-10 flex items-center justify-center rounded-full transition-all">
                <img src="/image/logout.svg" alt="" class="w-6 h-6"/>
            </a>
        </div>
    </div>
</div>
