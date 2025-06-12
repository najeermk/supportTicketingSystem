@extends('layouts.app')

@section('content')
<div class="d-flex flex-column justify-content-center align-items-center">
    <h1 >Support Ticketing System</h1>
    <div class="card shadow mt-4" style="max-width: 650px; width: 100%;">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Submit a Support Ticket</h5>
        </div>
        <div class="card-body">

            {{-- success and error messages --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Please fix the following issues:</strong>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{-- support form --}}
            <form method="POST" action="{{ route('tickets.store') }}">
                @csrf

                <div class="mb-3">
                    <label for="ticket_type" class="form-label">Ticket Type</label>
                    <select name="ticket_type" id="ticket_type" class="form-select" required>
                        <option value="">Select Type</option>
                        <option value="technical">Technical Issues</option>
                        <option value="billing">Billing</option>
                        <option value="feedback">Feedback</option>
                        <option value="products">Products</option>
                        <option value="inquiries">Inquiries</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="subject" class="form-label">Subject</label>
                    <input type="text" name="subject" id="subject" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-success">Submit Ticket</button>
            </form>
        </div>
    </div>
</div>
@endsection
