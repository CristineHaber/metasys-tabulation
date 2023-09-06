<x-layout>
    <div class="container-fluid px-4">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Event</a></li>
            <li class="breadcrumb-item active">Tables</li>
        </ol>
    </div>
    <div class="card mb-4">
        <div class="card-header  bg-dark text-white">
            <i class="fas fa-table me-1"></i>
            Event Details
            <button class="btn btn-warning float-end">Edit Details</button>
        </div>
        <div class="card-body">
            <table class="table">
                <tbody>
                    <tr>
                        <td>Name of Event</td>
                        <td>{{ $event->event_name }}</td>
                    </tr>
                    <tr>
                        <td>Event Address</td>
                        <td>{{ $event->event_place }}</td>
                    </tr>
                    <tr>
                        <td>Date of Event</td>
                        <td>{{ \Carbon\Carbon::parse($event->event_date)->format('m/d/Y') }}</td>
                    </tr>
                    <tr>
                        <td>Judges</td>
                        <td>{{ $event->judges->count() }}</td>
                    </tr>
                    <!-- Add more event details here as needed -->
                </tbody>
            </table>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header bg-dark text-white">
            <i class="fas fa-table me-1"></i>
            Judges
            <button class="btn btn-warning float-end">Add Judge</button>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name of Judge</th>
                        <th>Type of Judge</th>
                        <th>Username</th>
                        <th>Phone No</th>
                        <th>Rounds</th>
                        <th></th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Name of Judge</th>
                        <th>Type of Judge</th>
                        <th>Username</th>
                        <th>Phone No</th>
                        <th>Rounds</th>
                        <th></th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($event->judges as $judge)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $judge->judge_name }}</td>
                            <td>{{ $judge->userType }}</td>
                            <td>{{ $judge->judge_username }}</td>
                            <td>{{ $judge->judge_number }}</td>
                            <td>1</td>
                            <td>
                                <button class="btn btn-primary">Edit</button>
                                <button class="btn btn-danger">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout>
