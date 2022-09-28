<div class="card-body">
    <form action="{{ route('Auth.update', $user->id) }}" method="POST">
        @csrf
        @if (Request::is('Auth/*/edit'))
            @method('PUT')
        @else
            @method('POST')
        @endif
        <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">Full Name</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                <input class="w-100 outline-none border-none" name="name"
                    @if (Request::is('Auth/*/edit')) value="{{ $user->name }}" @else value="{{ $user->name }}" disabled @endif
                    type="text">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">Email</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                <input class="w-100 outline-none border-none" name="email"
                    @if (Request::is('Auth/*/edit')) value="{{ $user->email }}" @else value="{{ $user->email }}" disabled @endif
                    type="email">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">Role</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                <input class="w-100 outline-none border-none" name="role"
                    @if (Request::is('Auth/*/edit')) value="{{ $user->role }}" @else value="{{ $user->role }}" disabled @endif
                    type="text">
                @error('role')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">Phone</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                <input class="w-100 outline-none border-none" name="phone"
                    @if (Request::is('Auth/*/edit')) value="{{ $user->phone }}" @else value="{{ $user->phone }}" disabled @endif
                    type="text">
                @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">Address</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                <input class="w-100 outline-none border-none" name="address"
                    @if (Request::is('Auth/*/edit')) value="{{ $user->address }}" @else value="{{ $user->address }}" disabled @endif
                    type="text">
                @error('address')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <hr>
        <div class="w-100">
            @if (Request::is('Auth/*/edit'))
                <div class="d-flex gap-3 col-sm-12">
                    <div class="">
                        <button class="btn btn-success " type="submit" href="">save
                            changes</button>
                        <a class="btn btn-secondary" href="{{ route('Auth.show', $user->id) }}">No</a>
                    </div>
                </div>
            @else
                <div class="col-sm-12">
                    <a class="btn btn-info" href="{{ route('Auth.edit', $user->id) }}">Edit</a>
                </div>
            @endif
        </div>
    </form>
</div>
