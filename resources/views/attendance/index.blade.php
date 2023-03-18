@extends('layout.app')
@section('content')
    <h1>Attendance Table</h1>
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

            <form action="{{ route('attendance.index') }}" class="d-flex flex-row mb-3">
                <input type="date" class="form-control mr-2" name="start_date">
                <input type="date" class="form-control mr-2" name="end_date">
                <button type="submit" class="btn btn-primary">Search</button>
            </form>

            <div class="card">

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-md">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Waktu Masuk</th>
                                <th>Waktu Pulang</th>
                                <th>Tanggal</th>
                                <th>Terlambat</th>
                                <th>Hadir</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($attendances as $attendance)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $attendance->employee->name }}</td>
                                    <td>{{ $attendance->checkin_time }}</td>
                                    <td>{{ $attendance->checkout_time ?: '-' }}</td>
                                    <td>{{ $attendance->date }}</td>
                                    <td>
                                        @if ($attendance->late == true)
                                            <span class="badge badge-danger">Terlambat</span>
                                        @else
                                            <span class="badge badge-success">Tidak Terlambat</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{-- {{ dd($attendance->absense) }} --}}
                                        @if ($attendance->absent == true)
                                            <span class="badge badge-success">Hadir</span>
                                        @else
                                            <span class="badge badge-danger">Tidak Hadir</span>
                                        @endif

                                    </td>
                                    @if (!$attendance->checkout_time)
                                        <td>
                                            <form action="{{ route('attendance.checkout', $attendance->id) }}"
                                                method="POST" class="d-inline">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-warning">Pulang</button>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                            {{-- <tr>
                                <td>1</td>
                                <td>Irwansyah Saputra</td>
                                <td>2017-01-09</td>
                                <td>Jl. Kebon Jeruk</td>
                                <td>08123456789</td>
                                <td>p</td>
                                <td>
                                    <div class="badge badge-success">Active</div>
                                </td>
                                <td><a href="#" class="btn btn-secondary">Detail</a></td>
                            </tr> --}}

                        </table>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <nav class="d-inline-block">
                        {{ $attendances->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
