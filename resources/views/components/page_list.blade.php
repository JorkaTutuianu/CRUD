<a href="#" title="SUBJECTS">{{$item['name']}}</a>
    @if (count($item->SubPages))
        <ul>
            @foreach($item->SubPages as $SubPage)
                <li>@include('components.page_list', ['item' => $SubPage])</li>
            @endforeach
        </ul>
    @endif


