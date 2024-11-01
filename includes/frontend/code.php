<?php
function ws_sharebar_add_style_to_head(){ ?>
    <style>
        #ws-sharebar {
            position: fixed;
            top: <?php echo get_option('ws_sharebar_margin_top'); ?>%;
            left: <?php echo get_option('ws_sharebar_margin_left'); ?>px;
            border: 3px solid #F7F7F7;
            background: #FFF;
            padding: 15px;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
            padding-top: 20px;
            z-index: 1000000;
        }
        #ws-sharebar .ws_sharebar_buttons{
            margin-bottom: 10px;
        }
        #ws-sharebar .ws_sharebar_buttons:last-child{
            margin-bottom: 0px;
        }
        #ws-sharebar:before{
            content: ' ';
            position: absolute;
            background: url(<?php echo WS_SHAREBAR_URL; ?>/images/share.png) no-repeat;
            width: 30px;
            height: 30px;
            background-size: 30px;
            background-position: center;
            top: -16px;
            left: 26px;
            opacity: 0.3;
            transition: all 0.4s ease-in-out;
        }
        #ws-sharebar:hover:before{
            opacity: 0.4;
        }
        #ws-sharebar .fb_iframe_widget{
            margin-left: 3px!important;
        }
        #ws-sharebar .fb-like{
            margin-left: 8px!important;
        }
        #ws-sharebar #___plusone_0{
            margin-left: 6px!important;
        }
        #ws-sharebar #pinterest{
            margin-left: 10px;
        }
    </style>

    <?php
}

function ws_sharebar_add_code() {

    global $wp;
    $ws_sharebar_page_url = home_url(add_query_arg(array(),$wp->request));

    ?>
        <div id="ws-sharebar">

            <?php if(get_option('ws_sharebar_fb_like') == true): ?>
            <div class="ws_sharebar_buttons">
                <script src='http://connect.facebook.net/en_US/all.js#xfbml=1'></script><fb:like layout='box_count' show_faces='false' font=''></fb:like>
            </div>
            <?php endif; ?>

            <?php if(get_option('ws_sharebar_fb_share') == true): ?>
            <div class="ws_sharebar_buttons">
                <div class="fb-share-button" data-href="<?php echo $ws_sharebar_page_url; ?>" data-layout="box_count"></div>
            </div>
            <?php endif; ?>

            <?php if(get_option('ws_sharebar_tweet') == true): ?>
            <div class="ws_sharebar_buttons">
                <a href='http://twitter.com/share' class='twitter-share-button' data-count='vertical' >Tweet</a><script src='http://platform.twitter.com/widgets.js' type='text/javascript'></script>
            </div>
            <?php endif; ?>

            <?php if(get_option('ws_sharebar_linkedin') == true): ?>
                <div class="ws_sharebar_buttons">
                    <script src='//platform.linkedin.com/in.js' type='text/javascript'>
                        lang: en_US
                    </script>
                    <script type='IN/Share' data-counter='top'></script>
                </div>
            <?php endif; ?>

            <?php if(get_option('ws_sharebar_google_plus') == true): ?>
            <div class="ws_sharebar_buttons">
                <script type='text/javascript' src='https://apis.google.com/js/plusone.js'></script><g:plusone size='tall'></g:plusone>
            </div>
            <?php endif; ?>

            <?php if(get_option('ws_sharebar_pinterest') == true): ?>
            <div class="ws_sharebar_buttons">
                <div class='sbutton' id='pinterest'><a target='_blank' href='//www.pinterest.com/pin/create/button/?url=<?php echo $ws_sharebar_page_url; ?>&media=<?php if (has_post_thumbnail( $post->ID ) ): ?><?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), ‘single-post-thumbnail’ ); ?><?php echo $image[0]; ?><?php endif; ?>&description=<?php the_title(); ?>' data-pin-do='buttonPin' data-pin-config='above'><img src='//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_gray_20.png' /></a></div>
            </div>
            <?php endif; ?>

        </div>

        <?php
    }

?>