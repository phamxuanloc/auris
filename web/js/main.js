$(document).ready(function () {
    var timeout = null;
    $("#treatmenthistory-order_code").keyup(function () {
        var value = $('#treatmenthistory-order_code').val();
        var url = $('#url').val();
        clearTimeout(timeout);

        timeout = setTimeout(function () {
            $.ajax({
                type: 'POST',
                url: url,
                data: {value: value},
                dataType: "json",
                success: function (resultData) {
                    if(resultData.status == 1) {
                        console.log(resultData.data.customer_code);
                        $('#treatmenthistory-order_id').val(resultData.data.order_id);
                        $('#treatmenthistory-customer_id').val(resultData.data.customer_id);
                        $('#treatmenthistory-customer_code').val(resultData.data.customer_code);
                        $('#treatmenthistory-customer_name').val(resultData.data.customer_name);
                        $('#treatmenthistory-customer_phone').val(resultData.data.customer_phone);
                    }
                }
            });
        }, 2000);
    });
});

function start(id) {
    var url = "index.php?r=treatment-schedule/start";
    $.ajax({
        type: 'POST',
        url: url,
        data: {id: id},
        dataType: "json",
        success: function (data) {
            $.pjax.reload({container:'#w0'});
        }
    });
}

function end(id) {
    var url = "index.php?r=treatment-schedule/end";
    $.ajax({
        type: 'POST',
        url: url,
        data: {id: id},
        dataType: "json",
        success: function (data) {
            $.pjax.reload({container:'#refresh-grid'});
        }
    });
}