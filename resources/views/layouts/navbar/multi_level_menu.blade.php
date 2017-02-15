@foreach($items as $item)
    <li
            @lm-attrs($item)
            @if($item->hasChildren() && $item->__get('parent') != null)
            class="dropdown-submenu"
            @elseif($item->hasChildren())
            class="dropdown"
            @endif
            @lm-endattrs>

        @if($item->link)
            <a @lm-attrs($item->link)
               @if($item->hasChildren())
               class="dropdown-toggle" data-toggle="dropdown"
               @endif

               @lm-endattrs href="{!! $item->url() !!}">

                {!! trans('Menu.' . $item->title) !!}

                @if($item->hasChildren() && $item->__get('parent') == null)
                    <b class="caret"></b>
                @endif
            </a>

        @else
            {!! trans('Menu.' . $item->title) !!}
        @endif

        @if($item->hasChildren())

            <ul class="dropdown-menu">
                @include('layouts.navbar.multi_level_menu',array('items' => $item->children()))
            </ul>

        @endif

    </li>

    @if($item->divider)
        <li{!! Lavary\Menu\Builder::attributes($item->divider) !!}></li>
    @endif

@endforeach