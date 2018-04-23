<!DOCTYPE html>
<html lang="ru-RU">

<head>
{include 'file:chunks/common/head.tpl'}
</head>

<body class="home page-template-default page page-id-10 lang-ru-RU layout-wide fixed_header _studio wpb-js-composer js-comp-ver-5.4.7 vc_responsive">
    <div id="overlay">
        <div class="perspective"></div>
    </div>
    {include 'file:chunks/common/nav.tpl'}
    <div id="pusher-wrap">

        <div id="pusher" class="menu-type-classic-menu">
            <div class="pjax-container">
                <div id="wrapper" class="wrapper">
                    <!-- container -->
                    <div class="container">
                        <article id="post-10" class="sr_it-single-post post-10 page type-page status-publish hentry">
                            <div class="entry">
                               {include 'file:chunks/main/slider.tpl'}
                               {include 'file:chunks/main/mainServices.tpl'}
                               {include 'file:chunks/main/welcome.tpl'}
                               {include 'file:chunks/main/studios.tpl'}
                               {include 'file:chunks/main/clients.tpl'}
                            <div class="vc_row-full-width vc_clearfix"></div>
                            </div>

                            <div id="comments" class="comments-area">

                            </div>
                        </article>
                    </div>
                </div>
                {include 'file:chunks/common/footer.tpl'}
            </div>
        </div>
    </div>
    <!--</div>-->
    {include 'file:chunks/common/footerScriptsStyles.tpl'}
    <a href="#" id="back-to-top-mobile" class="footer-wrapper-backtotop-mobile">
        <i class="fa fa-chevron-up"></i>
    </a>
    <a href="#" id="back-to-top" class="footer-wrapper-backtotop">
        <i class="fa fa-chevron-up"></i>
    </a>
</body>

</html>