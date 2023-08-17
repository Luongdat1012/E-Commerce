@if($category->getCategoryChildren->count())
    <ul class="sub-menu" style="max-height: 300px">
        @foreach($category->getCategoryChildren as $item)
            <li style="min-width: 33%">
                <a href="{{route('productsCategory',$item->slug)}}">{{$item->category_name}}</a>
                @if($item->getCategoryChildren->count())
                    <ul class="sub-menu-child row">
                        @foreach($item->getCategoryChildren as $value)
                            <li class="col-6">
                                <a href="{{route('productsCategory',$value->slug)}}">{{$value->category_name}}</a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach

    </ul>
@endif
