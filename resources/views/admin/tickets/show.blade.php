@extends('layouts.app')

@section('content')
    <h3>Ticket : {{ ucfirst($ticket->ticket_type) }}</h3>
    <p><strong>Type:</strong> {{ ucfirst($ticket->ticket_type) }}</p>
    <p><strong>Subject:</strong> {{ $ticket->subject }}</p>
    <p><strong>Description:</strong> {{ $ticket->description }}</p>
    <p><strong>Email:</strong> {{ $ticket->email }}</p>

    <hr>
    <form method="POST" action="{{ route('admin.tickets.note', ['department' => strtolower($ticket->ticket_type), 'id' => $ticket->id]) }}">
        @csrf
        <label>Add Note:</label>
        <input id="note" type="hidden" name="note">
        <trix-editor input="note"></trix-editor>
        <button class="btn btn-primary mt-3">Save Note & Mark as Noted</button>
    </form>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/2.0.0/trix.umd.min.js"></script>
@endpush