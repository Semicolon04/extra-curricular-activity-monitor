function updateList(data, status) {
    $('.activities-view').find('tbody').empty();
    // console.log(data);
    data = data.responseJSON;
    data.forEach(function(d) {
        $tr = $('<tr><td>' + d.title +'</td><td>' + d.year +'</td><td>'
            + d.activity_type +'</td><td>'+ d.points +'</td>'
            +'<td>'+d.name+'</td>'
            + '<td><a class="details">Details' +
            '<span hidden="true">' + d.id + '</span></a></td></tr>');
        $('.activities-view').find('tbody').append($tr);
    });
}
function doSearch() {
    var title = $('.search-parameters').find('#title').val();
    var year = $('.search-parameters').find('#year').val();
    var categories = [];
    $('.search-parameters').find('input[type="checkbox"]').each(function() {
        if (this.checked) {
            categories.push($(this).attr('name'));
        }
    });
    categories = categories.join(",");
    //alert(categories);
    $.ajax({
        type: 'POST',
        url: '/activities/search/',
        data: JSON.stringify({
            title: title,
            categories: categories,
            year: year,
            _token: TOKEN
        }),
        contentType: 'application/json',
        dataType: 'JSON',
        complete: updateList
    });
}

$(document).ready(function() {
    //refresh_list();

    $('.activities-view').on('click', 'a.details', function() {
        var id = $(this).find("span[hidden='true']").text();
        var $modal;
        $.get('/activity/' + id, function(data, status) {
            // alert(JSON.stringify(data));
            if (data.activity_type == 'club') {
                $modal = $('#club-activity-modal');
                $modal.modal();
                $modal.find('#club-name').text(data.club_name);
                $modal.find('#post').text(data.post);
                $modal.find('#activity-projects').find('tbody').empty();
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
                $modal.find('#sport-events').find('tbody').empty();
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
            $modal.find('#activity-awards').find('tbody').empty();
            data.awards.forEach(function(a) {
                $row = '<tr><td>'+a.award_name+'</td><td>'
                    +a.organization+'</td><td>'+a.year+'</td></tr>';
                $modal.find('#activity-awards').find('tbody').append($row)
            });
        });
    });
    $('.search-button').click(function() {
        doSearch();
    })
});
