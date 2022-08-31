
$(document).ready(function () {
    var productsId = [];
    var productsName = [];
    var productsPrice = [];
    var productsQuantity = [];

    (function ($) {
        if (localStorage.getItem("items") > 0) {
            // $(".cart").hide();
            $(".cart-small").show();
            var totalCart = localStorage.getItem('cartTotal');
            var items = localStorage.getItem('items');
            var products = localStorage.getItem('products');
            var products1 = products.slice(0, -1);
            var product = products1.substring(2);
            var products = product.split("','");



            $(".itemCount").text(items);

            var id = 0;
            var j = 0;
            for (var i = 1; i <= items; i++) {
                var max = i * 5 - i;
                for (j; j <= max; j += 5) {
                    var pName = products[j];
                    var pPrice = products[j + 1];
                    var pQuantity = products[j + 2];
                    var pTotal = products[j + 3];
                    var pId = products[j + 4];


                    productsId[id] = pId;
                    productsName[id] = pName;
                    productsPrice[id] = pPrice;
                    productsQuantity[id] = pQuantity;
                    var row = "<tr><td class='readmore'>" + pName + "</td><td>" + pPrice + "</td><td>" + pQuantity + "</td><td>" + pTotal + "</td><td><button type='button' class='close itemRemove' aria-label='Close'><span aria-hidden='true'>&times;</span></button></td><td style='display:none'>" + pId + "</td></tr>";
                    $(".cartList").append(row);
                    id++;
                }
            }
            // alert(productsId);    //   All product Id 
            $(".cartTotal").text(totalCart);
        } else {
            // $(".cart").hide();
            $(".cart-small").show();
        }
    }(jQuery));


    function products() {
        if (localStorage.getItem("items") > 0) {
            // $(".cart").hide();
            $(".cart-small").show();
            var totalCart = localStorage.getItem('cartTotal');
            var items = localStorage.getItem('items');
            var products = localStorage.getItem('products');
            var products1 = products.slice(0, -1);
            var product = products1.substring(2);
            var products = product.split("','");

            $(".itemCount").text(items);

            var id = 0;
            var j = 0;
            for (var i = 1; i <= items; i++) {
                var max = i * 5 - i;
                for (j; j <= max; j += 5) {
                    var pName = products[j];
                    var pPrice = products[j + 1];
                    var pQuantity = products[j + 2];
                    var pTotal = products[j + 3];
                    var pId = products[j + 4];


                    productsId[id] = pId;
                    productsName[id] = pName;
                    productsPrice[id] = pPrice;
                    productsQuantity[id] = pQuantity;
                    var row = "<tr><td class='readmore'>" + pName + "</td><td>" + pPrice + "</td><td>" + pQuantity + "</td><td>" + pTotal + "</td><td><button type='button' class='close itemRemove' aria-label='Close'><span aria-hidden='true'>&times;</span></button></td><td style='display:none'>" + pId + "</td></tr>";
                    $(".cartList").append(row);
                    id++;
                }
            }
            // alert(productsId);    //   All product Id 
            $(".cartTotal").text(totalCart);
        } else {
            // $(".cart").hide();
            $(".cart-small").show();
        }
    } (jQuery);

    $('.part2').hide();
    $('.additionBtn').hide();
    // $(".itemBtn").parent().find(".additionBtn").show();

    $(".cartHide").click(function () {
        // $(".cart").hide(500);
        $(".cart-small").show(500);
    })

    $(".cart-small").click(function () {
        // $(".cart").show(500);
        $(".cart-small").hide(500);
    })

    // $(".itemRemove", this).click(function(){
    //     $(this).parent().parent().remove();
    //     cartTotal();
    // })

    $('body').on('click', 'button.itemRemove', function () {
        $(this).parent().parent().remove();
        cartTotal();
        // do something
    });


    $(".itemBtn").click(function () {
        var minus = $(this).hasClass('minus');


        var productName = $(this).parent().siblings(".product-information").attr("productName");
        // alert(productName)
        var productPrice = $(this).parent().siblings(".product-information").attr("product-price").replace(/[^\d.-]/g, '');
        // alert(productPrice)

        productPrice = Number(productPrice).toFixed(2);
        // if(productPrice <= 0.00){

        //     productPrice = $(this).parent().parent().parent().parent().parent().find(".price-main").find('.price-sub').find('.product-price').text().replace(/[^\d.-]/g, '');

        //     productPrice = Number(productPrice).toFixed(2);
        // }

        var productId = $(this).parent().siblings(".product-information").attr("product-id");   // product id

        // if(typeof(productId) == 'undefined'){
        //     productId = $(this).parent().parent().parent().parent().parent().find(".price-main").find('.price-sub').find('.product-id').val();      //product id
        // }

        var a = "<tr><td class='readmore'>" + productName + "</td><td>" + productPrice + "</td><td>1</td><td>" + productPrice + "</td><td><button type='button' class='close itemRemove' aria-label='Close'><span aria-hidden='true'>&times;</span></button></td><td style='display:none'>" + productId + "</td></tr>";
        var flag = 0;
        var myCol = 0;
        var quantity = 0;
        var total = 0;
        var i = 0;
        if (minus == true) {
            $(".cartList tr").each(function () {
                var id = $(this).find("td").eq(5).text();
                if (id == productId) {
                    quantity = Number($(this).find("td").eq(2).text());
                    if (quantity > 1) {
                        quantity--;
                    } else {
                        $(this).remove();

                    }
                    flag = 1;
                    myCol = $(this).index();
                } else {
                    a = "";
                }
                i++;
            });

            if (i == 1) {
                a = "";
            } else if (flag == 0) {
                a = "";
            }
        } else {
            $(".cartList tr").each(function () {
                var id = $(this).find("td").eq(5).text();

                if (id == productId) {
                    quantity = Number($(this).find("td").eq(2).text());
                    quantity++;
                    flag = 1;
                    myCol = $(this).index();
                }
            });
        }


        total = productPrice * quantity;
        total = total.toFixed(2);

        if (flag == 1) {
            $(".cartList tr").eq(myCol).find('td').eq(2).text(quantity);
            $(".cartList tr").eq(myCol).find('td').eq(3).text(total);
            $(this).parent().find(".additionBtn").show();
        } else {
            $(".cartList").append(a);
            $(this).parent().find(".additionBtn").show();
        }

        cartTotal();

    })

    function cartTotal() {
        var total = 0;
        var items = 0;
        var products = [];
        var productData = []
        $(".cartList tr").each(function () {
            var pName = $(this).find("td").eq(0).text();
            var pPrice = $(this).find("td").eq(1).text();
            var pQuantity = $(this).find("td").eq(2).text();
            var pTotal = Number($(this).find("td").eq(3).text());
            var pId = $(this).find("td").eq(5).text();

            total = total + pTotal;
            if (items > 0) {
                products[items] = ["'" + pName + "'", "'" + pPrice + "'", "'" + pQuantity + "'", "'" + pTotal + "'", "'" + pId + "'"];

                var productDetails = {
                    product_id: pId,
                    product_name: pName,
                    product_price: pPrice,
                    product_quantity: pQuantity,
                    product_total: pTotal
                }
                productData.push(productDetails);
            }
            localStorage.setItem("items", items);
            items++;


        });
        localStorage.setItem('saveProduct', JSON.stringify(productData));
        localStorage.setItem('products', products);
        total = total.toFixed(2);
        localStorage.setItem("cartTotal", total);
        $(".cartTotal").text(total);
        $(".itemCount").text(items - 1);
    }

    $(".ckOut").click(function () {
        products();
        // alert(productsId);
        $('.part1').hide();
        $(".cart").show();
        $('.part2').show();
    })

    $(".po").click(function (e) {

        e.preventDefault();

        var check;
        $(".billing input").each(function () {
            if (!$(this).val()) {
                check = "yes";
            }
        });

        if (check == "yes") {
            alert("Please, Fill All the Field!");
            return false;
        }

        var form = $(".billing").serialize();
        var saveProduct = localStorage.getItem('saveProduct');

        $.ajax({
            type: "POST",
            url: baseurl + "data",
            data: {
                'form': form,
                'order_data': saveProduct,
            },

            cache: false,
            success: function (data) {
                data = JSON.parse(data);
                if (data.status == 'success') {

                    swal('Please Note Your Order Id is : ' + data.order_id + '', "We Will Contact You Shortly...", "success").then(function () {
                        localStorage.clear();
                        $('.part2').hide();
                        document.location.href = "/";
                    });

                } else {
                    swal("Something Went Wrong..", "Please Try Again Later...", "error").then(function () {
                        $('.part2').hide();
                        location.reload();
                    });
                }
            }
        });
    })

})