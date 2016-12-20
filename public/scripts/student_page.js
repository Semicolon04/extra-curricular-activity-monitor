var awardForm = '<div class="container"><div class="form-group col-xs-3">' +
'<label for="award_name">Name:</label><input type="text" class="form-control input-sm"' +
' name="award_name"></div><div class="form-group col-xs-2"><label for="year">' +
'Year:</label><input type="text" class="form-control input-sm" name="year"></div>' +
'<div class="form-group col-xs-3"><label for="organization">Organization:' +
'</label><input type="text" class="form-control input-sm" name="organization"></div>' +
'<a class="col-xs-1 remove-award"><br>remove</a></div>';

$(document).ready(function() {
    $('button.add-award').click(function() {
        $(this).siblings('.award-fields').append($(awardForm));
    });

    $(document).on('click', 'a.remove-award', function() {
        $(this).parent().parent().remove();
    });

    $('#submit-activity-button').click(function() {
        var activityData = {};
        var $form = $('#new-activity');
        activityData.title = $form.find("input[name='title']").val();
        activityData.description = $form.find("textarea[name='description']").val();
        activityData.year = $form.find("input[name='year']").val();

        activityData.awards = [];
        var $awardFields = $('#new-activity').find('.award-fields');
        $awardFields.children().each(function() {
            awardDetail = {};
            awardDetail.awardName = $(this).find("input[name='award_name']").val()
            awardDetail.year = $(this).find("input[name='year']").val();
            awardDetail.organization = $(this).find("input[name='organization']").val();
            activityData.awards.push(awardDetail);
        });
        activityData.activity_type = 'other';
        activityData.student_id = STUDENT_ID;    //global var assigned by php
        alert(JSON.stringify(activityData));
    });
});
