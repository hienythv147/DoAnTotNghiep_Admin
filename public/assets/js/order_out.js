$(document).ready(function() {
    $('#list-status-order').change(function() {
        var value = $('#list-status-order').val();
        window.location.href = '/Admin/orders-out/list/'+value;
    })
});