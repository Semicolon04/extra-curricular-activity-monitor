

$(document).ready(function() {
    refresh_list();

    $('.activities-view').on('click', 'a.details', function() {
        var id = $(this).find("span[hidden='true']").text();
        $.get('/activity/' + id, function(data, status) {
            // alert(JSON.stringify(data));
            var $modal;
            if (data.activity_type == 'club') {
                $modal = $('#club-activity-modal');
                $modal.modal();
                $modal.find('#club-name').text(data.club_name);
                $modal.find('#post').text(data.post);
                data.projects.forEach(function(p) {
                    $row = '<tr><td>'+p.project_name+'</td><td>'
                        +p.contribution_description+'</td></tr>';
                    $modal.find('#activity-projects').find('tbody').append($row)
                });
            } else if (data.activity_type == 'competition') {
                $modal = $('#competition-modal');
                $modal.modal();
                $modal.find('#competition-name').text(data.competition_name);
                $modal.find('#competition-organizer').text(data.competition_organizer);
                $modal.find('#position').text(data.position);
            } else if (data.activity_type == 'sport') {
                $modal = $('#sports-modal');
                $modal.modal();
                $modal.find('#sport-name').text(data.sport_name);
                $modal.find('#position').text(data.position);
                data.events.forEach(function(e) {
                    $row = '<tr><td>'+e.event_name+'</td><td>'
                        +e.position+'</td></tr>';
                    $modal.find('#sport-events').find('tbody').append($row)
                });
            } else {
                $modal = $('#activity-modal');
                $modal.modal();
            }
            $modal.find('#activity-title').text(data.title);
            points = data.points != null ? data.points : 'Validation Pending';
            $modal.find('#activity-points').html(points);
            $modal.find('#activity-year').text(data.year);
            $modal.find('#activity-description').text(data.description);
            data.awards.forEach(function(a) {
                $row = '<tr><td>'+a.award_name+'</td><td>'
                    +a.organization+'</td><td>'+a.year+'</td></tr>';
                $modal.find('#activity-awards').find('tbody').append($row)
            });
        });
    });
});
