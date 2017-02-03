"use strict";
/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) && $("html").addClass("ismobile"), $(document).ready(function () {
    function a(a, b, c) {
        $(a).mCustomScrollbar({
            theme: b,
            scrollInertia: 100,
            axis: "yx",
            mouseWheel: {enable: !0, axis: c, preventDefault: !0}
        })
    }

    if ($("html").hasClass("ismobile") || $(".c-overflow")[0] && a(".c-overflow", "minimal-dark", "y"), $(".navigation__sub")[0] && $("body").on("click", ".navigation__sub > a", function (a) {
            a.preventDefault(), $(this).closest(".navigation__sub").toggleClass("navigation__sub--toggled"), $(this).parent().find("ul").stop().slideToggle(250)
        }), $(".top-search")[0] && ($("body").on("focus", ".top-search__input", function () {
            $(".top-search").addClass("top-search--focused")
        }), $("body").on("click", ".top-menu__trigger > a", function (a) {
            a.preventDefault(), $(".top-search").addClass("top-search--focused"), $(".top-search__input").focus()
        }), $("body").on("click", ".top-search__reset", function () {
            $(".top-search").removeClass("top-search--focused "), $(".top-search__input").val("")
        }), $("body").on("blur", ".top-search__input", function () {
            var a = $(this).val();
            !a.length > 0 && $(".top-search").removeClass("top-search--focused")
        })), $("body").on("click", '[data-mae-target="#notifications"]', function (a) {
            a.preventDefault();
            var b = $(this).data("target");
            $("a[href=" + b + "]").tab("show")
        }), $("#widget-weather__main")[0]) {
        var b;
        $.simpleWeather({
            location: "Austin, TX", woeid: "", unit: "f", success: function (a) {
                var c = '<div class="widget-weather__current clearfix"><div class="widget-weather__icon widget-weather__icon-' + a.code + '"></div><div class="widget-weather__info"><h2>' + a.temp + "&deg;" + a.units.temp + '</h2><div class="widget-weather__region"><span>' + a.city + ", " + a.region + "</span><span>" + a.currently + '</span></div></div></div><ul class="widget-weather__upcoming clearfix"></ul>';
                $("#widget-weather__main").html(c), setTimeout(function () {
                    for (b = 0; b < 5; b++) {
                        var c = '<li class="media"><span class="pull-left widget-weather__icon widget-weather__icon-sm widget-weather__icon-' + a.forecast[b].code + '"></span><span class="pull-right">' + a.forecast[b].high + "/" + a.forecast[b].low + '</span><span class="media-body">' + a.forecast[b].text + "</span></li>";
                        $(".widget-weather__upcoming").append(c)
                    }
                })
            }, error: function (a) {
                $("#widget-weather__main").html("<p>" + a + "</p>")
            }
        })
    }
    if ($(".form-group--float")[0] && ($(".form-group--float").each(function () {
            var a = $(this).find(".form-control").val();
            0 == !a.length && $(this).addClass("form-group--active")
        }), $("body").on("blur", ".form-group--float .form-control", function () {
            var a = $(this).val(), b = $(this).parent();
            0 == a.length ? b.removeClass("form-group--active") : b.addClass("form-group--active")
        })), $(".collapse")[0] && ($(".collapse").on("show.bs.collapse", function (a) {
            $(this).closest(".panel").find(".panel-heading").addClass("active")
        }), $(".collapse").on("hide.bs.collapse", function (a) {
            $(this).closest(".panel").find(".panel-heading").removeClass("active")
        }), $(".collapse.in").each(function () {
            $(this).closest(".panel").find(".panel-heading").addClass("active")
        })), $(".login")[0] && $("body").on("click", ".login__block [data-block]", function (a) {
            a.preventDefault();
            var b = $(this).data("block"), c = $(this).closest(".login__block"), d = $(this).data("bg");
            c.removeClass("toggled"), setTimeout(function () {
                $(".login").attr("data-lbg", d), $(b).addClass("toggled")
            })
        }), $(".action-header__search")[0]) {
        var c;
        $("body").on("click", ".action-header__toggle", function (a) {
            a.preventDefault(), c = $(this).closest(".action-header").find(".action-header__search"), c.fadeIn(300), c.find(".action-header__input").focus()
        }), $("body").on("click", ".action-header__close", function () {
            c.fadeOut(300), setTimeout(function () {
                c.find(".action-header__input").val("")
            }, 350)
        })
    }
    $("input-mask")[0] && $(".input-mask").mask(), $(".color-picker")[0] && $(".color-picker").each(function () {
        var a = $(this).find(".color-picker__value"), b = $(this).find(".color-picker__target");
        b.farbtastic(a)
    }), $(".date-time-picker")[0] && $(".date-time-picker").datetimepicker({
        icons: {
            time: "zmdi zmdi-time",
            date: "zmdi zmdi-calendar",
            up: "zmdi zmdi-chevron-up",
            down: "zmdi zmdi-chevron-down",
            previous: "zmdi zmdi-chevron-left",
            next: "zmdi zmdi-chevron-right",
            today: "zmdi zmdi-screenshot",
            clear: "zmdi zmdi-trash",
            close: "zmdi zmdi-times"
        },
        locale: 'ru'
    }), $(".time-picker")[0] && $(".time-picker").datetimepicker({
        locale: 'ru',
        format: "LT",
        icons: {
            time: "zmdi zmdi-time",
            date: "zmdi zmdi-calendar",
            up: "zmdi zmdi-chevron-up",
            down: "zmdi zmdi-chevron-down",
            previous: "zmdi zmdi-chevron-left",
            next: "zmdi zmdi-chevron-right",
            today: "zmdi zmdi-screenshot",
            clear: "zmdi zmdi-trash",
            close: "zmdi zmdi-times"
        }
    }), $(".date-picker")[0] && $(".date-picker").datetimepicker({
        locale: 'ru',
        format: "DD/MM/YYYY",
        icons: {
            time: "zmdi zmdi-time",
            date: "zmdi zmdi-calendar",
            up: "zmdi zmdi-chevron-up",
            down: "zmdi zmdi-chevron-down",
            previous: "zmdi zmdi-chevron-left",
            next: "zmdi zmdi-chevron-right",
            today: "zmdi zmdi-screenshot",
            clear: "zmdi zmdi-trash",
            close: "zmdi zmdi-times"
        }
    }), $(".datetime-picker-inline")[0] && $(".datetime-picker-inline").datetimepicker({
        inline: !0,
        sideBySide: !0,
        icons: {
            time: "zmdi zmdi-time",
            date: "zmdi zmdi-calendar",
            up: "zmdi zmdi-chevron-up",
            down: "zmdi zmdi-chevron-down",
            previous: "zmdi zmdi-chevron-left",
            next: "zmdi zmdi-chevron-right",
            today: "zmdi zmdi-screenshot",
            clear: "zmdi zmdi-trash",
            close: "zmdi zmdi-times"
        },
        locale: 'ru'
    }), $(".tab-wizard")[0] && $(".tab-wizard").bootstrapWizard({
        tabClass: "tab-wizard__nav",
        nextSelector: ".tab-wizard__next",
        previousSelector: ".tab-wizard__previous",
        firstSelector: ".tab-wizard__first",
        lastSelector: ".tab-wizard__last"
    }), $(".lightbox")[0] && $(".lightbox").lightGallery({enableTouch: !0}), $('[data-toggle="tooltip"]')[0] && $('[data-toggle="tooltip"]').tooltip(), $('[data-toggle="popover"]')[0] && $('[data-toggle="popover"]').popover(), $("html").hasClass("ie9") && $("input, textarea").placeholder({customClass: "ie9-placeholder"}), $("select.select2")[0] && $("select.select2").select2({
        dropdownAutoWidth: !0,
        width: "100%"
    }), $(".textarea-autosize")[0] && autosize($(".textarea-autosize"))
}), $(document).ready(function () {
    function a(a) {
        a.requestFullscreen ? a.requestFullscreen() : a.mozRequestFullScreen ? a.mozRequestFullScreen() : a.webkitRequestFullscreen ? a.webkitRequestFullscreen() : a.msRequestFullscreen && a.msRequestFullscreen()
    }

    var b, c = $("body");
    $(this);
    c.on("click", "[data-mae-action]", function (d) {
        d.preventDefault();
        var e = $(this).data("mae-action");
        switch (e) {
            case"block-open":
                b = $(this).data("mae-target"), $(b).addClass("toggled"), c.addClass("block-opened"), c.append('<div data-mae-action="block-close" data-mae-target="' + b + '" class="mae-backdrop mae-backdrop--sidebar" />');
                break;
            case"block-close":
                $(b).removeClass("toggled"), c.removeClass("block-opened"), $(".mae-backdrop--sidebar").remove();
                break;
            case"fullscreen":
                a(document.documentElement);
                break;
            case"print":
                window.print();
                break;
            case"clear-localstorage":
                swal({
                    title: "Are you sure?",
                    text: "This can not be undone!",
                    type: "warning",
                    showCancelButton: !0,
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "Yes, clear it",
                    cancelButtonText: "No, cancel"
                }).then(function () {
                    localStorage.clear(), swal("Cleared!", "Local storage has been successfully cleared", "success")
                })
        }
    })
});

