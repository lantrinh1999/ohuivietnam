<nav>
    <ul>
        @php
        $menus = get_option('menu');
        if(!empty($menus)){
        $menus = json_decode($menus);
        } else {
        $menus = '';
        }
        @endphp
        @if (!empty($menus))
        @forelse ($menus as $menu)
        @if (empty($menu->children))
        <li class="{{ $menu->slug }}"><a href="{{ _genUrl($menu->slug) }}">{{ $menu->title }}</a>
        </li>
        @else
        <li class="{{ $menu->slug }}">
            <a href="{{ _genUrl($menu->slug) }}">{{ $menu->title }}<i class="fa fa-angle-down"></i></a>
            @php
            $mChild = $menu->children;
            @endphp

            @if (empty($mChild[0]->children))
            <ul class="submenu">
                @foreach ($mChild as $mc)
                <li class="{{ $mc->slug }}"><a href="{{ _genUrl($mc->slug) }}">{{ $mc->title }}</a>
                </li>
                @endforeach

            </ul>
            @else
            <ul class="mega-menu">
                @foreach ($mChild as $mcm)
                <li>
                    <ul>
                        <li class="mega-menu-title {{ $mcm->slug }}"><a
                                href="{{ _genUrl($mcm->slug) }}">{{ $mcm->title }}</a></li>
                        @foreach ($mcm->children as $mcmc)
                        <li class="{{ $mcmc->slug }}"><a class="mega-menu-element {{ $mcmc->slug }}"
                                href="{{ _genUrl($mcmc->slug) }}">{{ $mcmc->title }}</a></li>
                        @endforeach
                    </ul>
                </li>
                @endforeach
            </ul>
            @endif

        </li>
        @endif
        @empty
        <li class="/"><a href="{{ url('/') }}"> Home </a></li>
        @endforelse
        @else
        <li class="/"><a href="{{ url('/') }}"> Home </a></li>
        @endif

    </ul>
</nav>
