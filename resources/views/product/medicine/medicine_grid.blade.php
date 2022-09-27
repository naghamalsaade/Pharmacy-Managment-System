<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <script src="https://kit.fontawesome.com/18695b64bb.js" crossorigin="anonymous"></script>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <script src="{{asset('js/popper.min.js')}}"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="{{asset('js/e-search.js')}}"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">



    <link rel="stylesheet" href="{{asset('css/master.css')}}">
    <link rel="stylesheet" href="{{asset('css/select_product_to_returns.css')}}">


    <link rel="stylesheet" href="{{asset('css/master.css')}}">
    <link rel="stylesheet" href="{{asset('css/medicine_grid.css')}}">



    <title>Pharmacy</title>
    <link rel="icon" href="{{asset('img/logo.png')}}img/logo.png" sizes="16x16 32x32" type="image/png">

</head>

<body>

@include('sidebar&navbar')



<!-- Start Body -->


<div class="body-page" id="body-page">
    <div class="medicine-grid">
        <div class="card">
            <div class="card-header d-flex justify-content-between bd-highlight mb-3">
                <div class="p-2 bd-highlight">
                    Medicine Grid
                </div>
                <div class="p-2 bd-highlight">
                    <a href="/medicine/all-in-pharmacy"><button type="button" class="btn btn-list"><i
                                class=" fa fa-list-ul"></i> &nbsp;List View</button></a>
                    <a href="/invoice/add"><button type="button" class="btn btn-list"><i
                                class="fa fa-plus-square-o"></i> &nbsp;Add Invoice</button></a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <label class="label-search">Search:</label>
                    <input type="text" class="form-control col-lg-3 input-search" id="Search">
                </div>


                <div class="row containerItems">
                    @foreach($medicines as $medicine)
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6" data-search=<?php echo strtolower("{$medicine->generic_name}"); ?>>
                            <div class="card text-center product">

                                <div class="card-header d-flex justify-content-around bd-highlight">
                                    <div class="btn-delete-product p-2 bd-highlight">
                                        <a class="btn-delete" id="{{$medicine->id}}">
                                            <i class="fa fa-minus" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <h3 class="p-2 bd-highlight name-product">{{$medicine->generic_name}}</h3>
                                    <div class="id-product" style="display: none;">{{$medicine->id}}</div>
                                    <div class="price-product" style="display: none;">{{$medicine->selling_price}}</div>
                                    <div class="quantity-product" style="display: none;">{{$medicine->amount}}</div>
                                    <div class="expiry-product" style="display: none;">{{$medicine->date}}</div>
                                    <div class="price-product" style="display: none;">{{$medicine->selling_price}}</div>
                                    <div class="count-quantity" style="display: none;">0</div>
                                    <div class="btn-add-product p-2 bd-highlight">
                                        <a class="btn-add" id="{{$medicine -> id}}">
                                            <i class="fa fa-plus" aria-hidden="true"></i></a>
                                        <span class="badge hidden"></span>
                                    </div>
                                </div>

                                <div class="card-body card-body-grid">
                                    <img src="{{asset('images/products/'.$medicine -> image)}}" class="d-block w-100 ">
                                    <label name="price" class="label-price"> Price: {{$medicine->selling_price}}
                                        S.P</label><br>
                                    <label name="Batch" class="label-batch"> Batch: {{$medicine->id}}</label><br>
                                    <label> Quatity: </label>
                                    <input name="quantity" class="label-quantity" readonly="readonly" value="0">
                                </div>
                                <div class="card-footer">
                                    <a href="{{asset('medicine/show-details/'. $medicine->id)}}"
                                       class="d-flex align-items-center show-detail">
                                        <span class="mr-2">Show Details</span>
                                        <span><i class="fas fa-angle-right"></i></span>
                                    </a>
                                </div>
                            </div>

                        </div>
                    @endforeach



                </div>
            </div>
        </div>
    </div>
</div>


<!-- End Body -->


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>




<script src="{{asset('js/main.js')}}"></script>
<script src="{{asset('js/themes.js')}}"></script>
<script src="{{asset('js/bootbox.min.js')}}"></script>


