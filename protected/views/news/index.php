
<? foreach($aNews as $oNews) { ?>
    <div class="elem">
        <div class="inner">
            <p class="title"><a class=" c481D40" href="<?= $this->createUrl('news/item',array('id'=>$oNews->id) ); ?>" title="<?= $oNews->title ?>"><?= $oNews->title ?></a></p>
            <div class="hr p5"></div>
            <span class="c6c6b6a">(<?php  //@TODO вставить дату //print format_date($node->created); ?>) | </span><a href="<?= $sTermUrl?>"><?= $oNews->category->title ?></a>
            <div class="hr"></div>
            <div class="description">
                <?= $oNews->pre_content; ?>
            </div>
            <div class="hr"></div>
            <p class="fs14">
                <a href="<?= $this->createUrl('news/item',array('id'=>$oNews->id) ); ?>" class="c481D40">Подробнее</a>

                <a href="<?= $this->createUrl('news/item',array('id'=>$oNews->id) ); ?>#disqus_thread"> </a>



                    <span class="c6c6b6a">
                    <span class="tweet_btn">
                        <a href="http://twitter.com/share" data-text="<?= $oNews->title ?>" data-url="http://macov.net<?= $this->createUrl('news/item',array('id'=>$oNews->id) ); ?>" class="twitter-share-button" data-count="horizontal">Tweet</a>
                        <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
                    </span>
                    <span class="facebook_like" >
                        <script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>
                        <fb:like href="http://macov.net<?= $this->createUrl('news/item',array('id'=>$oNews->id) ); ?>" show_faces="false" width="300" font=""></fb:like>
                    </span>
            </p>
            <div class="hr"></div>
        </div>
    </div>
<? } ?>

<?$this->widget('CLinkPager', array(
    'pages' => $oPages,
))?>