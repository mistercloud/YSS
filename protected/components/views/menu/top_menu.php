<ul id="header_top_menu">
    <? foreach ($aMenuItems as $oLink){ ?>
        <li><a class="FFFFFF antilink" href="<?= $oLink->url ?>"><?= $oLink->title ?></a></li>
    <? } ?>
</ul>