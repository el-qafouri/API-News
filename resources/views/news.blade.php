@foreach($newsdata as $news)
    <div class="card mt-5 ml-5" style="width:90%">
        <div class="row center">
            <div class="col-sm-6">
                <img src="{{ $news->urlToImage }}" class="card-img-top" alt="..." style="width:90%;height:90%">
            </div>
            <div class="col-sm-6">
                <div class="card-body">
                    <h5 class="card-title">{{ $news->title }}</h5>
                    <p class="card-text">{{ $news->content }}</p>
{{--                    <p class="card-text"><small class="text-muted"> Publish Date: {{ $news->publishedAt->format('d-m-Y') }}</small></p>--}}

                    <p class="card-text">
                        <small class="text-muted"> Publish Date:
                            @if ($news->publishedAt)
                                {{ $news->publishedAt }}
                            @else
                                Unknown
                            @endif
                        </small>
                    </p>
                    <p class="card-text"><small class="text-muted"> Author: {{ $news->author }}</small></p>
                </div>
            </div>
        </div>
    </div>
@endforeach



