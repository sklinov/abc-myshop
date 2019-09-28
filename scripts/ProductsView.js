$(function() {
    $('#app').on("click","#addtocart", function (e) {
        e.preventDefault();
        productId = $(e.target).data("product-id")
        console.log(productId);
    });    
})