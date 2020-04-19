@extends('layout.main', $data)

@section('content')

<section class="content" style="padding: 10px 15px 0 15px;">
    @include($data['_view'], $data)
</section>

@endsection



