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
            <button class="btn btn-warning float-end">
                <i class="fas fa-edit"></i> Edit Details
            </button>

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

                    <form action="{{ route('admin.events.update', $event->id) }}" method="POST"
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
