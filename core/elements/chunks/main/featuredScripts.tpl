<script type="text/javascript">
    function eggbfc(winw, resultoption) {
        var lasttop = winw,
                lastbottom = 0,
                smallest = 9999,
                largest = 0,
                samount = 0,
                lamount = 0,
                lastamount = 0,
                resultid = 0,
                resultidb = 0,
                responsiveEntries = [{
                        width: 1400,
                        amount: 3,
                        mmheight: 0
                    }, {
                        width: 1170,
                        amount: 3,
                        mmheight: 0
                    }, {
                        width: 1024,
                        amount: 3,
                        mmheight: 0
                    }, {
                        width: 960,
                        amount: 3,
                        mmheight: 0
                    }, {
                        width: 778,
                        amount: 3,
                        mmheight: 0
                    }, {
                        width: 640,
                        amount: 1,
                        mmheight: 0
                    }, {
                        width: 480,
                        amount: 1,
                        mmheight: 0
                    }];
        if (responsiveEntries != undefined && responsiveEntries.length > 0)
            jQuery.each(responsiveEntries, function (index, obj) {
                var curw = obj.width != undefined ? obj.width : 0,
                        cura = obj.amount != undefined ? obj.amount : 0;
                if (smallest > curw) {
                    smallest = curw;
                    samount = cura;
                    resultidb = index;
                }
                if (largest < curw) {
                    largest = curw;
                    lamount = cura;
                }
                if (curw > lastbottom && curw <= lasttop) {
                    lastbottom = curw;
                    lastamount = cura;
                    resultid = index;
                }
            });
        if (smallest > winw) {
            lastamount = samount;
            resultid = resultidb;
        }
        var obj = new Object;
        obj.index = resultid;
        obj.column = lastamount;
        if (resultoption == "id")
            return obj;
        else
            return lastamount;
    }
    if ("cobbles" == "even") {
        var coh = 0,
                container = jQuery("#esg-grid-54-1");
        var cwidth = container.width(),
                ar = "3:3",
                gbfc = eggbfc(jQuery(window).width(), "id"),
                row = 2;
        ar = ar.split(":");
        var aratio = parseInt(ar[0], 0) / parseInt(ar[1], 0);
        coh = cwidth / aratio;
        coh = coh / gbfc.column * row;
        var ul = container.find("ul").first();
        ul.css({
            display: "block",
            height: coh + "px"
        });
    }
    var essapi_54;
    jQuery(document).ready(function () {
        essapi_54 = jQuery("#esg-grid-54-1").tpessential({
            gridID: 54,
            layout: "cobbles",
            forceFullWidth: "off",
            lazyLoad: "off",
            gridID: "54",
            loadMoreType: "button",
            loadMoreAmount: 12,
            loadMoreTxt: "More Works",
            loadMoreNr: "off",
            loadMoreEndTxt: "No More Items for the Selected Filter",
            loadMoreItems: [
                [2083, [-1, 32]],
                [2086, [-1, 30]],
                [2090, [-1, 30]],
                [2093, [-1, 32]],
                [2098, [-1, 31]],
                [2192, [-1, 31]],
                [1218, [-1, 31]]
            ],
            row: 9999,
            apiName: "essapi_54",
            loadMoreAjaxToken: "7a9e13c64e",
            loadMoreAjaxAction: "Essential_Grid_Front_request_ajax",
            ajaxContentTarget: "ess-grid-ajax-container-",
            ajaxScrollToOffset: "0",
            ajaxCloseButton: "off",
            ajaxContentSliding: "on",
            ajaxScrollToOnLoad: "on",
            ajaxCallbackArgument: "off",
            ajaxNavButton: "off",
            ajaxCloseType: "type1",
            ajaxCloseInner: "false",
            ajaxCloseStyle: "light",
            ajaxClosePosition: "tr",
            space: 20,
            pageAnimation: "fade",
            paginationScrollToTop: "off",
            paginationAutoplay: "off",
            spinner: "spinner-1",
            spinnerColor: "#FFFFFF",
            lightBoxMode: "single",
            lightboxHash: "group",
            lightboxPostMinWid: "75%",
            lightboxPostMaxWid: "75%",
            lightboxSpinner: "off",
            lightBoxFeaturedImg: "off",
            lightBoxPostTitle: "off",
            lightBoxPostTitleTag: "h2",
            lightboxMargin: "0|0|0|0",
            lbContentPadding: "0|0|0|0",
            lbContentOverflow: "auto",
            animSpeed: 400,
            delayBasic: 1,
            mainhoverdelay: 1,
            filterType: "single",
            showDropFilter: "hover",
            filterGroupClass: "esg-fgc-54",
            filterNoMatch: "No Items for the Selected Filter",
            filterDeepLink: "off",
            googleFonts: ['Poppins:300,700', 'Montserrat:400,500,600,700,800'],
            cookies: {
                filter: "on",
                timetosave: "30"
            },
            aspectratio: "3:3",
            responsiveEntries: [{
                    width: 1400,
                    amount: 3,
                    mmheight: 0
                }, {
                    width: 1170,
                    amount: 3,
                    mmheight: 0
                }, {
                    width: 1024,
                    amount: 3,
                    mmheight: 0
                }, {
                    width: 960,
                    amount: 3,
                    mmheight: 0
                }, {
                    width: 778,
                    amount: 3,
                    mmheight: 0
                }, {
                    width: 640,
                    amount: 1,
                    mmheight: 0
                }, {
                    width: 480,
                    amount: 1,
                    mmheight: 0
                }]
        });

        var arrows = true,
                lightboxOptions = {
                    margin: [0, 0, 0, 0],
                    buttons: ["share", "thumbs", "close"],
                    infobar: true,
                    loop: true,
                    slideShow: {
                        "autoStart": false,
                        "speed": 3000
                    },
                    animationEffect: "fade",
                    animationDuration: 500,
                    beforeShow: function (a, c) {
                        if (!arrows) {
                            jQuery("body").addClass("esgbox-hidearrows");
                        }
                        var i = 0,
                                multiple = false;
                        a = a.slides;
                        for (var b in a) {
                            i++;
                            if (i > 1) {
                                multiple = true;
                                break;
                            }
                        }
                        if (!multiple)
                            jQuery("body").addClass("esgbox-single");
                        if (c.type === "image")
                            jQuery(".esgbox-button--zoom").show();
                    },
                    beforeLoad: function (a, b) {
                        jQuery("body").removeClass("esg-four-by-three");
                        if (b.opts.$orig.data("ratio") === "4:3")
                            jQuery("body").addClass("esg-four-by-three");
                    },
                    afterLoad: function () {
                        jQuery(window).trigger("resize.esglb");
                    },
                    afterClose: function () {
                        jQuery("body").removeClass("esgbox-hidearrows esgbox-single");
                    },
                    transitionEffect: "fade",
                    transitionDuration: 366,
                    hash: "group",
                    arrows: true,
                    wheel: false,
                };

        jQuery("#esg-grid-54-1").data("lightboxsettings", lightboxOptions);

    });
</script>