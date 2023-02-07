@extends('template.layout', ['title' => 'Home'])
@section('header')
@endsection
@section('content')
    <div class="container text-center p-3">
        <div class="row row-cols-auto justify-content-start ms-2">
            @forelse ($items as $item)
                <div class="col m-2">
                    <a class="link-unstyled" href="{{ route('item.show', [$item->item_id]) }}">
                        <div class="card" style="width: 12rem;">
                            <img src="{{ asset('/storage/' . $item->image_url) }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->item_name }}</h5>
                                <p class="card-text">{{ Str::limit($item->item_desc, 10) }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <span class="alert alert-danger">{{ __('home.empty') }}</span>
            @endforelse
        </div>
        <div class="d-flex justify-content-center w-100 mt-3">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="{{$items->previousPageUrl()}}">Previous</a></li>
                    @for ($i = 1; $i <= $items->lastPage() ; $i++)
                        <li class="page-item {{$items->currentPage() == $i ? "active" : ""}}"><a class="page-link" href="{{$items->url($i)}}">{{$i}}</a></li>
                    @endfor
                    <li class="page-item"><a class="page-link" href="{{$items->nextPageUrl()}}">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>
@endsection
