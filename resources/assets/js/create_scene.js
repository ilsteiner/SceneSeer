$(document).ready(function() {
    // Register form fields with Select2
    $('select[name="playwright"]').select2({
        placeholder: 'Select a playwright...',
        allowClear: true,
        debug: true
    });
    $('select[name="play"]').select2({
        placeholder: 'Select a play...',
        allowClear: true
    });

    // On changes for playwright field
    $('select[name="playwright"').on('change', function(){
        var playwright_id = $(this).val();

        // When selecting a new playwright, make only their plays available
        if(playwright_id) {
            $.ajax({
                url: '/playwright/' + playwright_id + '/plays',
                type: "GET",
                dataType: 'json',
                success:function(data) {
                    $('select[name="play"]').empty();
                    $.each(data, function(key) {
                        $('select[name="play"]').append('<option value="' + data[key]['id'] + '">' + data[key]['title'] + '</option>');
                        updateCharList($('select[name="play"]').val());
                    });
                }
            });
        }

        // If the playwright has no plays, populate list with all play options
        else {
            $.ajax({
                url: '/play/all',
                type: "GET",
                dataType: 'json',
                success:function(data) {
                    $('select[name="play"]').empty();
                    $.each(data, function(key) {
                        $('select[name="play"]').append('<option value="' + data[key]['id'] + '">' + data[key]['title'] + '</option>');
                    });
                    $('select[name="play"]').prepend('<option value selected>Please select a playwright...');
                    updateCharList(key,true);
                }
            });
        }
    });

    // On changes for play field
    $('select[name="play"').on('change', function(){
        var play_id = $(this).val();

        // When selecting a new play, auto-select the associated playwright
        if(play_id) {
            $.ajax({
                url: '/play/' + play_id + '/playwright',
                type: "GET",
                dataType: 'json',
                success:function(data) {
                    $('select[name="playwright"]').val(data.id);
                    $('select[name="playwright"]').trigger('change');
                    updateCharList(play_id);
                }
            });
        }
        // If the play doesn't have a playwright somehow, select nothing
        else {
            $.ajax({
                url: '/playwright/all',
                type: "GET",
                dataType: 'json',
                success:function(data) {
                    $('select[name="playwright"]').val();
                    $('select[name="playwright"]').trigger('change');
                    updateCharList(play_id);
                }
            });
        }
    });

    // Update character list based on selections
    function updateCharList(play_id,isPlaywright=false) {

        // If the passed ID is actually a playwright, look up that playwright's characters
        if(isPlaywright) {
            $.ajax({
                url: '/playwright/' + play_id + '/characters',
                type: "GET",
                dataType: 'json',
                success:function(data) {
                    insertCharacterRows(data);
                }
            });
        }
        // Otherwise, look up the specific play's characters
        else {
            $.ajax({
                url: '/play/' + play_id + '/characters',
                type: "GET",
                dataType: 'json',
                success:function(data) {
                    insertCharacterRows(data);
                }
            });
        }

        return;
    }

    // Insert new characters
    function insertCharacterRows(character_list) {
        $('#characters').empty();

        character_list.forEach(character => {
            new_div = '<div class="col-6 name">';

            // Add the name
            new_div = new_div + character['name'] + '</div><div class="col-6 description">';

            // Add the description
            new_div = new_div + character['description'] + '</div>';

            // Add the new character to the page
            $('#characters').append(new_div);
        });
    }
});