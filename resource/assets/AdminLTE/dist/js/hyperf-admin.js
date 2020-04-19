(function($) {
    'use strict'

    var uri = window.location.pathname
    var $sidebar = $('.control-sidebar')
    var $container = $('<div />', {
        class: 'p-3 control-sidebar-content'
    })

    $sidebar.append($container)

    var navbar_dark_skins = [
        'navbar-primary',
        'navbar-secondary',
        'navbar-info',
        'navbar-success',
        'navbar-danger',
        'navbar-indigo',
        'navbar-purple',
        'navbar-pink',
        'navbar-navy',
        'navbar-lightblue',
        'navbar-teal',
        'navbar-cyan',
        'navbar-dark',
        'navbar-gray-dark',
        'navbar-gray',
    ]

    var navbar_light_skins = [
        'navbar-light',
        'navbar-warning',
        'navbar-white',
        'navbar-orange',
    ]

    $container.append(
        '<h5>自定义样式</h5>'
    ).append($('<a />', {
        href: 'javascript:void(0)'
    }).text('全部重置').on('click', function() {
        clearCustomizeStyle('all')
    })).append('<hr class="mb-2"/>')

    var $no_border_checkbox = $('<input />', {
        type: 'checkbox',
        value: 1,
        checked: $('.main-header').hasClass('border-bottom-0'),
        'class': 'mr-1',
        'id': 'main-header_border-bottom-0'
    }).on('click', function() {
        var selector = 'main-header'
        var class_name = 'border-bottom-0'
        var enable = 0
        if ($(this).is(':checked')) {
            enable = 1
            $("." + selector).addClass(class_name)
        } else {
            $("." + selector).removeClass(class_name)
        }
        saveCustomizeStyle(selector, class_name, enable)
    })
    var $no_border_container = $('<div />', { 'class': 'mb-1' }).append($no_border_checkbox).append('<span>无导航栏边框</span>')
    $container.append($no_border_container)

    var $layout_boxed_body_checkbox = $('<input />', {
        type: 'checkbox',
        value: 1,
        checked: $('body').hasClass('layout-boxed'),
        'class': 'mr-1',
        'id': 'body_layout-boxed'
    }).on('click', function() {
        var selector = 'body'
        var class_name = 'layout-boxed'
        var enable = 0
        if ($(this).is(':checked')) {
            enable = 1
            $(selector).addClass(class_name)
        } else {
            $(selector).removeClass(class_name)
        }
        saveCustomizeStyle(selector, class_name, enable)
    })
    var $layout_boxed_body_container = $('<div />', { 'class': 'mb-1' }).append($layout_boxed_body_checkbox).append('<span>Boxed模式</span>')
    $container.append($layout_boxed_body_container)

    var $text_sm_body_checkbox = $('<input />', {
        type: 'checkbox',
        value: 1,
        checked: $('body').hasClass('text-sm'),
        'class': 'mr-1',
        'id': 'body_text-sm'
    }).on('click', function() {
        var selector = 'body'
        var class_name = 'text-sm'
        var enable = 0
        if ($(this).is(':checked')) {
            enable = 1
            $(selector).addClass(class_name)
        } else {
            $(selector).removeClass(class_name)
        }
        saveCustomizeStyle(selector, class_name, enable)
    })
    var $text_sm_body_container = $('<div />', { 'class': 'mb-1' }).append($text_sm_body_checkbox).append('<span>全部缩小</span>')
    $container.append($text_sm_body_container)

    var $text_sm_header_checkbox = $('<input />', {
        type: 'checkbox',
        value: 1,
        checked: $('.main-header').hasClass('text-sm'),
        'class': 'mr-1',
        'id': 'main-header_text-sm'
    }).on('click', function() {
        var selector = 'main-header'
        var class_name = 'text-sm'
        var enable = 0
        if ($(this).is(':checked')) {
            enable = 1
            $("." + selector).addClass(class_name)
        } else {
            $("." + selector).removeClass(class_name)
        }
        saveCustomizeStyle(selector, class_name, enable)
    })
    var $text_sm_header_container = $('<div />', { 'class': 'mb-1 pl-3' }).append($text_sm_header_checkbox).append('<span>缩小导航栏字体</span>')
    $container.append($text_sm_header_container)

    var $text_sm_sidebar_checkbox = $('<input />', {
        type: 'checkbox',
        value: 1,
        checked: $('.nav-sidebar').hasClass('text-sm'),
        'class': 'mr-1',
        'id': 'nav-sidebar_text-sm'
    }).on('click', function() {
        var selector = 'nav-sidebar'
        var class_name = 'text-sm'
        var enable = 0
        if ($(this).is(':checked')) {
            enable = 1
            $("." + selector).addClass(class_name)
        } else {
            $("." + selector).removeClass(class_name)
        }
        saveCustomizeStyle(selector, class_name, enable)
    })
    var $text_sm_sidebar_container = $('<div />', { 'class': 'mb-1 pl-3' }).append($text_sm_sidebar_checkbox).append('<span>缩小侧边栏导航字体</span>')
    $container.append($text_sm_sidebar_container)

    var $text_sm_footer_checkbox = $('<input />', {
        type: 'checkbox',
        value: 1,
        checked: $('.main-footer').hasClass('text-sm'),
        'class': 'mr-1',
        'id': 'main-footer_text-sm'
    }).on('click', function() {
        var selector = 'main-footer'
        var class_name = 'text-sm'
        var enable = 0
        if ($(this).is(':checked')) {
            enable = 1
            $("." + selector).addClass(class_name)
        } else {
            $("." + selector).removeClass(class_name)
        }
        saveCustomizeStyle(selector, class_name, enable)
    })
    var $text_sm_footer_container = $('<div />', { 'class': 'mb-1 pl-3' }).append($text_sm_footer_checkbox).append('<span>缩小页脚字体</span>')
    $container.append($text_sm_footer_container)

    var $text_sm_brand_checkbox = $('<input />', {
        type: 'checkbox',
        value: 1,
        checked: $('.brand-link').hasClass('text-sm'),
        'class': 'mr-1',
        'id': 'brand-link_text-sm'
    }).on('click', function() {
        var selector = 'brand-link'
        var class_name = 'text-sm'
        var enable = 0
        if ($(this).is(':checked')) {
            enable = 1
            $("." + selector).addClass(class_name)
        } else {
            $("." + selector).removeClass(class_name)
        }
        saveCustomizeStyle(selector, class_name, enable)
    })
    var $text_sm_brand_container = $('<div />', { 'class': 'mb-1 pl-3' }).append($text_sm_brand_checkbox).append('<span>缩小Logo</span>')
    $container.append($text_sm_brand_container)

    var $fix_sidebar_checkbox = $('<input />', {
        type: 'checkbox',
        value: 1,
        checked: $('body').hasClass('layout-fixed'),
        'class': 'mr-1',
        'id': 'body_layout-fixed'
    }).on('click', function() {
        var selector = 'body'
        var class_name = 'layout-fixed'
        var enable = 0
        if ($(this).is(':checked')) {
            enable = 1
            $(selector).addClass(class_name)
        } else {
            $(selector).removeClass(class_name)
        }
        saveCustomizeStyle(selector, class_name, enable, true)
    })
    var $legacy_sidebar_container = $('<div />', { 'class': 'mb-1' }).append($fix_sidebar_checkbox).append('<span>全部固定<span style="color:#f33232">(将自动刷新)</span></span>')
    $container.append($legacy_sidebar_container)

    var $fix_navbar_checkbox = $('<input />', {
        type: 'checkbox',
        value: 1,
        checked: $('body').hasClass('layout-navbar-fixed'),
        'class': 'mr-1',
        'id': 'body_layout-navbar-fixed'
    }).on('click', function() {
        var selector = 'body'
        var class_name = 'layout-navbar-fixed'
        var enable = 0
        if ($(this).is(':checked')) {
            enable = 1
            $(selector).addClass(class_name)
        } else {
            $(selector).removeClass(class_name)
        }
        saveCustomizeStyle(selector, class_name, enable)
    })
    var $fix_navbar_container = $('<div />', { 'class': 'mb-1 pl-3' }).append($fix_navbar_checkbox).append('<span>固定顶部导航栏</span>')
    $container.append($fix_navbar_container)

    var $fix_footer_checkbox = $('<input />', {
        type: 'checkbox',
        value: 1,
        checked: $('body').hasClass('layout-footer-fixed'),
        'class': 'mr-1',
        'id': 'body_layout-footer-fixed'
    }).on('click', function() {
        var selector = 'body'
        var class_name = 'layout-footer-fixed'
        var enable = 0
        if ($(this).is(':checked')) {
            enable = 1
            $(selector).addClass(class_name)
        } else {
            $(selector).removeClass(class_name)
        }
        saveCustomizeStyle(selector, class_name, enable)
    })
    var $fix_footer_container = $('<div />', { 'class': 'mb-1 pl-3' }).append($fix_footer_checkbox).append('<span>固定footer</span>')
    $container.append($fix_footer_container)

    var $flat_sidebar_checkbox = $('<input />', {
        type: 'checkbox',
        value: 1,
        checked: $('.nav-sidebar').hasClass('nav-flat'),
        'class': 'mr-1',
        'id': 'nav-sidebar_nav-flat'
    }).on('click', function() {
        var selector = 'nav-sidebar'
        var class_name = 'nav-flat'
        var enable = 0
        if ($(this).is(':checked')) {
            enable = 1
            $("." + selector).addClass(class_name)
        } else {
            $("." + selector).removeClass(class_name)
        }
        saveCustomizeStyle(selector, class_name, enable)
    })
    var $flat_sidebar_container = $('<div />', { 'class': 'mb-1' }).append($flat_sidebar_checkbox).append('<span>侧边栏样式1</span>')
    $container.append($flat_sidebar_container)

    var $legacy_sidebar_checkbox = $('<input />', {
        type: 'checkbox',
        value: 1,
        checked: $('.nav-sidebar').hasClass('nav-legacy'),
        'class': 'mr-1',
        'id': 'nav-sidebar_nav-legacy'
    }).on('click', function() {
        var selector = 'nav-sidebar'
        var class_name = 'nav-legacy'
        var enable = 0
        if ($(this).is(':checked')) {
            enable = 1
            $("." + selector).addClass(class_name)
        } else {
            $("." + selector).removeClass(class_name)
        }
        saveCustomizeStyle(selector, class_name, enable)
    })
    var $legacy_sidebar_container = $('<div />', { 'class': 'mb-1' }).append($legacy_sidebar_checkbox).append('<span>侧边栏样式2</span>')
    $container.append($legacy_sidebar_container)

    var $compact_sidebar_checkbox = $('<input />', {
        type: 'checkbox',
        value: 1,
        checked: $('.nav-sidebar').hasClass('nav-compact'),
        'class': 'mr-1',
        'id': 'nav-sidebar_nav-compact'
    }).on('click', function() {
        var selector = 'nav-sidebar'
        var class_name = 'nav-compact'
        var enable = 0
        if ($(this).is(':checked')) {
            enable = 1
            $("." + selector).addClass(class_name)
        } else {
            $("." + selector).removeClass(class_name)
        }
        saveCustomizeStyle(selector, class_name, enable)
    })
    var $compact_sidebar_container = $('<div />', { 'class': 'mb-1' }).append($compact_sidebar_checkbox).append('<span>侧边栏样式3</span>')
    $container.append($compact_sidebar_container)

    var $child_indent_sidebar_checkbox = $('<input />', {
        type: 'checkbox',
        value: 1,
        checked: $('.nav-sidebar').hasClass('nav-child-indent'),
        'class': 'mr-1',
        'id': 'nav-sidebar_nav-child-indent'
    }).on('click', function() {
        var selector = 'nav-sidebar'
        var class_name = 'nav-child-indent'
        var enable = 0
        if ($(this).is(':checked')) {
            enable = 1
            $("." + selector).addClass(class_name)
        } else {
            $("." + selector).removeClass(class_name)
        }
        saveCustomizeStyle(selector, class_name, enable)
    })
    var $child_indent_sidebar_container = $('<div />', { 'class': 'mb-1' }).append($child_indent_sidebar_checkbox).append('<span>侧边栏子菜单缩进</span>')
    $container.append($child_indent_sidebar_container)

    var $no_expand_sidebar_checkbox = $('<input />', {
        type: 'checkbox',
        value: 1,
        checked: $('.main-sidebar').hasClass('sidebar-no-expand'),
        'class': 'mr-1',
        'id': 'main-sidebar_sidebar-no-expand'
    }).on('click', function() {
        var selector = 'main-sidebar'
        var class_name = 'sidebar-no-expand'
        var enable = 0
        if ($(this).is(':checked')) {
            enable = 1
            $("." + selector).addClass(class_name)
        } else {
            $("." + selector).removeClass(class_name)
        }
        saveCustomizeStyle(selector, class_name, enable)
    })
    var $no_expand_sidebar_container = $('<div />', { 'class': 'mb-4' }).append($no_expand_sidebar_checkbox).append('<span>鼠标悬停侧边栏时不展开</span>')
    $container.append($no_expand_sidebar_container)

    $container.append('<h6>顶部导航栏颜色</h6>')

    var $navbar_variants = $('<div />', {
        'class': 'd-flex'
    })
    var navbar_all_colors = navbar_dark_skins.concat(navbar_light_skins)
    var $navbar_variants_colors = createSkinBlock(navbar_all_colors, function(e) {
        var styles = {
            'navbar-dark': 0,
            'navbar-light': 0,
        }
        var color = $(this).data('color')
        var $main_header = $('.main-header')
        $main_header.removeClass('navbar-dark').removeClass('navbar-light')
        navbar_all_colors.map(function(color) {
            styles[color] = 0
            $main_header.removeClass(color)
        })

        if (navbar_dark_skins.indexOf(color) > -1) {
            styles['navbar-dark'] = 1
            $main_header.addClass('navbar-dark')
        } else {
            styles['navbar-light'] = 1
            $main_header.addClass('navbar-light')
        }

        styles[color] = 1
        $main_header.addClass(color)

        batchSaveCustomizeStyle('main-header', styles)
    })

    $navbar_variants.append($navbar_variants_colors)

    $container.append($navbar_variants)

    var sidebar_colors = [
        'bg-primary',
        'bg-warning',
        'bg-info',
        'bg-danger',
        'bg-success',
        'bg-indigo',
        'bg-lightblue',
        'bg-navy',
        'bg-purple',
        'bg-fuchsia',
        'bg-pink',
        'bg-maroon',
        'bg-orange',
        'bg-lime',
        'bg-teal',
        'bg-olive'
    ]

    var accent_colors = [
        'accent-primary',
        'accent-warning',
        'accent-info',
        'accent-danger',
        'accent-success',
        'accent-indigo',
        'accent-lightblue',
        'accent-navy',
        'accent-purple',
        'accent-fuchsia',
        'accent-pink',
        'accent-maroon',
        'accent-orange',
        'accent-lime',
        'accent-teal',
        'accent-olive'
    ]

    var sidebar_skins = [
        'sidebar-dark-primary',
        'sidebar-dark-warning',
        'sidebar-dark-info',
        'sidebar-dark-danger',
        'sidebar-dark-success',
        'sidebar-dark-indigo',
        'sidebar-dark-lightblue',
        'sidebar-dark-navy',
        'sidebar-dark-purple',
        'sidebar-dark-fuchsia',
        'sidebar-dark-pink',
        'sidebar-dark-maroon',
        'sidebar-dark-orange',
        'sidebar-dark-lime',
        'sidebar-dark-teal',
        'sidebar-dark-olive',
        'sidebar-light-primary',
        'sidebar-light-warning',
        'sidebar-light-info',
        'sidebar-light-danger',
        'sidebar-light-success',
        'sidebar-light-indigo',
        'sidebar-light-lightblue',
        'sidebar-light-navy',
        'sidebar-light-purple',
        'sidebar-light-fuchsia',
        'sidebar-light-pink',
        'sidebar-light-maroon',
        'sidebar-light-orange',
        'sidebar-light-lime',
        'sidebar-light-teal',
        'sidebar-light-olive'
    ]

    $container.append('<h6>侧边栏菜单颜色</h6>')
    var $accent_variants = $('<div />', {
        'class': 'd-flex'
    })
    $container.append($accent_variants)
    $container.append(createSkinBlock(accent_colors, function() {
        var color = $(this).data('color')
        var accent_class = color
        var $body = $('body')
        var styles = {}
        accent_colors.map(function(skin) {
            styles[skin] = 0
            $body.removeClass(skin)
        })

        styles[accent_class] = 1
        $body.addClass(accent_class)
        batchSaveCustomizeStyle('body', styles)
    }))

    $container.append('<h6>Dark模式侧边栏</h6>')
    var $sidebar_variants_dark = $('<div />', {
        'class': 'd-flex'
    })
    $container.append($sidebar_variants_dark)
    $container.append(createSkinBlock(sidebar_colors, function() {
        var color = $(this).data('color')
        var sidebar_class = 'sidebar-dark-' + color.replace('bg-', '')
        var $sidebar = $('.main-sidebar')
        var styles = {}
        sidebar_skins.map(function(skin) {
            styles[skin] = 0
            $sidebar.removeClass(skin)
        })

        styles[sidebar_class] = 1
        $sidebar.addClass(sidebar_class)
        batchSaveCustomizeStyle('main-sidebar', styles)
    }))

    $container.append('<h6>Light模式侧边栏</h6>')
    var $sidebar_variants_light = $('<div />', {
        'class': 'd-flex'
    })
    $container.append($sidebar_variants_light)
    $container.append(createSkinBlock(sidebar_colors, function() {
        var color = $(this).data('color')
        var sidebar_class = 'sidebar-light-' + color.replace('bg-', '')
        var $sidebar = $('.main-sidebar')
        var styles = {}
        sidebar_skins.map(function(skin) {
            styles[skin] = 0
            $sidebar.removeClass(skin)
        })

        styles[sidebar_class] = 1
        $sidebar.addClass(sidebar_class)
        batchSaveCustomizeStyle('main-sidebar', styles)
    }))

    var logo_skins = navbar_all_colors
    $container.append('<h6>Logo背景颜色</h6>')
    var $logo_variants = $('<div />', {
        'class': 'd-flex'
    })
    $container.append($logo_variants)
    var $clear_btn = $('<a />', {
        href: 'javascript:void(0)'
    }).text('重置').on('click', function() {
        var $logo = $('.brand-link')
        var styles = {}
        logo_skins.map(function(skin) {
            styles[skin] = 0
            $logo.removeClass(skin)
        })
        batchSaveCustomizeStyle('brand-link', styles)
    })
    $container.append(createSkinBlock(logo_skins, function() {
        var color = $(this).data('color')
        var $logo = $('.brand-link')
        var styles = {}
        logo_skins.map(function(skin) {
            styles[skin] = 0
            $logo.removeClass(skin)
        })
        styles[color] = 1
        $logo.addClass(color)

        batchSaveCustomizeStyle('brand-link', styles)
    }).append($clear_btn))

    function createSkinBlock(colors, callback) {
        var $block = $('<div />', {
            'class': 'd-flex flex-wrap mb-3'
        })

        colors.map(function(color) {
            var $color = $('<div />', {
                'class': (typeof color === 'object' ? color.join(' ') : color).replace('navbar-', 'bg-').replace('accent-', 'bg-') + ' elevation-2'
            })

            $block.append($color)

            $color.data('color', color)

            $color.css({
                width: '40px',
                height: '20px',
                borderRadius: '25px',
                marginRight: 10,
                marginBottom: 10,
                opacity: 0.8,
                cursor: 'pointer'
            })

            $color.hover(function() {
                $(this).css({ opacity: 1 }).removeClass('elevation-2').addClass('elevation-4')
            }, function() {
                $(this).css({ opacity: 0.8 }).removeClass('elevation-4').addClass('elevation-2')
            })

            if (callback) {
                $color.on('click', callback)
            }
        })

        return $block
    }

    function saveCustomizeStyle(selector, class_name, enable, reload) {
        var styles = {
            [class_name]: enable
        }
        $.ajax({
            url: '/admin/user/saveCustomizeStyle',
            type: 'POST',
            data: {
                selector: selector,
                styles: styles
            },
            success: function(retData) {
                if (reload) {
                    location.reload()
                }
            },
            error: function(retData) {}
        });
    }

    function batchSaveCustomizeStyle(selector, styles) {
        $.ajax({
            url: '/admin/user/saveCustomizeStyle',
            type: 'POST',
            data: {
                selector: selector,
                styles: styles,
            },
            success: function(retData) {},
            error: function(retData) {}
        });
    }

    function clearCustomizeStyle(selector) {
        $.ajax({
            url: '/admin/user/clearCustomizeStyle',
            type: 'POST',
            data: {
                selector: selector,
                back_url: uri
            },
            success: function(retData) {
                location.reload()
            },
            error: function(retData) {}
        });
    }
})(jQuery)