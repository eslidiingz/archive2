<nav aria-label="breadcrumb">
	<ol class="breadcrumb" style="background-color: unset;">
      <li class="breadcrumb-item"><a href="/" style="color: #346751;">{{ trans('message.home') }}</a></li>
      <i class="fa fa-angle-right px-2 d-flex align-items-center" aria-hidden="true"></i>
      {{-- {{dd(json_decode($breadcrumb_item))}} --}}

      @foreach ($breadcrumb_item as $item)
        @if ($loop->last)
            <li class="breadcrumb-item active" aria-current="page">{{$item['name']}}</li>
        @else
            <li class="breadcrumb-item"><a href="{{$item['link']}}" style="color: #346751;">{{$item['name']}}</a></li>
            <i class="fa fa-angle-right px-2 d-flex align-items-center" aria-hidden="true"></i>
        @endif
      @endforeach
    </ol>
</nav>
