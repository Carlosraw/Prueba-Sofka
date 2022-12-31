$("#tipo").change(function () {
    var selected = $("#tipo option:selected").val();
    $('div').hide();
    $(selected).show();
    });
    
    $(document).ready(function (e) {
    $('div').hide();
    });