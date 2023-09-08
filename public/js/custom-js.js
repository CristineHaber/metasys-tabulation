// JavaScript code to update images when a file is selected
document.getElementById('event_logo').addEventListener('change', function (e) {
    const logoImage = document.getElementById('eventLogo');
    const file = e.target.files[0];
    if (file) {
        const imageUrl = URL.createObjectURL(file);
        logoImage.src = imageUrl;
    }
});

document.getElementById('event_banner').addEventListener('change', function (e) {
    const bannerImage = document.getElementById('eventBanner');
    const file = e.target.files[0];
    if (file) {
        const imageUrl = URL.createObjectURL(file);
        bannerImage.src = imageUrl;
    }
});

$(document).ready(function () {
    $('#num_judges').change(function () {
        // Get the number of judges entered by the user
        var numJudges = $(this).val();

        // Create input fields dynamically based on the number of judges
        var dynamicFieldsHtml = '';

        for (var i = 1; i <= numJudges; i++) {
            dynamicFieldsHtml += '<tr>';
            dynamicFieldsHtml += '<td><input type="text" class="form-control" name="judge_name' +
                i + '"></td>';
            dynamicFieldsHtml += '<td><input type="text" class="form-control" name="judge_number' +
                i + '"></td>';
            dynamicFieldsHtml += '<td><input type="text" class="form-control" name="user_type' + i +
                '" value="judge" readonly></td>';
            dynamicFieldsHtml += '<td><input type="text" class="form-control" name="judge_status' +
                i + '"></td>';
            dynamicFieldsHtml += '</tr>';
        }

        // Append the dynamic fields to the container
        $('#dynamicFieldsContainer').html(dynamicFieldsHtml);
    });

    $('#num_candidates').change(function () {
        // Get the number of candidates entered by the user
        var numCandidates = $(this).val();

        // Create input fields dynamically based on the number of candidates
        var dynamicFieldsHtml = '';

        for (var i = 1; i <= numCandidates; i++) {
            dynamicFieldsHtml += '<tr>';
            dynamicFieldsHtml +=
                '<td><input type="file" class="form-control" name="candidate_picture' + i +
                '" accept="image/*"></td>';
            dynamicFieldsHtml +=
                '<td><input type="text" class="form-control" name="candidate_name' + i +
                '" placeholder="Candidate Name"></td>';
            dynamicFieldsHtml +=
                '<td><input type="text" class="form-control" name="candidate_number' + i +
                '" placeholder="Candidate Number"></td>';
            dynamicFieldsHtml +=
                '<td><input type="text" class="form-control" name="candidate_address' + i +
                '" placeholder="Candidate Address"></td>';
            dynamicFieldsHtml +=
                '<td><input type="text" class="form-control" name="userType' + i +
                '" value="candidate" readonly></td>';
            dynamicFieldsHtml += '</tr>';
        }

        // Append the dynamic fields to the container
        $('#dynamicFieldsContainer1').html(dynamicFieldsHtml);
    });
});