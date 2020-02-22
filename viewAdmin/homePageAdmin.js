let  products = $('#productsTable').html();
let orderObject={};
let selectedCustomer;
let quantityElemen;
const  customerSelected =$("#customerSelected");
const  productsJSON =$("#products");
//increase and decrease the products count
$('input[name="customer"]').click(function () {
     selectedCustomer = $(this).val();
});


function updateProducts() {
    $(".increaseProduct").unbind();
    $(".decreaseProduct").unbind();
    $(".increaseProduct").click(function () {
    productId=parseInt($(this).parent().parent().find(".product-id").html()) ;
    quantityElement = $(this).parent().parent().find(".quantity");
    priceUnit= parseFloat($(this).parent().parent().find(".priceUnit").html());
    priceTotalElement= $(this).parent().parent().find(".priceTotal");
    quantity = parseInt(quantityElement.html());
    newQuantity = parseFloat(quantity+ 1);
    priceTotalElement.html((newQuantity*priceUnit).toFixed(2));
    quantityElement.html(newQuantity);
    increaseOrderObject(productId)
    });

    $(".decreaseProduct").click(function () {
    productId=parseInt($(this).parent().parent().find(".product-id").html()) ;    
    quantityElement = $(this).parent().parent().find(".quantity");
    priceUnit= parseFloat($(this).parent().parent().find(".priceUnit").html());
    priceTotalElement= $(this).parent().parent().find(".priceTotal");
    quantity = parseInt(quantityElement.html()) ;
    newQuantity = parseFloat(quantity- 1);
 
    decreaseOrderObject(productId);
    if (newQuantity ==0) {
        $(this).parent().parent().remove();
    } else {
        priceTotalElement.html((newQuantity*priceUnit).toFixed(2));
        quantityElement.html(newQuantity);
    }

    });
}


function increaseOrderObject(id){
    orderObject[id.toString()] +=1;
}
function decreaseOrderObject(id){
   if (orderObject[id.toString()] == 1) {
     delete orderObject[id.toString()];
   }else{
        orderObject[id.toString()] -=1;
   }
}

$(".card").click(function () {
    id=$(this).find('span').html();
    name=$(this).find('b').html();
    price=$(this).find('strong').find('span').html();
    orderObject[id.toString()]=1;
    $('#productsTable > tbody:last-child').append(` <tr>
                                <th class="product-id" hidden>${id}</th>
                                <th class="product-name">${name}</th>
                                <td class="quantity">1</td>
                                <td><button type="button" class="decreaseProduct btn-sm btn-danger">&minus;</button></td>
                                <td><button type="button" class="increaseProduct btn-sm btn-success">&plus;</button></td><td class="priceTotal">${price}</td><td class="priceUnit" hidden>${price}</td>

                            </tr>`);
    $(this).off('click');
    updateProducts();
});

$("#submit-btn").click(function (e) {
    if (jQuery.isEmptyObject(orderObject) ) {
        alert("Please Choose products to place an order");
       e.preventDefault();
    }else if(selectedCustomer ==undefined){
        $('#select-box').css("border","2px solid red")
       e.preventDefault();
    }else{
    //    e.preventDefault();
        customerSelected.val(selectedCustomer);
        productsJSON.val(orderObject.toString());

    }
});



