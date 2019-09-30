$(function() {
    $('#app').on("click","#checkout", function (e) {
        e.preventDefault();
        $.ajax({
            type: 'get',
            url: './app/core/App.php',
            data: {
                'checkout': true,
            },
            success: results => {
                $('#app').html(results);
            },
            error: () => {
                alert('Load error');
            }
        });
    });
    $('#app').off("click","#removefromcart").on("click","#removefromcart", function (e) {
        e.preventDefault();
        productId = $(e.target).data("product-id")
        numberToRemove = $(e.target).prev('input').val()
        $.ajax({
            type: 'get',
            url: './app/core/App.php',
            data: {
                'removefromcart': productId,
                'numberToRemove': numberToRemove
            },
            success: results => {
                $('#app').html(results);
            },
            error: () => {
                alert('Load error');
            }
        });
    });
    $('#app').off("change","input[type=radio][name='shipping']").on("change","input[type=radio][name='shipping']", function (e) {
        e.preventDefault();
        shippingId = $(e.target).data("shipping-id")
        console.log(shippingId)
        //numberToRemove = $(e.target).prev('input').val()
        $.ajax({
            type: 'get',
            url: './app/core/App.php',
            data: {
                'changeshipping': shippingId,
            },
            success: results => {
                $('#app').html(results);
            },
            error: () => {
                alert('Load error');
            }
        });
    });        
})