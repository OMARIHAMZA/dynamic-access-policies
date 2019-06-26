<div id="integration_modal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Integration</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form id="form" action="{{url('users/integrate')}}" method="POST">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="tables_list">Tables Names</label>
                        <select id="tables_list" class="tables-tokens custom-tokens form-control" multiple></select>
                    </div>

                    <div class="form-group">
                        <label for="roles_list">Roles</label>
                        <select id="roles_list" class="roles-tokens custom-tokens form-control" multiple></select>
                    </div>

                    <input type="hidden" id="tables" name="tables">

                    <input type="hidden" id="roles" name="roles">

                    <script>$('.custom-tokens').tokenize2({
                            tokensAllowCustom: true,
                            delimiter: [',', '-']
                        });</script>

                </form>

            </div>
            <div class="modal-footer">
                <button id="integrateButton" type="button" class="btn btn-success">Integrate
                </button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>

    </div>

</div>

<script>

    document.getElementById('integrateButton')
        .addEventListener('click', function (event) {
            document.getElementById("tables").value = $('.tables-tokens').data('tokenize2').toArray().join(',');
            document.getElementById("roles").value = $('.roles-tokens').data('tokenize2').toArray().join(',');
            document.getElementById('form').submit();
        })
    ;

</script>

