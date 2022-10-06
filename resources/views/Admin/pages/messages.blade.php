@extends('layout.admin.index')

@section('content')
    <div class="container-fluid mt-4 px-4">
        {{-- notification --}}
        @include('Admin.components.errors.notifications')
        <div class="text-success fs-1">Client Message</div>
        <div class="card mb-4">
            <div class="card-header">
                <x-carbon-column-dependency style="width: 20px;margin-right:10px" />
                Services DataTable
            </div>
            <div class="card-body">
                <table id="messagesTable">
                    <thead>
                        <tr>
                            <th>name</th>
                            <th>email</th>
                            <th>subject</th>
                            <th>message</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- display all messages --}}
                        @foreach ($messages as $message)
                            <tr>
                                <td>{{ $message->name }}</td>
                                <td>
                                    {{ $message->email }}
                                </td>
                                <td>{{ $message->subject }}</td>
                                <td>
                                    {{ $message->message }}
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn-sm btn" type="button" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <x-carbon-overflow-menu-horizontal style="width:20px;" />
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="{{ route('messages.show', $message->id) }}"
                                                    class="dropdown-item">View</a>
                                            </li>
                                            <li>
                                                <a href="" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteRecord">Delete</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @if (Request::is('messages/*'))
        {{-- display message --}}
        <div class="container-fluid mt-4 px-4">
            <div class="d-flex justify-content-between p-2 align-items-center">
                <div class="text-success fs-1">Message View</div>
                <div>
                    <a href="{{ route('messages.index') }}" class="btn btn-sm btn-secondary">close view</a>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between">
                    <div>
                        <x-carbon-column-dependency style="width: 20px;margin-right:10px" />
                        Message
                    </div>
                    <div>
                        <a href="mailto:{{ $message->email }}">
                            <x-carbon-mail-reply style="width:26px;margin-right:10px" />
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">From:</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input class="w-100 outline-none border-none" name="name"
                                        value="{{ $message->name }}" disabled type="text">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email:</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input class="w-100 outline-none border-none" name="name"
                                        value="{{ $message->email }}" disabled type="text">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Subject:</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input class="w-100 outline-none border-none" name="name"
                                        value="{{ $message->subject }}" disabled type="text">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="message" class="mb-3">Message</label>
                                    <textarea name="message" id="message" cols="30" rows="10" class="form-control" disabled>{!! $message->message !!}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
