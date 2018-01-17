$(document).ready(function () {
    var timeout = null;
    $("#treatmentschedule-order_code").keyup(function () {
        var value = $('#treatmentschedule-order_code').val();
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
                        $('#treatmentschedule-customer_code').val(resultData.data.customer_code);
                        $('#treatmentschedule-customer_name').val(resultData.data.customer_name);
                        $('#treatmentschedule-customer_phone').val(resultData.data.customer_phone);
                    }
                }
            });
        }, 2000);
    });
});