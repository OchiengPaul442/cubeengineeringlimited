<form
    @if (Request::is('timeline/*/edit')) action="{{ route('timeline.update', $timeline->id) }}" @else action="{{ route('timeline.store') }}" @endif
    class="mt-4 mb-3" enctype="multipart/form-data" method="POST">
    @csrf
    @if (Request::is('timeline/*/edit'))
        @method('PUT')
    @else
        @method('POST')
    @endif
    <div class="mb-3">
        <label for="quote" class="form-label">Daily Quotes</label>
        <input type="text" class="form-control" name="quote" id="quote" placeholder=""
            @if (Request::is('timeline/*/edit')) value="{{ $timeline->quote }}" @endif>
        @error('quote')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" name="title" id="title" placeholder=""
            @if (Request::is('timeline/*/edit')) value="{{ $timeline->title }}" @endif>
        @error('title')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label class="mb-2">Image Upload</label>
        <input type="file" class="" name="image" id="timelineimage">
    </div>


    @if (Request::is('timeline/*/edit'))
        <div class="d-flex gap-3">
            <button type="submit" class="btn btn-success">Update timeline</button>
            <a href="{{route('timeline.create')}}" class="btn btn-secondary">Undo</a>
        </div>
    @else
        <button type="submit" class="btn btn-primary">Upload timeline</button>
    @endif
</form>
