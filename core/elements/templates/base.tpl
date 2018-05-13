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
                    {block 'CONTAINER'}
                    {/block}
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