function $_GET(key) {
    var s = window.location.search;
    s = s.match(new RegExp(key + '=([^&=]+)'));
    return s ? s[1] : false;
}

function getUsers(search, online) {
    $.ajax({
        url: "http://bgsrv.ru/post.php?admin=getUser",
        type: "POST",
        data: {'page': 1, "search": search, "online": online},
        success: function (data) {
            $('#AUser').html(data);
        }
    });
}

function getPage(href) {

    // $.ajax({
    //     url: "http://bgsrv.ru/post.php?post=adminPage&" + href,
    //     type: "GET",
    //     success: function (data) {
    //         if (href != "") href = "?" + href;
    //         history.pushState('', '', "http://bgsrv.ru/admin.php" + href);
    //         rr = data;
    //         $('#AContent').html(rr);
    //     }
    // });
}
function notify(message, type){
    if (type == "danger") var title = 'Ошибка!';
    if (type == "success") var title = 'Выполнено!';
    if (type == "info") var title = 'Информация!';
    $.notify({
        title: title,
        message: message
    },{
        type: type,
        allow_dismiss: false,
        label: 'Cancel',
        className: 'btn-xs btn-default',
        placement: {
            from: 'top',
            align: 'right'
        },
        delay: 3500,
        animate: {
            enter: 'animated fadeInUp',
            exit: 'animated fadeOutDown'
        },
        offset: {
            x: 30,
            y: 30
        },
        template:   '<div data-notify="container" class="alert alert-dismissible alert-{0}" role="alert">' +
        '<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>' +
        '<span data-notify="icon"></span> ' +
        '<span data-notify="title"><b>{1}</b></span> ' +
        '<span data-notify="message">{2}</span>' +
        '<div class="progress" data-notify="progressbar">' +
        '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
        '</div>' +
        '<a href="{3}" target="{4}" data-notify="url"></a>' +
        '</div>'
    });
}

