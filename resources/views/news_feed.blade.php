@extends('layouts.app')
@section('content')
    <div class="contBody">
        <div class="newstabsMM">
            <div class="tabsmm_news">
                @foreach($categories as $category)
                    <a class="" data-targetit="box-tab{{ $category->id }}" href="javascript:;" title="">{{ $category->name }}</a>
                @endforeach
                {{-- <a data-targetit="box-tab2" href="javascript:;" title="">All News</a>  --}}
            </div>
            <div class="viewmorebtn">
                <a href="javascript:;" title="">View more</a>
            </div>
        </div>
        <div class="row">
            @if ($all_news->count() > 0)
                @foreach ($all_news as $all_new)
                    <div class="col-md-4">
                        <div class="Bxnews">
                            <figure>
                                <img class="img-fluid" src="{{ asset($all_new->thumbnail) }}" alt="">
                            </figure>
                            <div class="contHov">
                                <a href="javascript:;" title="">
                                    <h3>{{ $all_new->title }}</h3>
                                    {{-- <p>{!! $all_new->blog_details !!}</p> --}}
                                    <p><strong>{{ $all_new->created_at->format('F j, Y') }}</strong> - By Administrator</p>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
