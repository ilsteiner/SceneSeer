$(document).ready(function() {
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
                }
            });
        }
    });

    $('select[name="play"').on('change', function(){
        var play_id = $(this).val();

        // When selecting a new play, auto-select the associated playwright
        if(play_id) {
            $.ajax({
                url: '/play/' + play_id + '/playwright',
                type: "GET",
                dataType: 'json',
                success:function(data) {
                    $('select[name="playwright"] option[value=' + data.id + ']').prop("selected", "selected");
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
                    $('select[name="playwright"] option:selected').prop("selected", false);
                }
            });
        }
    });
});