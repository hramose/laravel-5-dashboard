<ol class="breadcrumb space0">
    @foreach ($links as $index => $link)
        <li>
            {!! $link['route'] ? '<a href="'.route($link['route']).'">' : '' !!}
            {!! $index ? '' : '<span class="glyphicon glyphicon-dashboard"></span> ' !!}
            {{ $link['text'] }}
            {!! $link['route'] ? '</a>' : '' !!}
        </li>
    @endforeach
</ol>