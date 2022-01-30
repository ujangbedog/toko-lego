@extends('admin.layouts.app')

@section('content')
<div class="right_col" role="main">
    <div class="container col-md-8">
        <div class="row justify-content-center">
            <div class="col">
                <h2>Orders</h2>
                <br>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Email</th>
                                <th>Roles</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if($user->is_admin == 1)
                                        Admin
                                        @else
                                        Customer
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.users.edit', $user->id) }}"
                                            class="btn btn-info btn-sm"><span class="fa fa-pencil"></span></a>
                                        <form action="{{ route('admin.users.destroy', $user->id) }}"
                                            method="POST" class="d-inline">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus Data?')"><span class="fa fa-trash"></span></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 