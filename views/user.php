<?php foreach ($content as $user): ?>
    <h1 class="text-center text-6xl font-bold uppercase">Galerie(s) de <?= $user->username ?></h1>
    <button
            class="btn-new-gallery mt-4 mx-auto block px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-black rounded-full shadow ripple waves-light hover:shadow-lg focus:outline-none hover:bg-black">
        Créer une nouvelle
    </button>
    <div class="galleries">
        <div class="galleries__container">
            <?php $i = 1;
            foreach ($user->userGalleries as $gallery): ?>
                <div class="galleries__gallery gallery-<?= $i ?>">
                    <h4 class="text-2xl"><?= $gallery->name ?></h4>
                    <div class="galleries__grid">
                        <?php foreach ($gallery->images as $img): ?>
                            <img src="public/img/<?= $img ?>" alt="Image de la galerie <?= $gallery->name ?>">
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php $i++;endforeach; ?>
        </div>
    </div>
<?php endforeach; ?>

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