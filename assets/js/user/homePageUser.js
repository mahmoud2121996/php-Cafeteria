let  products = $('#productsTable').html();
let orderObject={};
let quantityElemen;
const  productsJSON =$("#products");
const  total =$("#total");
let  allPrices;
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
    ElementId=$(this).parent().parent().find(".product-name").html();  //if the element was removed from cart,allow its card to be clicked again     
        
    productId=parseInt($(this).parent().parent().find(".product-id").html()) ;    
    quantityElement = $(this).parent().parent().find(".quantity");
    priceUnit= parseFloat($(this).parent().parent().find(".priceUnit").html());
    priceTotalElement= $(this).parent().parent().find(".priceTotal");
    quantity = parseInt(quantityElement.html()) ;
    newQuantity = parseFloat(quantity- 1);
 
    decreaseOrderObject(productId);
    if (newQuantity ==0) {
        $("#"+ElementId).click(function () {
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
            allPrices=$(".priceTotal");
            culculateTotal();
        
        });
        $(this).parent().parent().remove();
    } else {
        priceTotalElement.html((newQuantity*priceUnit).toFixed(2));
        quantityElement.html(newQuantity);
    }
    allPrices=$(".priceTotal");
    culculateTotal();
    });
}


function increaseOrderObject(id){
    orderObject[id.toString()] +=1;
    culculateTotal();
}
function decreaseOrderObject(id){
   if (orderObject[id.toString()] == 1) {
     delete orderObject[id.toString()];
   }else{
        orderObject[id.toString()] -=1;
       
   }
   allPrices=$(".priceTotal");
   culculateTotal();
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
    allPrices=$(".priceTotal");
    culculateTotal();

});

$("#submit-btn").click(function (e) {
    if (jQuery.isEmptyObject(orderObject) ) {
        alert("Please Choose products to place an order");
       e.preventDefault();
    }else{
        productsJSON.val(JSON.stringify(orderObject));

    }
});

function culculateTotal() {
    let totalOrder=0;
    for (let index = 0; index < allPrices.length; index++) {
        totalOrder+=parseFloat(allPrices[index].innerHTML); 
    }
    total.html(totalOrder.toFixed(2));
    $('#totalSentToBackend').val(totalOrder);
}

