<style>
    i.jstree-icon.jstree-themeicon {
        background-image: url('');
    }

    label {
        font-size: 12px !important;
    }
</style>


<div class="form-group list-group-item-action">
    <label for="name" class="badge badge-pill badge-success">Name</label>
    <p id="name"> {{$data[0]->name}}</p>
</div>

<div class="form-group list-group-item-action">
    <label for="data_element" class="badge badge-pill badge-success">Data Element</label>
    <p id="data_element"> {{$data[0]->data_element}}</p>
</div>

<div class="form-group list-group-item-action">
    <label for="rules" class="badge badge-pill badge-success">Rules</label>
    <div id="rules"></div>
</div>

<div class="form-group list-group-item-action">
    <label for="emergency_rules" class="badge badge-pill badge-success">Emergency Rules</label>
    <div id="emergency_rules"></div>
</div>

<script>
    $('#rules').jstree({
        "core": {
            "animation": 0,
            "check_callback": true,
            "themes": {"stripes": true},
            'data': [
                convertJSON2JSTreeJSON(<?= $data[0]->rules ?>)
            ]
        },
        // "plugins": [
        //     "contextmenu"
        // ]
    });
    $('#emergency_rules').jstree({
        "core": {
            "animation": 0,
            "check_callback": true,
            "themes": {"stripes": true},
            'data': [
                convertJSON2JSTreeJSON(<?= $data[0]->emergency_rules ?>)
            ]
        },
        // "plugins": [
        //     "contextmenu"
        // ]
    });
</script>