function informer(data) {
    var dat = JSON.parse(data);
    // $("#AContent").prepend('<div class="alert alert-' + data.type + '">' + data.text + '</div>');
    notify(dat.text,dat.type);
    // setTimeout(function () {
    //     $('.alert-' + data.type).hide()
    // }, 3000);
}
function ajax_prep_for_edit(a,c){for(var b=0,d=c_cache.length;b<d;b++)b in c_cache&&(c_cache[b]||""!=c_cache[b])&&ajax_cancel_comm_edit(b);ShowLoading("");$.get(dle_root+"engine/ajax/editnews.php",{id:a,field:c,action:"edit"},function(b){HideLoading("");var d="none";$("#modal-overlay").remove();$("body").prepend('<div id="modal-overlay" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: #666666; opacity: .40;filter:Alpha(Opacity=40); z-index: 999; display:none;"></div>');$("#modal-overlay").css({filter:"alpha(opacity=40)"}).fadeIn();var e={};e[dle_act_lang[3]]=function(){$(this).dialog("close")};e[dle_act_lang[4]]=function(){ajax_save_for_edit(a,c)};$("#dlepopup-news-edit").remove();$("body").prepend("<div id='dlepopup-news-edit' class='dlepopupnewsedit' title='"+menu_short+"' style='display:none'></div>");$(".dlepopupnewsedit").html("");$("#dlepopup-news-edit").dialog({autoOpen:!0,width:800,height:600,buttons:e,resizable:!1,dialogClass:"modalfixed dle-popup-quickedit",dragStart:function(a,b){d=$(".modalfixed").css("box-shadow");$(".modalfixed").css("box-shadow","none")},dragStop:function(a,b){$(".modalfixed").css("box-shadow",d)},close:function(a,b){$(this).dialog("destroy");$("#modal-overlay").fadeOut(function(){$("#modal-overlay").remove()})}});830<$(window).width()&&530<$(window).height()&&($(".modalfixed.ui-dialog").css({position:"fixed"}),$("#dlepopup-news-edit").dialog("option","position",["0","0"]));$("#dlepopup-news-edit").css({overflow:"auto"});$("#dlepopup-news-edit").css({"overflow-x":"hidden"});$("#dlepopup-news-edit").html(b)},"html");return!1}

