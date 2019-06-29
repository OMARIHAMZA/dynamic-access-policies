<div id="kv_dialog_{{$title}}" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add {{$title}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div>

                    <label for="{{str_replace(' ', '', $title)}}_key">Key</label>
                    <input type="text" id="{{str_replace(' ', '', $title)}}_key" class="form-control"/>

                </div>

                <div class="mt-4">
                    <label for="{{str_replace(' ', '', $title)}}_values">Values</label>
                    <select id="{{str_replace(' ', '', $title)}}_values"
                            class="{{str_replace(' ', '', $title)}}-roles-tokens custom-tokens form-control"
                            multiple>
                    </select>

                </div>


            </div>

            <div class="modal-footer">
                <button id="addItemButton" type="button" class="btn btn-success"
                        onclick="addItem('<?php Print(str_replace(' ', '', $title))?>')">Add
                </button>
                <button id="{{str_replace(' ', '', $title)}}_closeButton" type="button" class="btn btn-secondary"
                        data-dismiss="modal">
                    Cancel
                </button>
            </div>
        </div>

    </div>

</div>

<script>

    function addItem(title) {


        let key = document.getElementById(title + '_key').value;

        let values = $(`.${title}-roles-tokens`).data('tokenize2').toArray().join(',');


        if (!key) {
            alert('The key is required');
            return;
        }

        if (!values) {
            alert('At least one value is required');
            return;
        }

        let no = document.getElementById(title + "_table").rows.length;

        document.getElementById(`${title}_table_body`).innerHTML +=
            `<tr>
             <td class="text-center">${no}</td>
             <td>${key}</td>
             <td>[${values}]</td>
             <td class="text-right">
                 <button type="button" class="btn btn-danger btn-fab"
                         onclick="deleteRow(this, '${title}')">
                     <i class="material-icons">close</i>
                 </button>
             </td>
             </tr>`;

        $("#" + title + "_closeButton").click();
        document.getElementById(title + '_key').value = '';
        $(`.${title}-roles-tokens`).data('tokenize2').clear();

        parseRules();
    }

</script>

