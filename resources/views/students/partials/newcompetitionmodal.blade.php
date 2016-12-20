<div class="modal fade" id="new-competition" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add new competition activity</h4>
            </div>
            <div class="modal-body">

                <form class="form-horizontal">
                    <div class="form-group">
                        <label for="title" class="control-label col-sm-2">Title</label>
                        <div class="col-sm-10"><input name="title" class="form-control" type="text"></div>
                    </div>
					<div class="form-group">
                        <label for="competition_name" class="control-label col-sm-2">Competition Name</label>
                        <div class="col-sm-10"><input name="competition_name" class="form-control" type="text"></div>
                    </div>
					<div class="form-group">
                        <label for="competition_organizer" class="control-label col-sm-2">Organizor</label>
                        <div class="col-sm-10"><input name="competition_organizer" class="form-control" type="text"></div>
                    </div>
					<div class="form-group">
                        <label for="position" class="control-label col-sm-2">Position</label>
                        <div class="col-sm-10"><input name="position" class="form-control" type="text"></div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="control-label col-sm-2">Description</label>
                        <div class="col-sm-10"><textarea name="description" class="form-control" type="text"></textarea></div>
                    </div>
                    <div class="form-group">
                        <label for="year" class="control-label col-sm-2">Year</label>
                        <div class="col-sm-10"><input name="year" class="form-control" type="text"></div>
                    </div>
                </form>
                <button class="btn btn-primary pull-right add-award">Add award</button>
                <h4>Awards</h4>
                <br><br><br>
                <div class="award-fields"></div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" id="submit-competition-button">Submit</button>
            </div>
        </div>
    </div>
</div>
