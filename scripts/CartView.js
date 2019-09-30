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
})