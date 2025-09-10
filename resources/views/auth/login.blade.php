@vite('resources/css/app.css')

<div class="bg-black w-screen h-screen">
    <div class="w-full h-full flex items-center gap-45">
        <img src="/image/thumbnail.png" alt="" class="w-1/2 h-screen p-5">

        <div class="w-xl h-[700px] mb-10">
            <div class="flex flex-col items-center justify-center">
                <img src="/image/logo.svg" alt="">

            <div class="flex flex-col mt-22 w-full px-20">
                <div>
                    <h1 class="text-white font-semibold text-2xl">Acessar conta</h1>
                    <span class="w-6 h-1 bg-[#ED702D] flex"></span>
                </div>

                @if($message = session()->get('message'))
                    <div>{{ $message }}</div>
                @endif

                <form action="{{ route('login') }}" method="post" class="flex flex-col items-center mt-14 gap-8">
                    @csrf

                    <div class="flex flex-col w-full">
                        <span class="text-lg text-white mb-2">E-mail</span>
                        <input 
                            name="email" 
                            placeholder="Email" 
                            value="{{ old('email') }}" 
                            class="px-2 py-3 bg-gray-800 text-gray-200 rounded-xl" 
                        />
                        @error('email')
                            <span class="text-red-400">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-col w-full">
                        <span class="text-lg text-white mb-2">Senha</span>
                        <input 
                            type="password" 
                            name="password" 
                            placeholder="Senha" 
                            class="px-2 py-3 bg-gray-800 text-gray-200 rounded-xl"
                        />
                        @error('password')
                            <span class="text-red-400">{{ $message }}</span>
                        @enderror
                    </div>

                    <button class="mt-24 w-44 h-10 bg-[#ED702D] rounded-full font-semibold cursor-pointer hover:bg-[#d35410] transition-all">
                        Acessar conta
                    </button>

                    <span class="mt-24 text-gray-400">
                        Não tem cadastro? 
                        <a href="{{ route('register') }}" class="text-white font-semibold">Cadastrar</a>
                    </span>
                </form>

                </div>
                </div>
            </div>
    </div>
</div>
