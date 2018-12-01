$(document).ready(function () {
    $('#lightSlider').lightSlider({
        gallery:true,
        item:1,
        loop:true,
        thumbItem:9,
        slideMargin:0,
        enableDrag: false,
        currentPagerPosition:'left',
    });

    var timeout = null;
    $("#treatmenthistory-order_code").change(function () {
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
                    if (resultData.status == 1) {
                        console.log(resultData.data.treatment_direction);
                        $('#treatmenthistory-order_id').val(resultData.data.order_id);
                        $('#treatmenthistory-customer_id').val(resultData.data.customer_id);
                        $('#treatmenthistory-customer_code').val(resultData.data.customer_code);
                        $('#treatmenthistory-customer_name').val(resultData.data.customer_name);
                        $('#treatmenthistory-customer_phone').val(resultData.data.customer_phone);
                        $('#treatmenthistory-treatment_direction').val(resultData.data.treatment_direction);
                    }
                }
            });
        }, 500);
    });
    $("#order-customer_code").change(function () {
        var value = $('#order-customer_code').val();
        var url = $('#url').val();
        clearTimeout(timeout);

        timeout = setTimeout(function () {
            $.ajax({
                type: 'POST',
                url: url,
                data: {value: value},
                dataType: "json",
                success: function (resultData) {
                    if (resultData.status == 1) {
                        // console.log(resultData.data);
                        $('#order-customer_id').val(resultData.data.order_id);
                        $('#order-customer_name').val(resultData.data.customer_name);
                        $('#order-customer_phone').val(resultData.data.customer_phone);
                    }
                }
            });
        }, 500);
    });
    $("#scheduleadvisory-customer_code").change(function () {
        var value = $('#scheduleadvisory-customer_code').val();
        var url = $('#url').val();
        clearTimeout(timeout);

        timeout = setTimeout(function () {
            $.ajax({
                type: 'POST',
                url: url,
                data: {value: value},
                dataType: "json",
                success: function (resultData) {
                    if (resultData.status == 1) {
                        // console.log(resultData.data);
                        // $('#order-customer_id').val(resultData.data.order_id);
                        $('#scheduleadvisory-full_name').val(resultData.data.customer_name);
                        $('#scheduleadvisory-sex').val(resultData.data.customer_sex);
                        $('#scheduleadvisory-birthday').val(resultData.data.customer_birthday);
                        $('#scheduleadvisory-phone').val(resultData.data.customer_phone);
                    }
                }
            });
        }, 500);
    });

    $("#order-product_id").change(function () {
        $.ajax({
            type: 'POST',
            url: "index.php?r=order/get-price",
            data: {value: $("#order-product_id").val()},
            dataType: "json",
            success: function (resultData) {
                if (resultData.status == 1) {
                    $('#order-price').val(addCommas(resultData.data.price));
                }
            }
        });
    });

    $("#order-quantiy").change(function () {
        var order_price = $('#order-price').val().replace(/\./g, '');
        var order_quantiy = $('#order-quantiy').val().replace(/\./g, '');
        var order_discount = $('#order-discount').val().replace(/\./g, '');
        $("#order-total_price").val(addCommas(order_price * order_quantiy - order_discount));
    });
    $("#order-discount").change(function () {
        var order_total_price = $('#order-total_price').val().replace(/\./g, '');
        var order_discount = $('#order-discount').val().replace(/\./g, '');
        $("#order-total_price").val(addCommas(order_total_price - order_discount));
    });
    // $("#kpisalesearch-sale_id").change(function () {
    //     $("#kpi-search-form").submit();
    // });
    $("#order-discount").keyup(function () {
        var order_discount = $('#order-discount').val().replace(/\./g, '');
        $("#order-discount").val(addCommas(order_discount));
    });
});

function addCommas(x) {
    var parts = x.toString().split(".");
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    return parts.join(".");
}

function start(id) {
    var url = "index.php?r=treatment-schedule/start";
    $.ajax({
        type: 'POST',
        url: url,
        data: {id: id},
        dataType: "json",
        success: function (data) {
            $.pjax.reload({container: '#w0'});
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
            $.pjax.reload({container: '#refresh-grid'});
        }
    });
}

function vote(id) {
    var url = "index.php?r=treatment-schedule/vote";
    $.ajax({
        type: 'POST',
        url: url,
        data: {id: id},
        dataType: "json",
        success: function (data) {
            $.pjax.reload({container: '#refresh-grid'});
        },
        error: function () {
            alert('Bạn phải kết thúc mới có thể đánh giá')
        }
    });
}

function changeValue(value, element) {
    var order_check_out_money = $("#" + element.id).val().replace(/\./g, '');
    $("#" + element.id).val(addCommas(order_check_out_money));
    console.log(addCommas(order_check_out_money));
}

var total_money = Number(0);

function changeProduct(id) {
    var order_id = id.substring(6, 7);
    $.ajax({
        type: 'POST',
        url: "index.php?r=order/get-price",
        data: {value: $("#" + id).val()},
        dataType: "json",
        success: function (resultData) {
            if (resultData.status == 1) {
                $('#orderservice-' + order_id + '-price').val(addCommas(resultData.data.price));
            }
        }
    });
}

function changeQuantity(id) {
    var id_number = id.substring(13, 14);
    order_money = $("#orderservice-" + id_number + "-price").val().replace(/\./g, '');
    order_quantity = $("#orderservice-" + id_number + "-quantity").val().replace(/\./g, '');
    total_money = Number(total_money) + (Number(order_money) * Number(order_quantity));
    $("#order-total_price").val(addCommas(total_money));
}

function changeQuantityUpdate(id) {
    var total_money_old = $("#total_money_old").val();
    total_money_old = total_money_old.replace(/\./g, '');
    var id_number = id.substring(13, 14);

    var order_money = $("#orderservice-" + id_number + "-price").val().replace(/\./g, '');
    var order_quantity = $("#" + id).val().replace(/\./g, '');
    total_money_old = Number(total_money_old) + (Number(order_money) * Number(order_quantity));
    $("#order-total_price").val(addCommas(total_money_old));
}