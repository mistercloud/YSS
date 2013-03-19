<div class="news one_new">
    <?php if ($type == 'story' ): ?>
    <span class="title"><?php print $sTermDesc; ?></span>
    <div class="hr"></div>

    <ul id="news_navigator">
        <?php foreach ($aChildren as $aChild): ?>
        <li>
            <?php if ($aChild->tid == $aTerm[$node->vid]['tid']){
            print $aChild->name;
        } else {
            $output ='';
            $output .='<a href="';
            $output .='/'.drupal_get_path_alias(taxonomy_term_path($aChild));
            $output .='" class="c6c6b6a antilink">';
            $output .=$aChild->name;
            $output .='</a></li>';
            print $output;
        }
            ?>
        </li>
        <?php endforeach; ?>
    </ul>

    <div class="hr p15"></div>
    <?php endif; ?>
    <div class="list">
        <div class="elem">
            <div class="inner">
                <p class="title"><h1><?- $oNews->title ?></h1></p>

                <div class="hr p5"></div>
                <span class="c6c6b6a">(<?php //@TODO вставить дату ?>) | </span><a href="<?= $sTermUrl?>"><?= $sTermName?></a>
					<span class="tweet_btn">
						<a href="http://twitter.com/share"  data-url="http://macov.net<?php print $node_url ?>" class="twitter-share-button" data-count="horizontal">Tweet</a>
						<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
					</span>
					<span class="facebook_like" >
						<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>
						<fb:like href="" show_faces="false" width="300" font=""></fb:like>
					</span>
                <div class="hr"></div>
                <div class="description">
                    <?= $oNews->content ?>
                </div>
                <div id="disqus_thread"></div>

            </div>
        </div>
    </div>
</div>