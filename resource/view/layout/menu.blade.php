@if (empty($item['children']))
    <li class="nav-item {{ $item['active'] ? 'menu-open' : '' }}">
        @if (is_valid_url($item['uri']))
            <a href="{{ $item['uri'] }}" class="_blank">
        @else
            <a href="{{ $item['uri'] }}" class="nav-link {{ $item['active'] ? 'active' : '' }}">
        @endif
            <i class="nav-icon fas {{ $item['icon'] }}"></i>
            <p>{{ $item['title'] }}</p>
        </a>
    </li>
@else
    <li class="nav-item has-treeview {{ $item['active'] ? 'menu-open' : '' }}">
        <a href="#" class="nav-link {{ $item['active'] ? 'active' : '' }}">
            <i class="nav-icon fas {{ $item['icon'] }}"></i>
            <p>
                {{ $item['title'] }}
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            @foreach($item['children'] as $item)
                @include('layout.menu', $item)
            @endforeach
        </ul>
    </li>
@endif