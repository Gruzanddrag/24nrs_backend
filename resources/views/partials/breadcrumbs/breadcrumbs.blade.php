@if (count($breadcrumbs))
    <div class="breadcrumb__outer">
        awdawd
        <div class="container">
            <div class="row">
                <div class="breadcrumb__wrapper">
                    @foreach ($breadcrumbs as $breadcrumb)
                        @if ($breadcrumb->url && !$loop->last)
                            <a class="breadcrumb" href="{{ $breadcrumb->url }}">
                                {{ $breadcrumb->title }}
                                <svg class="breadcrumb-next" xmlns="http://www.w3.org/2000/svg" width="8" height="12" viewbox="0 0 8 12"><g><g><path fill="#979fa8" d="M2-.07L.5 1.43 5.07 6 .5 10.57l1.5 1.5L8.07 6z"></path></g></g></svg>
                            </a>
                        @else
                            <a class="breadcrumb is-actives" href="{{ $breadcrumb->url }}">
                                {{ $breadcrumb->title }}
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endif
