@extends('layout.app')
@section('content')
    <h1>Employee Table</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Components</a></div>
        <div class="breadcrumb-item">Table</div>
    </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success my-2">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger my-2">
            {{ session('error') }}
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <a href="{{ route('employee.create') }}" class="btn btn-primary">Create Employee</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-md">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                {{-- <th>Tanggal Lahir</th> --}}
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Division</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($employees as $employee)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $employee->name }}</td>
                                    {{-- <td>{{ $employee->date_of_birth }}</td> --}}
                                    <td>{{ $employee->address }}</td>
                                    <td>{{ $employee->phone }}</td>
                                    <td>{{ $employee->email }}</td>
                                    <td>{{ $employee->divisions->name }}</td>
                                    <td>
                                        <a href="{{ route('employee.edit', $employee->id) }}"
                                            class="btn btn-warning">Edit</a>
                                        <form action="{{ route('employee.destroy', $employee->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            {{-- <td>1</td>
                                <td>Irwansyah Saputra</td>
                                <td>2017-01-09</td>
                                <td>Jl. Kebon Jeruk</td>
                                <td>08123456789</td>
                                <td>p</td>
                                <td>
                                    <div class="badge badge-success">Active</div>
                                </td>
                                <td><a href="#" class="btn btn-secondary">Detail</a></td> --}}

                        </table>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <nav class="d-inline-block">
                        {{ $employees->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
