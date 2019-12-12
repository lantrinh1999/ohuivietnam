<div class="mobile-menu">
    <nav id="mobile-menu-active">
        <ul class="menu-overflow">
            @if (!empty($menus))
            @forelse ($menus as $mm)
            @if (empty($mm->children))
            <li><a href="{{ _genUrl($mm->slug) }}">{{ $mm->title }}</a></li>
            @else
            <li><a href="{{ $mm->slug }}">{{ $mm->title }}</a>
                <ul>
                    @php
                    $mmChild = $mm->children;
                    @endphp
                    @if (empty($mmChild[0]->children))
                    @foreach ($mmChild as $mmcc)
                    <li><a href="{{ _genUrl($mmcc->slug) }}">{{ $mmcc->title }}</a></li>
                    @endforeach
                    @else
                    @foreach ($mmChild as $mmcc2)
                    <li><a href="{{ _genUrl($mmcc2->slug) }}">{{ $mmcc2->title }}</a>
                        <ul>
                            @foreach ($mmcc2->children as $mmccc2)
                            <li><a href="{{ _genUrl($mmccc2->slug) }}">{{ $mmccc2->title }}</a></li>
                            @endforeach

                        </ul>
                    </li>
                    @endforeach
                    @endif

                </ul>
            </li>
            @endif
            @empty
            <li><a href="{{ url('/') }}">Home</a></li>
            @endforelse
            @else
            <li><a href="{{ url('/') }}">Home</a></li>
            @endif

        </ul>
    </nav>
</div>
