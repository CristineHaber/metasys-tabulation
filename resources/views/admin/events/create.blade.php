<x-layout>
    <div class="container-fluid px-4">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Add Event</a></li>
            <li class="breadcrumb-item active">Tables</li>
        </ol>
    </div>
    <div class="card mb-4">
        <div class="card-header bg-dark text-white">
            <i class="fas fa-table me-1"></i>
            Event Details
        </div>
        <div class="card-body">
            <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="event_name" class="form-label">Event Name</label>
                        <input type="text" class="form-control" id="event_name" name="event_name" value=""
                            required>
                    </div>
                    <div class="col-md-6">
                        <label for="event_place" class="form-label">Event Address</label>
                        <input type="text" class="form-control" id="event_place" name="event_place" value=""
                            required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="event_date" class="form-label">Event Date</label>
                        <input type="date" class="form-control" id="event_date" name="event_date" required>
                    </div>
                    <div class="col-md-6">
                        <label for="event_logo" class="form-label">Event Logo</label>
                        <input type="file" class="form-control" id="event_logo" name="event_logo" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="num_judges" class="form-label">No. of Panel</label>
                        <input type="number" class="form-control" id="num_judges" name="num_judges" required>
                    </div>
                    <div class="col-md-4">
                        <label for="num_candidates" class="form-label">No. of Participants</label>
                        <input type="number" class="form-control" id="num_candidates" name="num_candidates" required>
                    </div>
                    <div class="col-md-4">
                        <label for="num_rounds" class="form-label">No. of Rounds</label>
                        <input type="number" class="form-control" id="num_rounds" name="num_rounds" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <!-- Add a button to trigger the dynamic input fields -->
                        <button class="btn btn-primary" type="button" id="addDynamicFields">Add Dynamic Fields</button>
                        <button class="btn btn-primary" type="submit">Submit form</button>
                        <button class="btn btn-dark" type="button">Cancel</button>
                    </div>
                </div>
                <!-- Container to hold the dynamic input fields -->
                <div class="container mt-5">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Judges</th>
                                <th>Participants</th>
                                <th>Rounds</th>
                            </tr>
                        </thead>
                        <tbody id="dynamicFieldsContainer">
                            <!-- Generated form fields will be inserted here -->
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#addDynamicFields').click(function() {
                // Get the values entered for panels, participants, and rounds
                var numJudges = $('#num_judges').val();
                var numCandidates = $('#num_candidates').val();
                var numRounds = $('#num_rounds').val();

                // Create input fields dynamically based on the entered values
                var dynamicFieldsHtml = '';

                for (var i = 1; i <= Math.max(numJudges, numCandidates, numRounds); i++) {
                    dynamicFieldsHtml += '<tr>';

                    if (i <= numJudges) {
                        dynamicFieldsHtml += '<td><input type="text" class="form-control" name="judge_' +
                            i + '"></td>';
                    } else {
                        dynamicFieldsHtml += '<td></td>';
                    }

                    if (i <= numCandidates) {
                        dynamicFieldsHtml +=
                            '<td><input type="text" class="form-control" name="participant_' + i +
                            '"></td>';
                    } else {
                        dynamicFieldsHtml += '<td></td>';
                    }

                    if (i <= numRounds) {
                        dynamicFieldsHtml += '<td><input type="text" class="form-control" name="round_' +
                            i + '"></td>';
                    } else {
                        dynamicFieldsHtml += '<td></td>';
                    }

                    dynamicFieldsHtml += '</tr>';
                }

                // Append the dynamic fields to the container
                $('#dynamicFieldsContainer').html(dynamicFieldsHtml);
            });
        });
    </script>
</x-layout>
