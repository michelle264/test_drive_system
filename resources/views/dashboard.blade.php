@extends('layouts')

@section('content')

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="/">Test Drive System</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto"> 
            <li class="nav-item">
                    <a class="nav-link" href="/"><div class='logout'>Logout</div></a>
                </li>
                
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    @if (session('message'))
        <div class="alert {{ session('eligibleForDiscount') ? 'alert-success' : 'alert-danger' }}">
            {{ session('message') }}
        </div>
    @endif
    <h1>Customer Registration Lists</h1>

    <!-- search bar -->
    <div class="input-group my-2 my-lg-0">
        <input type="text" class="form-control" placeholder="Search..." id="search-input">
        <div class="input-group-append mr-sm-2">
            <button class="btn btn-outline-secondary" type="button" id="search-button">Search</button>
        </div>
    


    <table class="table" id="registrations-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Test Drive Date</th>
                <th>Test Drive Time</th>
                <th>Down Payment Amount (RM)</th>
                <th>Purchase Status</th>
                <th>Loan Amount (RM)</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($registrations as $registration)
            <tr data-id="{{ $registration->id }}">
                <td>{{ $registration->name }}</td>
                <td>{{ $registration->email }}</td>
                <td>{{ $registration->test_drive_date }}</td>
                <td>{{ $registration->test_drive_time }}</td>
                <td>{{ $registration->down_payment_amount }}</td>
                <td>{{ $registration->purchase_status }}</td>
                <td>{{ $registration->loan_amount }}</td>
                <td>
                <form action="{{ route('checkEligibility', ['id' => $registration->id]) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">Check Eligibility</button>
                </form>
                <form action="{{ route('customers.update', ['id' => $registration->id]) }}" method="POST">
                @csrf 
                @method('POST')
                    <button type="button" class="btn btn-primary update-information " data-registration-id="{{ $registration->id }}">Update Information</button>
</form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
        // Add event listener to Check Eligibility buttons
        const checkEligibilityButtons = document.querySelectorAll('.check-eligibility');
        checkEligibilityButtons.forEach(button => {
            button.addEventListener('click', function () {
                const registrationId = this.closest('tr').getAttribute('data-id');
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `/checkEligibility/${registrationId}`;
                form.style.display = 'none'; 
                document.body.appendChild(form);
                form.submit();
            });
        });

    // Add event listener to Update Information buttons
    document.addEventListener('DOMContentLoaded', function () {
        const updateButtons = document.querySelectorAll('.update-information');
        updateButtons.forEach(button => {
            button.addEventListener('click', function () {
                // Get the registration ID from the data attribute
                const registrationId = this.getAttribute('data-registration-id');
                const url = `/customers/update/${registrationId}`;
                window.location.href = url;
            });
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('search-button').addEventListener('click', function () {
            const searchText = document.getElementById('search-input').value.toLowerCase();
            const rows = document.querySelectorAll('#registrations-table tbody tr');

            rows.forEach(row => {
                const name = row.querySelector('td:first-child').textContent.toLowerCase();
                const email = row.querySelector('td:nth-child(2)').textContent.toLowerCase();

                if (name.includes(searchText) || email.includes(searchText)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    });


</script>

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

        .btn {
        margin-bottom: 5px; 
    }
        </style>

@endsection
