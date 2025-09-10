@vite('resources/css/app.css')

<div class="w-screen h-screen bg-black text-gray-200 flex flex-col items-center justify-center">
    @if($message = session()->get('message'))
        <div class="bg-green-700 text-black font-semibold py-2 px-10 rounded-full w-6xl text-center">{{ $message }}</div>
    @endif

    <form 
        action="{{ route('links.create') }}" 
        method="post" enctype="multipart/form-data" 
        class="bg-gray-900 p-3 w-[800px] h-[500px] rounded-2xl"
        >
        @csrf

        <div class="flex items-center justify-between w-full mt-12">
            <div>
                <h1 class="text-white font-semibold text-2xl">Editar link</h1>
                <span class="w-6 h-1 bg-[#ED702D] flex"></span>
            </div>
        </div>

        <div class="flex items-center justify-center gap-16">
            <div class="flex flex-col gap-10 mb-14">
                <div class="flex w-full gap-2">
                    <div class="flex flex-col">
                        <h1 class="text-lg">Título do link</h1>
                        <input 
                            name="name" 
                            placeholder="Digite o nome do conteúdo" 
                            value="{{ old('name', $link->name) }}" 
                            class="bg-gray-500 px-2 py-2 rounded-xl w-[220px]" 
                        />
                        @error('name')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="flex flex-col">
                        <h1 class="text-lg">Plataforma de streaming</h1>
                        <input 
                            name="name_plataform"
                            value="{{ old('name_plataform', $link->name_plataform) }}"
                            placeholder="Onde você está assistindo?" 
                            class="bg-gray-500 px-2 py-2 rounded-xl w-[210px]" 
                        />
                        @error('name_plataform')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="max-w-full flex flex-col">
                    <h1 class="text-lg">URL</h1>
                    <input 
                        name="link" 
                        placeholder="Cole a URL do conteúdo" 
                        value="{{ old('link', $link->link) }}" 
                        class="bg-gray-500 px-2 py-2 rounded-xl w-full"
                    />
                    @error('link')
                        <span>{{ $message }}</span>
                    @enderror
                </div>
            </div>
        <div>

        <div class="flex flex-col items-center gap-2">
            <img 
                src="/storage/{{ $link->photo_link  }}" 
                alt="Profile Picture" 
                class="w-60 h-70 rounded-2xl"
            />

            <div class="flex gap-2">
                <img src="/image/download.svg" alt="" class="w-6 h-6">
                <input type="file" name="photo_link" class="cursor-pointer w-30"/>
            </div>
        </div>

        
        <div class="flex items-center justify-end gap-4 mt-12">
            <a href="{{ route('dashboard') }}" class="hover:text-[#d35410] transition-all">Cancelar</a>
            <button class="w-30 h-10 text-black bg-[#ED702D] rounded-full font-semibold cursor-pointer hover:bg-[#d35410] transition-all">
                Salvar
            </button>
        </div>
    </form>
</div>