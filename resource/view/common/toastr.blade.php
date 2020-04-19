@if(!empty($data['_toastr']))
    @php
        $type     = \Illuminate\Support\Arr::get($data['_toastr']->get('type'), 0, 'success');
        $message  = \Illuminate\Support\Arr::get($data['_toastr']->get('message'), 0, '');
        $timeout    = \Illuminate\Support\Arr::get($data['_toastr']->get('timeout'), 0, 5) * 1000;
    @endphp

    <script type="text/javascript">
      $(function() {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: {!! $timeout !!},
            });
            Toast.fire({
                type: "{!!  $type !!}",
                title: "{!! $message !!}",
            })
        })
    </script>
@endif