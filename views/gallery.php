<?php
//var_dump($content);
foreach ($content as $gallery): ?>
    <h1 class="text-center font-bold text-6xl mb-4"><?= $gallery->name ?></h1>
<p class="text-center mb-8">
    <?= count($gallery->images) ?>&nbsp;photo(s) par
    <a href="?c=user&id=<?= $gallery->user[0]->_id ?>">
        <?= $gallery->user[0]->username ?>
    </a>
</p>
    <div class="swiper-container w-full md:w-9/12">
        <div class="swiper-wrapper">
            <?php foreach ($gallery->images as $image): ?>
                <div class="swiper-slide">
                    <img class="w-full object-contain" src="public/img/<?= $image ?>" alt="Image de la galerie <?= $gallery->name ?>"/>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="slider-nav-prev"><i class="bi bi-arrow-left-circle-fill"></i></div>
        <div class="slider-nav-next"><i class="bi bi-arrow-right-circle-fill"></i></div>
        <div class="swiper-scrollbar"></div>
    </div>
<?php endforeach; ?>

