<div id="competition-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="activity-title"></h4>
                <h4 class="pull-right"><span class="label label-danger" id="activity-points"></span></h4>
                <h6 id="activity-year"></h6>
            </div>

            <div class="modal-body">
                <h4>Competition name: <span id="competition-name"></span></h4>
                <h4>Organizer: <span id="competition-organizer"></span></h4>
                <h4>Position : <span id="position"></span></h4>
                <p id="activity-description"></p>
                <h4>Awards</h4>
                <table class="table" id="activity-awards">
                    <thead>
                        <tr>
                            <th>Award Name<th>
                            <th>Organization<th>
                            <th>Year<th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- jquery add rows here -->
                    </tbody>
                </table>
            </div>

            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
