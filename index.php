<!DOCTYPE html>
<html>
<head id='op'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
        body {
            color: white;
        }
        .grid-container {
            display: grid;
            grid-template-columns: 1fr 0.5fr 2fr 0.5fr 0.5fr;
            padding: 10px;
        }
        .grid-item {
            border-bottom: 1px solid rgba(255, 255, 255, 0.8);
            border-left: none;
            border-right: none;
            border-top: none;
            padding: 20px;
            font-size: 30px;
            text-align: center;
        }
        .xx {
            width: 25%;
        }
        #myForm{
            margin-left: 40px;
        }
        #myForm2{
            margin-top: 5px;
            margin-left: 20px;
        }
    </style>
    <title>Balaji Creations - Invoice Generator</title>
</head>
<body id='x' class="bg-dark">
    <div id="page">
    <!-- Your content here -->

    <h3 id="myForm2">Invoice Generator</h3>

    <form id="myForm"class="needs-validation form1" novalidate>
        <div class="input-group xx mb-3">
            <span class="input-group-text" id="basic-addon1">Item</span>
            <input type="text" id="item" class="form-control" placeholder="Item" aria-label="Item" aria-describedby="basic-addon1" required>
        </div>
        <div class="input-group xx mb-3">
            <span class="input-group-text" id="basic-addon2">Quantity</span>
            <input type="number" id="quantity" class="form-control" placeholder="Quantity" aria-label="Quantity" aria-describedby="basic-addon2" required>
            <div class="invalid-feedback">
                Please enter a valid quantity.
            </div>
        </div>
        <div class="input-group xx mb-3">
            <span class="input-group-text" id="basic-addon3">Notes</span>
            <input type="text" id="notes" class="form-control" placeholder="Notes" aria-label="Notes" aria-describedby="basic-addon3">
        </div>
        <div class="input-group xx mb-3">
            <span class="input-group-text" id="basic-addon4">Discount</span>
            <input type="number" id="discount" class="form-control" placeholder="Discount" aria-label="Discount" aria-describedby="basic-addon4" required>
            <div class="invalid-feedback">
                Please enter a valid discount.
            </div>
        </div>
        <div class="input-group xx mb-3">
            <span class="input-group-text" id="basic-addon5">Price</span>
            <input type="number" id="price" class="form-control" placeholder="Price" aria-label="Price" aria-describedby="basic-addon5" required>
            <div class="invalid-feedback">
                Please enter a valid price.
            </div>
        </div>
        <input type="submit" class="btn btn-primary" value="Add Row">
        <input type="button" class="btn btn-primary" value="Done" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample">

    </form>

    <div id="grid" class="grid-container">
        <div class="grid-item top">Item</div>
        <div class="grid-item top">Quantity</div>
        <div class="grid-item top">Notes</div>
        <div class="grid-item top">Discount</div>
        <div class="grid-item top">Price</div>
    </div>
    </div>
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel" style="color: black;">Customer Details: </h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <form id="myForm3" class="needs-validation form2" novalidate>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon3">Full Name</span>
            <input type="text" id="name" class="form-control" placeholder="Full Name" aria-label="Full Name" aria-describedby="basic-addon3" required>
            <div class="invalid-feedback">
                Please enter a valid name
            </div>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon4">Address</span>
            <input type="Text" id="address" class="form-control" placeholder="Address" aria-label="Address" aria-describedby="basic-addon4" required>
            <div class="invalid-feedback">
                Please enter a valid address.
        </div>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon5">Phone</span>
            <input type="text" id="phone" class="form-control" placeholder="Phone" aria-label="Phone" aria-describedby="basic-addon5" required>
            <div class="invalid-feedback">
                Please enter a valid Phone Number.
            </div>
        </div>
        <input type="submit" class="btn btn-primary" value="Save">

        </form>
    </div>
    </div>
    <script>
        (function () {
            'use strict'
            var forms = document.querySelectorAll('.form2')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                    } else {
                        pdf();
                    }

                    form.classList.add('was-validated')
                }, false)
                })
        })();
        (function () {
            'use strict'
            var forms = document.querySelectorAll('.form1')


            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                    } else {
                        submitForm();
                    }

                    form.classList.add('was-validated')
                }, false)
                })
        })()
        
        let gridItems = [];
        $(document).ready(function() {
            $("#grid").on('dblclick', '.grid-item', function() {
                $(this).attr('contenteditable', 'true')
            });

            $("#grid").on('blur', '.grid-item', function() {
                $(this).attr('contenteditable', 'false');
                let index = $(this).index() - 5; // Subtract 5 to account for the header row
                let itemIndex = Math.floor(index / 5);
                let propertyIndex = index % 5;
                let properties = ['name', 'quantity', 'notes', 'discount', 'price'];
                if (gridItems[itemIndex]) {
                    gridItems[itemIndex][properties[propertyIndex]] = $(this).text();
                }
            });
        });


        function submitForm() {
            var item = document.getElementById("item").value;
            var quantity = document.getElementById("quantity").value;
            var notes = document.getElementById("notes").value;
            var discount = document.getElementById("discount").value;
            var price = document.getElementById("price").value;

            var grid = document.getElementById("grid");

            grid.innerHTML += '<div class="grid-item">' + item + '</div>';
            grid.innerHTML += '<div class="grid-item">' + quantity + '</div>';
            grid.innerHTML += '<div class="grid-item">' + notes + '</div>';
            grid.innerHTML += '<div class="grid-item">' + discount + '</div>';
            grid.innerHTML += '<div class="grid-item">' + price + '</div>';

            // Add the new grid item to the gridItems array
            gridItems.push({
                name: item,
                quantity: quantity,
                notes: notes,
                discount: discount,
                price: price
            });

            let json = JSON.stringify(gridItems);
            console.log(json);
        }
        document.getElementById('myForm').addEventListener('submit', function(event) {
            // Prevent the form from submitting normally
            event.preventDefault();

            // Call your function
            // submitForm();
        });
        document.getElementById('myForm3').addEventListener('submit', function(event) {
            // Prevent the form from submitting normally
            event.preventDefault();

            // Call your function
            // submitForm();
        });


        function pdf() {
            var name = document.getElementById("name").value;
            var address = document.getElementById("address").value;
            var phone = document.getElementById("phone").value;
            let customer = []
            customer.push({
                name: name,
                address: address,
                phone: phone
            });
            console.log(customer)
            let json = JSON.stringify(gridItems);
            var url = 'result.php?json=' + json + '&customer=' + JSON.stringify(customer);
            //Redirect to the PHP page
            console.log(url);
            window.location.href = url;
        }
    </script>

</body>
</html>
