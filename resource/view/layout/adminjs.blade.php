@if(!empty($data['_user']) && !empty($data['_user']['customize_style']))
    @php
        $customize_style = $data['_user']['customize_style'];
    @endphp

<script type="text/javascript">
    $(function () {
        let customize_style = {!! $customize_style !!}
        for (let selector in customize_style) {
            for (let class_name in customize_style[selector]) {
                var separator = '.'
                if (selector == 'body') {
                  separator = ''
                }
                if (customize_style[selector][class_name]) {
                    $("#"+selector+"_"+class_name).attr("checked", true)
                    $(separator+selector).addClass(class_name)
                } else {
                    $("#"+selector+"_"+class_name).attr("checked", false)
                    $(separator+selector).removeClass(class_name)
                }
            }
        }
    })
</script>
@endif

<script src="/vendor/hyperf-admin/AdminLTE/dist/js/hyperf-admin.js"></script>