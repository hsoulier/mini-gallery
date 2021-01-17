<form action="/" method="post" class="flex flex-col items-center justify-center">
    <h1 class="text-center text-6xl font-bold mb-4">Se connecter</h1>
    <div class="flex justify-center items-center flex-col gap-4">
        <input type="hidden" name="c" value="connectUser">
        <div class="flex justify-start flex-col max-w-md gap-2">
            <label for="email">Email</label>
            <input type="email" name="email" id="email"
                   class="px-2 py-1 border border-gray-300 rounded-full focus:border-black">
        </div>
        <div class="flex justify-start flex-col max-w-md gap-2">
            <label for="pass">Mot de passe</label>
            <input type="password" name="pass" id="pass"
                   class="px-2 py-1 border border-gray-300 rounded-full focus:border-black">
        </div>
        <button type="submit"
                class="mx-auto block px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-black rounded-full shadow ripple waves-light hover:shadow-lg focus:outline-none hover:bg-black mb-8">
            Se connecter
        </button>
    </div>
    <a href="" class="w-64 flex justify-center text-center opacity-50 hover:underline">Pas de compte ? Créer un compte</a>
</form>

