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
            Events
        </div>
        <div class="card-body">
            <table id="datatablesSimple" class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name of Event</th>
                        <th>Date of Event</th>
                        <th>Details</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Name of Event</th>
                        <th>Date of Event</th>
                        <th>Details</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($events as $event)
                        <tr>
                            <td>{{ $event->id }}</td>
                            <td>{{ $event->event_name }}</td>
                            <td>{{ \Carbon\Carbon::parse($event->event_date)->format('m/d/Y') }}</td>
                            <td><a href="#">See Details</a></td>
                            <td>{{ $event->event_status }}</td>
                            <td>
                                <button class="btn btn-danger btn-sm mx-2" type="button" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal{{ $event->id }}">
                                    <i data-feather="trash-2"></i> Delete
                                </button>
                            
                                <div class="modal fade" id="deleteModal{{ $event->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="deleteModalLabel{{ $event->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel{{ $event->id }}">
                                                    Confirm Deletion
                                                </h5>
                                                <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to delete this event?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                                                <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
    </div>
</x-layout>
