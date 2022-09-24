@extends('layout.admin.index')

@section('content')
    <div class="container-fluid mt-4 px-4">
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
                            {{-- <th>Action</th> --}}
                        </tr>
                    </thead>                    
                    <tbody>
                        {{-- display all projects --}}
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
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
