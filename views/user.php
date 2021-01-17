<?php foreach ($content as $user): ?>
    <h1 class="text-center text-6xl font-bold mb-4">Bienvenue <?= $user->username ?></h1>
    <?php if (isset($_SESSION["user"])): ?>
        <button
                class="btn-new-gallery mx-auto block px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-black rounded-full shadow ripple waves-light hover:shadow-lg focus:outline-none hover:bg-black mb-8">
            Créer une nouvelle
        </button>
    <?php else: ?>
        <a href="?c=connectUser"
           class="flex justify-center w-48 mx-auto px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-black rounded-full shadow ripple waves-light hover:shadow-lg focus:outline-none hover:bg-black mb-8">
            Se connecter
        </a>
    <?php endif; ?>
    <div class="galleries">
        <div class="galleries__container">
            <?php $i = 1;
            foreach ($user->userGalleries as $gallery): ?>
                <div class="mb-16 gallery-<?= $i ?>">
                    <h4 class="text-2xl mb-4"><?= $gallery->name ?></h4>
                    <div class="flex flex-wrap items-center">
                        <?php foreach ($gallery->images as $img): ?>
                            <div class="max-h-96 w-1/2 p-2 overflow-hidden">
                                <img class="h-full w-full object-contain" src="public/img/<?= $img ?>"
                                     alt="Image de la galerie <?= $gallery->name ?>">
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php $i++;endforeach; ?>
        </div>
    </div>
<?php endforeach; ?>

<?php if (isset($_SESSION)): ?>
    <div class="create-new-gallery fixed bottom-0 right-0 mr-8 mb-12 w-4/5 md:w-96 hidden">
        <form method="post" action="" enctype="multipart/form-data"
              class="dropzone flex flex-col gap-2 bg-white rounded-lg shadow-md px-4 py-2 border-1 border-gray-400">
            <label for="name">Nom de la galerie</label>
            <input type="text" name="name" id="name" class="border rounded-sm px-1" value="Test">
            <label for="desc">Description de la galerie</label>
            <textarea
                    name="description"
                    id="desc"
                    cols="30"
                    rows="4"
                    class="border rounded-sm px-1"
            >Test de description</textarea>
            <input name="files[]" type="file" multiple/>
            <button type="submit" class="bg-black text-white font-bold justify-center rounded-sm flex py-1">Créer ma
                galerie
            </button>
        </form>
    </div>
<?php endif; ?>