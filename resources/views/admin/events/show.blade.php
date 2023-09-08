<x-layout>
    <div class="container-fluid px-4">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Event</a></li>
            <li class="breadcrumb-item active">Tables</li>
        </ol>
    </div>
    <div class="card mb-4">
        <div class="card-header bg-dark text-white">
            <i class="fas fa-table me-1"></i>
            Event Details
            <button class="btn btn-warning float-end" data-bs-toggle="modal" data-bs-target="#editDetailsModal">
                <i class="fas fa-edit"></i> Edit Details
            </button>

            <!-- Edit Details Modal -->
            <div class="modal fade" id="editDetailsModal" tabindex="-1" aria-labelledby="editDetailsModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editDetailsModalLabel">Edit Event Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="{{ route('admin.events.update', $event->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <!-- Your form fields for editing event details go here -->
                                <div class="mb-3">
                                    <label for="event_name" class="form-label">Event Name</label>
                                    <input type="text" class="form-control" id="event_name" name="event_name"
                                        value="{{ $event->event_name }}">
                                </div>

                                <div class="mb-3">
                                    <label for="event_place" class="form-label">Event Address</label>
                                    <input type="text" class="form-control" id="event_place" name="event_place"
                                        value="{{ $event->event_place }}">
                                </div>

                                <div class="mb-3">
                                    <label for="event_date" class="form-label">Event Date</label>
                                    <input type="text" class="form-control" id="event_date" name="event_date"
                                        value="{{ $event->event_date }}">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

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
                    <tr>
                        <td>Participants</td>
                        <td>{{ $event->candidates->count() }}</td>
                    </tr>

                    <form action="{{ route('admin.events.update-image', $event->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <tr>
                            <td>
                                <img src="{{ asset('storage/' . $event->event_logo) }}" alt="" id="eventLogo"
                                    width="70px">
                            </td>
                            <td>
                                <label for="event_logo" class="btn btn-primary">
                                    <i class="fas fa-image"></i> Change Logo <input type="file" id="event_logo"
                                        name="event_logo" style="display: none;">
                                </label>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <img src="{{ asset('storage/' . $event->event_banner) }}" alt=""
                                    id="eventBanner" width="70px">
                            </td>
                            <td>
                                <label for="event_banner" class="btn btn-primary">
                                    <i class="fas fa-image"></i> Change Banner <input type="file" id="event_banner"
                                        name="event_banner" style="display: none;">
                                </label>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2">
                                <button class="btn btn-success" type="submit">Save Changes</button>
                            </td>
                        </tr>
                    </form>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header bg-dark text-white">
            <i class="fas fa-table me-1"></i>
            Judges
            <button class="btn btn-warning float-end">
                <i class="fas fa-plus"></i> Add Judge
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name of Judge</th>
                            <th>Type of Judge</th>
                            <th>Username</th>
                            <th>Phone No</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Name of Judge</th>
                            <th>Type of Judge</th>
                            <th>Username</th>
                            <th>Phone No</th>
                            <th>Action</th>
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
                                <td>
                                    <button class="btn btn-primary"><i class="fas fa-edit"></i> Edit</button>
                                    <button class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header bg-dark text-white">
            <i class="fas fa-table me-1"></i>
            Candidate
            <button class="btn btn-warning float-end">
                <i class="fas fa-plus"></i> Add Candidate
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Picture</th>
                            <th>Candidate Name</th>
                            <th>Candidate Number</th>
                            <th>Candidate Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Picture</th>
                            <th>Candidate Name</th>
                            <th>Candidate Number</th>
                            <th>Candidate Address</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($event->candidates as $candidate)
                            <tr>
                                <td> <img
                                        src="{{ $candidate->candidate_picture ? asset('storage/' . $candidate->candidate_picture) : '' }}"
                                        alt="" width="70px" class="rounded-circle"></td>
                                <td>{{ $candidate->candidate_name }}</td>
                                <td>{{ $candidate->candidate_number }}</td>
                                <td>{{ $candidate->candidate_address }}</td>
                                <td>
                                    <button class="btn btn-primary"><i class="fas fa-edit"></i> Edit</button>
                                    <button class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>
