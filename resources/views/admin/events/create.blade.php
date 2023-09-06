<x-layout>
    <div class="container-fluid px-4">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Add Event</a></li>
            <li class="breadcrumb-item active">Tables</li>
        </ol>
    </div>
    <div class="card mb-4">
        <div class="card-header  bg-dark text-white">
            <i class="fas fa-table me-1"></i>
            Event Details
        </div>
        <div class="card-body">
            <form class="row g-3" action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-md-4">
                    <label for="event_name" class="form-label">Event Name</label>
                    <input type="text" class="form-control" id="event_name" name="event_name" value=""
                        required>
                </div>
                <div class="col-md-4">
                    <label for="event_address" class="form-label">Event Address</label>
                    <input type="text" class="form-control" id="event_address" name="event_address" value=""
                        required>
                </div>
                <div class="col-md-3">
                    <label for="event_date" class="form-label">Event Date</label>
                    <input type="date" class="form-control" id="event_date" name="event_date" required>
                </div>
                <div class="col-md-3">
                    <label for="event_logo" class="form-label">Event Logo</label>
                    <input type="file" class="form-control" id="event_logo" name="event_logo" required>
                </div>
                <div class="col-md-3">
                    <label for="num_judges" class="form-label">No. of Panel</label>
                    <input type="number" class="form-control" id="num_judges" name="num_judges" required>
                </div>
                <div class="col-md-3">
                    <label for="num_candidates" class="form-label">No. of Participants</label>
                    <input type="number" class="form-control" id="num_candidates" name="num_candidates" required>
                </div>
                <div class="col-md-3">
                    <label for="num_rounds" class="form-label">No. of Rounds</label>
                    <input type="number" class="form-control" id="num_rounds" name="num_rounds" required>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Submit form</button>
                    <button class="btn btn-dark" type="button">Cancel</button>
                </div>
            </form>
        </div>

    </div>
    </div>
</x-layout>
