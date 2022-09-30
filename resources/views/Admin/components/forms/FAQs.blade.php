<form
    @if (Request::is('FAQs/*/edit')) action="{{ route('FAQs.update', $FAQ->id) }}" @else action="{{ route('FAQs.store') }}" @endif
    class="mt-4 mb-3" enctype="multipart/form-data" method="POST">
    @csrf
    @if (Request::is('FAQs/*/edit'))
        @method('PUT')
    @else
        @method('POST')
    @endif
    <div class="mb-3">
        <label for="question" class="form-label">Question</label>
        <input type="text" class="form-control" name="question" id="question" placeholder=""
            @if (Request::is('FAQs/*/edit')) value="{{ $FAQ->question }}" @endif>
        @error('question')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="question" class="form-label">Answer</label>
        <textarea class="form-control" id="answer" name="answer" >
            @if (Request::is('FAQs/*/edit'))
{!! $FAQ->answer !!}
@endif
        </textarea>
        @error('question')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    @if (Request::is('FAQs/*/edit'))
    <div class="d-flex gap-3">
            <button type="submit" class="btn btn-success">Update FAQs</button>
            <a href="{{route('FAQs.create')}}" class="btn btn-secondary">Undo</a>
        </div>
    @else
        <button type="submit" class="btn btn-primary">Upload FAQs</button>
    @endif
</form>
