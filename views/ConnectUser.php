<?php if (!empty($content) && isset($content["view"])): ?>
    <form action="/?c=connectUser" method="post" class="signin flex flex-col items-center justify-center">
        <h1 class="text-center text-6xl font-bold mb-4">Créer un compte</h1>
        <input type="hidden" name="action" value="create">
        <div class="flex justify-center items-center flex-col gap-4">
            <div class="flex justify-start flex-col max-w-md gap-2">
                <label for="name">Nom</label>
                <input type="text" name="name" id="name"
                       class="px-2 py-1 border border-gray-300 rounded-full focus:border-black">
            </div>
            <div class="flex justify-start flex-col max-w-md gap-2">
                <label for="user">Nom d'utilisateur</label>
                <input type="text" name="user" id="user"
                       class="px-2 py-1 border border-gray-300 rounded-full focus:border-black">
            </div>
            <div class="flex justify-start flex-col max-w-md gap-2">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required
                       class="px-2 py-1 border border-gray-300 rounded-full focus:border-black">
            </div>
            <div class="flex justify-start flex-col max-w-md gap-2">
                <label for="pass">Mot de passe</label>
                <input type="password" name="pass" id="pass" required
                       class="px-2 py-1 border border-gray-300 rounded-full focus:border-black">
            </div>
            <button type="submit"
                    class="mx-auto block px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-black rounded-full shadow ripple waves-light hover:shadow-lg focus:outline-none hover:bg-black mb-8">
                S'inscrire
            </button>
        </div>
    </form>
<?php else: ?>
    <form action="/?c=connectUser" method="post" class="login flex flex-col items-center justify-center">
        <h1 class="text-center text-6xl font-bold mb-4">Se connecter</h1>
        <input type="hidden" name="action" value="connect">
        <div class="flex justify-center items-center flex-col gap-4">
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
        <a href="?c=connectUser&view=signin" class="w-64 flex justify-center text-center opacity-50 hover:underline">Pas
            de compte ? Créer un compte</a>
    </form>
<?php endif; ?>
