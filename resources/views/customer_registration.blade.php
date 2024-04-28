@extends('layouts') 
@section('title', 'Registration')
@section('content')


<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="/">Test Drive System</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- <ul class="navbar-nav">
            </ul> -->
            <ul class="navbar-nav ml-auto"> 
            <li class="nav-item">
                    <a class="nav-link" href="/loginstaff">Login as Staff</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/registerstaff">Register as Staff</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Customer Test Drive Registration Form</h4>
                </div>
                <div class="card-body">
                @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                            @error('name')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="text" class="form-control" id="phone" name="phone_number" required>
                            @error('phone_number')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                            @error('email')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <label for="test_drive_date">Test Drive Date</label>
                                <input type="date" class="form-control" id="test_drive_date" name="test_drive_date" required min="{{ date('Y-m-d')}}">
                                @error('test_drive_date')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="test_drive_time">Test Drive Time (HH:MM AM/PM)</label>
                                <input type="text" class="form-control" id="test_drive_time" name="test_drive_time" required>
                                @error('test_drive_time')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="down_payment">Down Payment Amount</label>
                            <input type="number" class="form-control" id="down_payment" name="down_payment_amount" required>
                            @error('down_payment_amount')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="purchase_status">Purchase Status</label>
                            <select class="form-control" id="purchase_status" name="purchase_status">
                                <option value="pending">Pending</option>
                                <option value="completed">Completed</option>
                            </select>
                            @error('purchase_status')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="loan_amount">Loan Amount</label>
                            <input type="number" class="form-control" id="loan_amount" name="loan_amount" step="0.01">
                            @error('loan_amount')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.navbar {
            background-color: #343a40; 
        }
        
        .navbar-brand {
            color: white; 
        }
        .navbar-nav .nav-link {
            color: white;
            margin-right: 20px;
        }


        </style>
@endsection