function save() {
    var save = {};
    $.each($('textarea,input[name^="save\\["],select[name^="save\\["]').serializeArray(), function () {
        var saver = this.name.replace(/save[]/, '');
        save[saver] = this.value;
    });
    $.ajax({
        url: "http://bgsrv.ru/post.php?admin=save",
        type: "POST",
        data: {
            "save": save
        },
        success: function (data) {
            informer(data);
        }
    });
}

function statePost(id, state) {
    $.ajax({
        url: "http://bgsrv.ru/post.php?admin=state_post",
        type: "POST",
        data: {'id': id, 'state': state},
        success: function (data) {
            informer(data);
            var dat = JSON.parse(data);
            if (dat.type == "success" || dat.type == "info") {
                if (state == 1) {
                    $("#" + id + "_row_table").removeClass();
                    $("#" + id + "_row_table").addClass('zmdi zmdi-eye');
                    $("#"+id+"_row_href").attr('onclick','statePost('+id+',0)');
                } else if (state == 0){
                    $("#" + id + "_row_table").removeClass();
                    $("#" + id + "_row_table").addClass('zmdi zmdi-eye-off');
                    $("#"+id+"_row_href").attr('onclick','statePost('+id+',1)');
                }
            }
        }
    });
}

$(window).load(function () {
    if ($_GET('c') == "users") {
        getUsers();
        //var redirect = '/users/';
        //history.pushState('', '', redirect);
    }
});

function aditor(id, h) {
    if (h == undefined) h = 300;
    $(id).summernote({
        height: h,   //set editable area's height
        lang: 'ru-RU',
        toolbar: [
            ['misc', ['undo','redo']],
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['fontname', ['fontname']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video', 'hr']],
            ['view', ['fullscreen', 'codeview']],
            ['help', ['help']]
        ],
    });
}

function addPost() {
    $.ajax({
        url: "http://bgsrv.ru/post.php?admin=add_post",
        type: "POST",
        data: {
            'title': $('input[name=title]').val(),
            'category': $('input[name=category]').val(),
            'date': $('input[name=date]').val(),
            'fixed': $('input[name=fixed]').prop('checked'),
            'publish': $('input[name=publish]').prop('checked'),
            'short': $('.short_post').summernote('code'),
            'full': $('.full_post').summernote('code')
        },
        success: function (data) {
            informer(data);
            //alert(data);
        }
    });
}

function updatePost(id, c) {
    $.ajax({
        url: "http://bgsrv.ru/post.php?admin=update_post",
        type: "POST",
        data: {
            'id': id,
            'c': c,
            'title': $('input[name=title]').val(),
            'category': $('input[name=category]').val(),
            'date': $('input[name=date]').val(),
            'fixed': $('input[name=fixed]').prop('checked'),
            'publish': $('input[name=publish]').prop('checked'),
            'short': $('.short_post').summernote('code'),
            'full': $('.full_post').summernote('code')
        },
        success: function (data) {
            informer(data);
            //alert(data);
        }
    });
}

$(document).ready(function () {

    aditor('.short_post', 300);
    aditor('.full_post', 500);

    $(".action-header ul li").click(function () {
        $(".action-header ul li").removeClass("active");
        $(this).toggleClass("active");
    })

    $(".AOnline").click(function () {
        getUsers("", "1");
    });

    $(".AAll").click(function () {
        getUsers();
    });

    $("input[name=AUser]").keyup(function () {
        var Value = $("input[name=AUser]").val();
        if (Value == "") {
            getUsers();
        } else {
            getUsers(Value, "");
        }
    });

    $(".action-header__close").click(function () {
        getUsers();
    });


});

