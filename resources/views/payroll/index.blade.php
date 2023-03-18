@extends('layout.app')
@section('content')
    <h1>Report Table</h1>
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
                    <a href="{{ route('payroll.create') }}" class="btn btn-primary">Create Payroll</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-md">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Jumlah Hari Kerja</th>
                                <th>Jumlah absensi</th>
                                <th>Jumlah terlambat</th>
                                <th>Jumlah gaji</th>
                                <th>Total Gaji</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($payrolls as $payroll)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $payroll->employee->name }}</td>
                                    <td>{{ $payroll->total_days }}</td>
                                    <td>{{ $payroll->count_absent }}</td>
                                    <td>{{ $payroll->count_late }}</td>
                                    <td>{{ $payroll->salary }}</td>
                                    <td>{{ $payroll->total_salary }}</td>
                                    <td>{{ $payroll->date }}</td>
                                    <td>
                                        <a href="{{ route('payroll.edit', $payroll->id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('payroll.destroy', $payroll->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <nav class="d-inline-block">
                        {{ $payrolls->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
