$(function() {
    $('#app').off("click","#addtocart").on("click","#addtocart", function (e) {
        e.preventDefault();
        productId = $(e.target).data("product-id")
        numberToAdd = $(e.target).prev('input').val()
        $.ajax({
            type: 'get',
            url: './app/core/App.php',
            data: {
                'addtocart': productId,
                'numberToAdd': numberToAdd
            },
            success: results => {
                $('#app').html(results);
            },
            error: () => {
                alert('Load error');
            }
        });
    });
    
    $('#app').off("click","#rating").on("click","#rating", function (e) {
        e.preventDefault();
        productId = $(e.target).data("product-id")
        rating = parseInt($(e.target).html());
        console.log(productId, rating);
        $.ajax({
            type: 'get',
            url: './app/core/App.php',
            data: {
                'rate': productId,
                'rating': rating
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