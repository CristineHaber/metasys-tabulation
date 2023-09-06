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
            <form class="row g-3">
                <div class="col-md-4">
                  <label for="validationDefault01" class="form-label">Event Name</label>
                  <input type="text" class="form-control" id="validationDefault01" value="" required>
                </div>
                <div class="col-md-4">
                  <label for="validationDefault02" class="form-label">Event Address</label>
                  <input type="text" class="form-control" id="validationDefault02" value="" required>
                </div>
                <div class="col-md-3">
                  <label for="validationDefault05" class="form-label">Event Date</label>
                  <input type="date" class="form-control" id="validationDefault05" required>
                </div>
                <div class="col-md-3">
                    <label for="validationDefault05" class="form-label">Event Logo</label>
                    <input type="file" class="form-control" id="validationDefault05" required>
                  </div>
                  <div class="col-md-3">
                    <label for="validationDefault05" class="form-label">No. of Panel</label>
                    <input type="file" class="form-control" id="validationDefault05" required>
                  </div>
                  <div class="col-md-3">
                    <label for="validationDefault05" class="form-label">No. of Participants</label>
                    <input type="text" class="form-control" id="validationDefault05" required>
                  </div>
                  <div class="col-md-3">
                    <label for="validationDefault05" class="form-label">No. of Rounds</label>
                    <input type="text" class="form-control" id="validationDefault05" required>
                  </div>
                <div class="col-12">
                  <button class="btn btn-primary" type="submit">Submit form</button>
                  <button class="btn btn-dark" type="submit">Cancel</button>
                </div>
              </form>
        </div>
    </div>
    </div>
</x-layout>
