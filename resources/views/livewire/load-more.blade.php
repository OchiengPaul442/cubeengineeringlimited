<div>
    <div class="row d-flex gap-4 justify-content-around flex-wrap">
        @foreach ($services as $service)
            <div class="service-card">
                <input type="hidden" value="{{ $service->id }}">
                <img src="{{ asset('storage/images/' . $service->image) }}" alt="">
                <div class="service-card-content">
                    <h2 class="service-card-title text-capitalize">{{ $service->name }}</h2>
                    <a href="{{ route('services.show', $service->id) }}" class="serivce-button">Learn
                        More</a>
                </div>
            </div>
        @endforeach
    </div>
    <div class="w-100">
        @if ($services->hasMorePages())
            {{-- load more button centered --}}
            <div class="d-flex justify-content-center mt-5 mb-4 addmorebtn">
                <button wire:click="loadmore()" class="btn btn-primary" id="loadMore">Load More</button>
            </div>
        @else
            @if ($services->count() > 4)
                {{-- load less data --}}
                <div class="d-flex justify-content-center mt-5 mb-4 addmorebtn">
                    <button wire:click="loadless()" class="btn btn-primary" id="loadMore">Load Less</button>
                </div>
            @else
                {{-- no more data --}}
                <div class="d-flex justify-content-center mt-5 mb-4 addmorebtn">
                    <button class="btn btn-primary">No more Data</button>
                </div>
            @endif
        @endif
    </div>
</div>
