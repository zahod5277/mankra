<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> data-url="<?php echo esc_url( Iron_sonaar::getField('video_url',$post->ID) ); ?>">
    <header class="entry-header">
        <?php the_title( '<h1 class="sr_it-videolist-item-title"><i class="fa fa-play"></i>', '</h1>' ); ?>
    <header class="entry-header">
    <div class="entry-content">
        <div class="sr_it-videolist-item-artist">
        <?php
        $artistList = Iron_sonaar::getField('artist_of_video',$post->ID);
        if( $artistList != NULL){
            $artistNameList = array();
            foreach($artistList as $artistName) {
                array_push($artistNameList, get_the_title($artistName ));
            }
            $artistNameList = implode(', ', $artistNameList);
            echo wp_kses_post( $artistNameList ) ;
        }
        ?>
        </div>
        <div class="sr_it-videolist-item-date">
            <?php the_time('F j, Y'); ?>
        </div>
    </div>
</article>
