<form
    @if (Request::is('FAQs/*/edit')) action="{{ route('FAQs.update', $FAQs->id) }}" @else action="{{ route('FAQs.store') }}" @endif
    class="mt-4 mb-3" enctype="multipart/form-data" method="POST">
    @csrf
    @if (Request::is('FAQs/*/edit'))
        @method('PUT')
    @else
        @method('POST')
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
        <label for="question" class="form-label">Question</label>
        <input type="text" class="form-control" name="question" id="question" placeholder=""
            @if (Request::is('FAQs/*/edit')) value="{{ $FAQs->question }}" @endif>
        @error('question')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="question" class="form-label">Answer</label>
        <textarea class="form-control" id="question" name="answer" style="height:150px;max-height: 200px">
            @if (Request::is('FAQs/*/edit'))
{{ $FAQs->answer }}
@endif
        </textarea>
        @error('question')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    @if (Request::is('FAQs/*/edit'))
        <button type="submit" class="btn btn-success">Update FAQs</button>
    @else
        <button type="submit" class="btn btn-primary">Upload FAQs</button>
    @endif
</form>
