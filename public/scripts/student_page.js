var awardForm = '<div class="container"><div class="form-group col-xs-3">' +
'<label for="award_name">Name:</label><input type="text" class="form-control input-sm"' +
' name="award_name"></div><div class="form-group col-xs-2"><label for="year">' +
'Year:</label><input type="text" class="form-control input-sm" name="year"></div>' +
'<div class="form-group col-xs-3"><label for="organization">Organization:' +
'</label><input type="text" class="form-control input-sm" name="organization"></div>' +
'<a class="col-xs-1 remove-award"><br>remove</a></div>';

var projectForm = '<div class="container"><div class="form-group col-xs-3">' +
'<label for="project_name">Project name:</label><input type="text" class="form-control input-sm"' +
' name="project_name"></div><div class="form-group col-xs-5">' +
'<label for="contribution_description">Contribution description:</label>' +
'<input type="text" class="form-control input-sm" name="contribution_description"></div>' +
'<a class="col-xs-1 remove-project"><br>remove</a></div>';
$(document).ready(function() {
    $('button.add-award').click(function() {
        $(this).siblings('.award-fields').append($(awardForm));
    });

    $(document).on('click', '.remove-award', function() {
        $(this).parent().remove();
    });

    $('button.add-project').click(function() {
        $(this).siblings('.project-fields').append($(projectForm));
    });
    $(document).on('click', '.remove-project', function() {
        $(this).parent().remove();
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

    $('#submit-club-activity-button').click(function() {
        var activityData = {};
        var $form = $('#new-club-activity');
        activityData.title = $form.find("input[name='title']").val();
        activityData.description = $form.find("textarea[name='description']").val();
        activityData.year = $form.find("input[name='year']").val();
        activityData.club_name = $form.find("input[name='club_name']").val();
        activityData.post = $form.find("input[name='post']").val();
        activityData.awards = [];
        var $awardFields = $('#new-club-activity').find('.award-fields');
        $awardFields.children().each(function() {
            awardDetail = {};
            awardDetail.awardName = $(this).find("input[name='award_name']").val()
            awardDetail.year = $(this).find("input[name='year']").val();
            awardDetail.organization = $(this).find("input[name='organization']").val();
            activityData.awards.push(awardDetail);
        });
        activityData.projects = []
        var $projectFields = $('#new-club-activity').find('.project-fields');
        $projectFields.children().each(function() {
            projectDetail = {};
            projectDetail.project_name = $(this).find("input[name='project_name']").val();
            projectDetail.contribution_description =
                $(this).find("input[name='contribution_description']").val();
            activityData.projects.push(projectDetail);
        });
        activityData.activity_type = 'club';
        activityData.student_id = STUDENT_ID;    //global var assigned by php
        alert(JSON.stringify(activityData));
    });
});
