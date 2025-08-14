<div>
    <h1>LOGIN</h1>

    <form action="/login" method="post">
        @csrf

        <input name="email" placeholder="Email" value="{{ old('email') }}" />
        <input type="password" name="password" placeholder="Senha" />

        <button>Logar</button>
    </form>
</div>
