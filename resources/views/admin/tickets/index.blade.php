@extends('layouts.app')

@section('content')
    <h3>Tickets</h3>
    <table id="ticketsTable" class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Type</th>
                <th>Subject</th>
                <th>Email</th>
                <th>Description</th>
                <th>Status</th>
                <th>Notes</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tickets as $index => $ticket)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ ucfirst($ticket->ticket_type) }}</td>
                    <td>{{ $ticket->subject }}</td>
                    <td>{{ $ticket->email }}</td>
                    <td>{{ $ticket->description }}</td>
                    <td>{{ $ticket->status }}</td>
                    <td>{{ $ticket->notes }}</td>
                    <td>
                        <a href="{{ route('admin.tickets.show', ['department' => strtolower($ticket->ticket_type), 'id' => $ticket->id]) }}" class="btn btn-sm btn-info">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function () {
        $('#ticketsTable').DataTable();
    });
</script>
@endpush