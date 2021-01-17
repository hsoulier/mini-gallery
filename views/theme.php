<h1 class="text-center text-6xl font-bold mb-8">Galerie de photos</h1>
<?php foreach ($content as $theme): ?>
    <div class="theme mb-16">
        <h2 class="text-4xl mb-4">Theme <?= $theme->name ?></h2>
        <?php foreach ($theme->themeGallery as $gallery): ?>
            <div class="mb-8">
                <div class="flex justify-between mb-4">
                    <h3 class="text-2xl">Galerie <?= $gallery->name ?></h3>
                    <a href="?c=gallery&id=<?= $gallery->_id ?>">Voir la galerie</a>
                </div>
                <?php if (count($gallery->images) >= 4): ?>
                    <div class="grid grid-flow-col grid-cols-2 grid-rows-2 gap-4">
                        <?php for ($i = 0; $i < 4; $i++): ?>
                            <div class="max-h-52">
                                <img class="h-full w-full object-cover" src="public/img/<?= $gallery->images[$i] ?>"
                                     alt="Image de la galerie <?= $gallery->name ?>">
                            </div>
                        <?php endfor; ?>
                    </div>
                <?php else: ?>
                    <div class="flex flex-wrap">
                        <?php foreach ($gallery->images as $img): ?>
                            <div class="max-h-52 w-1/2 p-2">
                                <img class="h-full w-full object-cover" src="public/img/<?= $img ?>"
                                     alt="Image de la galerie <?= $gallery->name ?>">
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>

    </div>
<?php endforeach; ?>
