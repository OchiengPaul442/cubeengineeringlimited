<form @if (Request::is('portfolio/*/edit')) action="{{ route('portfolio.update', $portfolio->id) }}" @else action="{{ route('portfolio.store') }}" @endif class="mt-4 mb-3" enctype="multipart/form-data" method="POST">
    @csrf
    @if (Request::is('portfolio/*/edit'))
        @method('PUT')
    @else
        @method('POST')
    @endif
    <div class="mb-3">
        <label for="name" class="form-label">Portfolio name</label>
        <input type="text" class="form-control" name="name" id="name" placeholder=""
            @if (Request::is('portfolio/*/edit')) value="{{ $portfolio->name }}" @endif>
        @error('name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="status" class="form-label">Portfolio status</label>
        <select class="form-select" name="status" id="status" aria-label="Default select example">
            <option selected>
                @if (Request::is('portfolio/*/edit'))
                    {{ $portfolio->status }}
                @else
                    Open menu to select
                @endif
            </option>
            <option value="Complete">Complete</option>
            <option value="Running">Running</option>
            <option value="Upcoming">Upcoming</option>
        </select>
        @error('status')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Brief Description</label>
        <textarea class="form-control" id="description" name="about">
            @if (Request::is('portfolio/*/edit'))
{!! $portfolio->about !!}
@endif
        </textarea>
        @error('description')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label class="mb-2">Image Upload</label>
        <input type="file" class="form-control" name="image" id="portfolioimage">
    </div>
    @if (Request::is('portfolio/*/edit'))
    <div class="d-flex gap-3">
            <button type="submit" class="btn btn-success">Update portfolio</button>
            <a href="{{route('portfolio.create')}}" class="btn btn-secondary">Undo</a>
        </div>
    @else
        <button type="submit" class="btn btn-primary">Upload portfolio</button>
    @endif
</form>
