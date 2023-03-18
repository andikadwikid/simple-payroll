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
            <form action="{{ route('payroll.update', $payroll->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            <label>Pilih Karyawan</label>
                            <select class="form-control select2" name="employee_id" disabled>
                                <option value="{{ $payroll->employee_id }}" selected>{{ $payroll->employee->name }}</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Pilih Bulan</label>
                            <input type="month" name="date" class="form-control" id=""
                                value="{{ old('date', Carbon\Carbon::parse($payroll->date)->format('Y-m')) }}">
                        </div>

                        <div class="form-group">
                            <label>Jumlah Gaji</label>
                            <input type="number" name="salary" class="form-control"
                                value="{{ old('salary', $payroll->salary) }}" id="">
                        </div>

                        <div class="form-group">
                            <label>Total Hari Kerja</label>
                            <input type="number" name="total_days" class="form-control"
                                value="{{ old('total_days', $payroll->total_days) }}" id="">
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
