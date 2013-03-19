<ul>
    <? foreach ($aMenuItems as $oLink){ ?>
        <li><a href="<?= $oLink->url ?>"><?= $oLink->title ?></a></li>
    <? } ?>
</ul>