@foreach($categories as $category)
    @if($loop->first)
        <a href="blog-grid.html"><i class="ion-pricetags"></i> {{$category->name}}</a>@if(!$loop->last),@endif
        @continue
    @endif
    <a href="blog-left-sidebar.html"> {{$category->name}}</a>@if(!$loop->last),@endif
@endforeach
