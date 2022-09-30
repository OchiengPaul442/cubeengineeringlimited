<form
    @if (Request::is('services/*/edit')) action="{{ route('services.update', $service->id) }}" @else action="{{ route('services.store') }}" @endif
    class="mt-4 mb-3" enctype="multipart/form-data" id="service-form" method="POST">
    @csrf
    @if (Request::is('services/*/edit'))
        @method('PUT')
        <input type="hidden" name="method" id="method-type" value="PUT">
    @else
        @method('POST')
        <input type="hidden" name="method" id="method-type" value="POST">
    @endif
    <div class="mb-3">
        <label for="name" class="form-label">Service name</label>
        <input type="text" class="form-control" name="name" id="name" placeholder=""
            @if (Request::is('services/*/edit')) value="{{ $service->name }}" @endif>
        @error('name')
            <p class="message-block text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Brief Description</label>
        <input class="form-control" id="description" name="description"
       value = " @if (Request::is('services/*/edit'))
            {{ $service->description }}
        @endif">
        @error('description')
            <p class="message-block text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-3">
        <label for="details" class="form-label">Details</label>
        <textarea class="form-control" id="details" name="details" style="height:150px;max-height: 200px">
            @if (Request::is('services/*/edit'))
{!! $service->details !!}
@endif
        </textarea>
        @error('details')
            <p class="message-block text-danger">{{ $message }}</p>
        @enderror
    </div>
    {{-- editor --}}

    <div class="mb-3">
        <div class="mb-3">
            <label class="mb-2">Image Upload</label>
            <input type="file" name="image" id="serviceimage">
        </div>
    </div>
    @if (Request::is('services/*/edit'))
    <div class="d-flex gap-3">
            <button type="submit" class="btn btn-success">Update service</button>
            <a href="{{route('services.create')}}" class="btn btn-secondary">Undo</a>
        </div>
    @else
        <button type="submit" class="btn btn-primary">Upload service</button>
    @endif
</form>