<script>

    var products = [];
    if (localStorage.getItem('products')) {
        products = JSON.parse(localStorage.getItem('products'));
    }

    var btnAddProduct = document.getElementsByClassName('btn-add');
    var btnDeleteProduct = document.getElementsByClassName('btn-delete');

    var temp = [];

    for (var i = 0; i < btnAddProduct.length; i++) {
        var button = btnAddProduct[i];
        button.addEventListener('click', addToStorage);
    }
    for (var i = 0; i < btnDeleteProduct.length; i++) {
        var button = btnDeleteProduct[i];
        button.addEventListener('click', deleteFromStorage);
    }

    function addToStorage(event) {
        var button = event.target;
        var header = button.parentElement.parentElement.parentElement;
        var header2 = button.parentElement.parentElement;
        var carousel_item = button.parentElement.parentElement.parentElement.parentElement;
        var card_body = carousel_item.getElementsByClassName('card-body')[0];
        var new_quantity = card_body.getElementsByClassName('label-quantity')[0];
        var name_product = header.getElementsByClassName('name-product')[0].innerText;
        var id_product = header.getElementsByClassName('id-product')[0].innerText;
        var quantity_product = header.getElementsByClassName('quantity-product')[0].innerText;
        var expiry_product = header.getElementsByClassName('expiry-product')[0].innerText;
        var quantity = header.getElementsByClassName('count-quantity')[0].innerText;
        var price_product = header.getElementsByClassName('price-product')[0].innerText;

        var t = 0;

        if (products.length != 0) {
            for (var j = 0; j < products.length; j++) {
                if (products[j].id_product === id_product) {
                    if (products[j].quantity_product == products[j].quantity) {

                        bootbox.alert({
                            message: "You can select maximum " + products[j].quantity_product + " items",
                            className: 'rubberBand'
                        });
                    }
                    else {
                        products[j].quantity = Number(products[j].quantity) + 1;
                        new_quantity.value = products[j].quantity;
                        new_quantity.innerText = products[j].quantity;
                        break;
                    }

                }

                else {
                    t++;
                }
            }

            if (t == products.length) {
                products.push({
                    'id_product': id_product,
                    'name_product': name_product,
                    'quantity_product': quantity_product,
                    'expiry_product': expiry_product,
                    'quantity': 1,
                    'price_product': price_product
                });

                localStorage.setItem('products', JSON.stringify(products));
                new_quantity.value = 1;
                new_quantity.innerText = 1;
            }
        } else {
            products.push({
                'id_product': id_product,
                'name_product': name_product,
                'quantity_product': quantity_product,
                'expiry_product': expiry_product,
                'quantity': 1,
                'price_product': price_product
            });
            localStorage.setItem('products', JSON.stringify(products));
            new_quantity.value = 1;
            new_quantity.innerText = 1;
        }

        localStorage.setItem('products', JSON.stringify(products));
    }

    function deleteFromStorage(event) {
        var button = event.target;
        var header = button.parentElement.parentElement.parentElement;
        var header2 = button.parentElement.parentElement;
        var carousel_item = button.parentElement.parentElement.parentElement.parentElement;
        var card_body = carousel_item.getElementsByClassName('card-body')[0];
        var new_quantity = card_body.getElementsByClassName('label-quantity')[0];
        var name_product = header.getElementsByClassName('name-product')[0].innerText;
        var id_product = header.getElementsByClassName('id-product')[0].innerText;
        var quantity_product = header.getElementsByClassName('quantity-product')[0].innerText;
        var expiry_product = header.getElementsByClassName('expiry-product')[0].innerText;
        var quantity = header.getElementsByClassName('count-quantity')[0].innerText;
        var price_product = header.getElementsByClassName('price-product')[0].innerText;

        var t = 0;
        if (products.length != 0) {
            for (var j = 0; j < products.length; j++) {
                if (products[j].id_product === id_product) {
                    if (products[j].quantity == 0) {

                        bootbox.alert({
                            message: "You can't choose a quantity less than zero",
                            className: 'rubberBand'
                        });
                    }
                    else {
                        products[j].quantity = Number(products[j].quantity) - 1;
                        new_quantity.value = products[j].quantity;
                        new_quantity.innerText = products[j].quantity;
                        break;
                    }

                }

                else {
                    t++;
                }
            }

            if (t == products.length) {
                products.push({
                    'id_product': id_product,
                    'name_product': name_product,
                    'quantity_product': quantity_product,
                    'expiry_product': expiry_product,
                    'quantity': quantity,
                    'price_product': price_product
                });

                localStorage.setItem('products', JSON.stringify(products));
                new_quantity.value = quantity;
                new_quantity.innerText = quantity;
            }
        } else {
            products.push({
                'id_product': id_product,
                'name_product': name_product,
                'quantity_product': quantity_product,
                'expiry_product': expiry_product,
                'quantity': quantity,
                'price_product': price_product
            });
            localStorage.setItem('products', JSON.stringify(products));
            new_quantity.value = 0;
            new_quantity.innerText = 0;
        }


        localStorage.setItem('products', JSON.stringify(products));
    }


    // Scroll To Top Button
    mybutton = document.getElementById("myBtn");
    window.onscroll = function () { scrollFunction() };

    function scrollFunction() {
        if (document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }
    function topFunction() {
        document.documentElement.scrollTop = 0;
        document.documentElement.behavior = "smooth";
    }

    // Search Buuton

    $('input').search(function () {

    });


    $(document).ready(function () {
        for (var i = 0; i < products.length; i++) {
            for (var j = 0; j < $('.product').find('h3.p-2.bd-highlight.name-product').length; j++) {
                if (products[i].name_product == ($('.product').find('h3.p-2.bd-highlight.name-product')[j].innerHTML)) {
                    $('.product').find('input.label-quantity')[j].value = (products[i].quantity);
                }
            }
        }
    });

</script>


</body>

</html>
