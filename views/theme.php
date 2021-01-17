<h1 class="text-center text-6xl font-bold">Galerie de photos</h1>
<h2 class="text-4xl">les dernières galeries</h2>
<?php foreach ($content as $theme): ?>
    <div class="theme">
        <h3 class="text-2xl"><?= $theme->name ?></h3>
        <?php foreach ($theme->themeGallery as $gallery): ?>
            <div class="flex justify-between">
                <h4>Galerie <?= $gallery->name ?></h4>
                <a href="?c=gallery&id=<?= $gallery->_id ?>">Voir la galerie</a>
            </div>
            <div class="grid grid-flow-col grid-cols-2 grid-rows-2 gap-4">
                <?php foreach ($gallery->images as $img): ?>
                    <img src="public/img/<?= $img ?>" alt="Image de la galerie <?= $gallery->name ?>">
                <?php endforeach; ?>
            </div>
            <pre>
            <?php var_dump($gallery); ?>
        </pre>
        <?php endforeach; ?>

    </div>
<?php endforeach; ?>
