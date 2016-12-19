var awardForm = '<form class=""><div class="container"><div class="form-group col-xs-3">' +
'<label for="award_name">Name:</label><input type="text" class="form-control input-sm"' +
' name="award_name"></div><div class="form-group col-xs-2"><label for="year">' +
'Year:</label><input type="text" class="form-control input-sm" name="year"></div>' +
'<div class="form-group col-xs-3"><label for="organization">Organization:' +
'</label><input type="text" class="form-control input-sm" name="organizatin"></div>' +
'<a class="col-xs-1 remove-award"><br>remove</a></div></form>';

$(document).ready(function() {
    $('button.add-award').click(function() {
        $(this).siblings('.award-fields').append($(awardForm));
    });
    $(document).on('click', 'a.remove-award', function() {
        $(this).parent().parent().remove();
    })
});
