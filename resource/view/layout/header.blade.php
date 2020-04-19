<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>
                    {{ $title }}
                    <span style="font-size: 15px; color: #666;">{{ $description }}</span>
                </h3>
            </div>
            <div class="col-sm-6" style="font-size: 14px;">
                <!-- breadcrumb start -->
                @if (!empty($breadcrumb))
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="/admin">
                            <i class="fas fa-tachometer-alt"></i>
                            {{ trans('admin.home') }}
                        </a>
                    </li>
                    @foreach($breadcrumb as $item)
                        @if($loop->last)
                            <li class="breadcrumb-item active">
                                <i class="fas {{ $item['icon'] ?? '' }}"></i>
                                {{ $item['text'] }}
                            </li>
                        @else
                            <li class="breadcrumb-item">
                                <a href="{{ $item['url'] ?? '' }}">
                                    <i class="fas {{ $item['icon'] ?? '' }}"></i>
                                    {{ $item['text'] }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ol>
                @else
                <ol class="breadcrumb" style="margin-right: 30px;">
                    <li><a href="/admin"><i class="fas fa-tachometer-alt"></i> {{ config('admin.home') }}</a></li>
                </ol>
                @endif
            </div>
        </div>
    </div>
</section>