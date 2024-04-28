@extends('layouts')

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
                    <a class="nav-link" href="/"><div class='logout'>Logout</div></a>
                </li>
                
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Update Customer Information</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('customers.update', $customer->id) }}" method="POST">
                @csrf
                @method('POST')
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $customer->name }}" readonly>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $customer->email }}" readonly>
                </div>
                <div class="form-group">
                    <label for="down_payment">Down Payment Amount:</label>
                    <input type="number" class="form-control" id="down_payment" name="down_payment_amount" value="{{ $customer->down_payment_amount }}">
                </div>
                <div class="form-group">
                    <label for="purchase_status">Purchase Status:</label>
                    <select class="form-control" id="purchase_status" name="purchase_status">
                        <option value="pending" {{ $customer->purchase_status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="completed" {{ $customer->purchase_status == 'completed' ? 'selected' : '' }}>Completed</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="loan_amount">Loan Amount:</label>
                    <input type="number" class="form-control" id="loan_amount" name="loan_amount" value="{{ $customer->loan_amount }}" readonly>
                </div>
                <button type="submit" class="btn btn-primary">Update Information</button>
            </form>
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

        .logout{
            margin-left: 950px;
           
        }


        </style>
@endsection
