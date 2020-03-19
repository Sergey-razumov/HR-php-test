function changePrice(value, id) {
    $.ajax({
        url: "/product/update-price/" + id + "/" + value,
        dataType:"html",
        type: "get",
        success: function(){
            alert('price updated')
        },
        error: function () {
            alert('price not updated')
        }
    });
}
