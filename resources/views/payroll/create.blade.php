@extends('layout.app')
@section('content')
    <h1>Create Attendance</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Components</a></div>
        <div class="breadcrumb-item">Table</div>
    </div>
    </div>

    @if (session('error'))
        <div class="alert alert-danger mb-2">
            {{ session('error') }}
        </div>
    @endif

    <div class="row">
        <div class="col-6">
            <form action="{{ route('payroll.store') }}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            <label>Pilih Karyawan</label>
                            <select class="form-control select2" name="employee_id">
                                @foreach ($schedules as $schedule)
                                    <option value="{{ $schedule->employee->id }}">{{ $schedule->employee->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Pilih Bulan</label>
                            <input type="month" name="date" class="form-control" id="">
                        </div>

                        <div class="form-group">
                            <label>Jumlah Gaji</label>
                            <input type="number" name="salary" class="form-control" id="">
                        </div>

                        <div class="form-group">
                            <label>Total Hari Kerja</label>
                            <input type="number" name="total_days" class="form-control" id="">
                        </div>

                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
