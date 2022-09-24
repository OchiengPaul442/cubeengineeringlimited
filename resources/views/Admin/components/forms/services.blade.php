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
    {{-- display success message --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif (session('fail'))
        <div class="alert alert-danger">
            {{ session('fail') }}
        </div>
    @endif
    <div class="mb-3">
        <label for="name" class="form-label">Service name</label>
        <input type="text" class="form-control" name="name" id="name" placeholder=""
            @if (Request::is('services/*/edit')) value="{{ $service->name }}" @endif>
        <p class="message-block text-danger name_error"></p>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Brief Description</label>
        <textarea class="form-control" id="description" name="description" style="height:150px;max-height: 200px">
            @if (Request::is('services/*/edit'))
{{ $service->description }}
@endif
        </textarea>
        <p class="message-block text-danger description_error"></p>
    </div>
    <div class="mb-3">
        <label for="details" class="form-label">Details</label>
        <textarea class="form-control" id="details" name="details" style="height:150px;max-height: 200px">
            @if (Request::is('services/*/edit'))
{{ $service->details }}
@endif
        </textarea>
        <p class="message-block text-danger details_error"></p>
    </div>
    {{-- editor --}}

    <div class="mb-3">
        <label class="mb-2" for="serviceimage">Image Upload</label>
        <div class="input-group mb-3">
            <input type="file" class="form-control" name="image" >
        </div>
        <p class="message-block text-danger image_error"></p>
    </div>
    @if (Request::is('services/*/edit'))
        <button type="submit" class="btn btn-success">Update service</button>
    @else
        <button type="submit" class="btn btn-primary">Upload service</button>
    @endif
</form>
