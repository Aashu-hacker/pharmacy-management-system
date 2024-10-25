@auth
@include('components.header', ['titlee' => 'POS Invoice'])
<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">POS Invoice </h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../navigation/index.html">Home</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Invoice</a></li>
                            <li class="breadcrumb-item" aria-current="page">POS Invoice</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- [ breadcrumb ] end -->
        <div class="row">
            <div class="col-lg-12 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="row">
                                            <div class="col-sm-3 col-md-12 col-lg-12 col-xl-2">
                                                <div class="btn-check-group mb-2">
                                                    <!-- Button for "All" -->
                                                    <div class="btn-check position-relative mb-1 d-inline-block w-100">
                                                        <button class="btn btn-success btn-sm btn-block font-weight-600 mb-0 w-100"
                                                            onclick="filterProducts('all')" id="filter_all" style="min-width: 100px;">
                                                            All
                                                        </button>
                                                    </div>

                                                    <!-- Category buttons -->
                                                    @foreach($categorylist as $categories)
                                                    <div class=" mb-1 d-inline-block w-100">
                                                        <button class="btn btn-success btn-sm btn-block font-weight-600 mb-0 w-100"
                                                            onclick="filterProducts('{{ $categories['category_name'] }}')"
                                                            id="filter_{{ $categories['category_id'] }}" style="min-width: 100px;">
                                                            {{ $categories['category_name'] }}
                                                        </button>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="col-sm-9 col-md-12 col-lg-12 col-xl-10" id="style-3">
                                                <div class="row search-bar">
                                                    <div class="col-6">
                                                        <!-- Product search box -->
                                                        <form class="search product-search mb-3" action="#" method="get">
                                                            <div class="search__inner">
                                                                <input type="text" class="form-control form-control-sm search__text" placeholder="Search..." id="product_name">
                                                                <i class="typcn typcn-zoom-outline search__helper" data-sa-action="search-close"></i>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                        <select name="productlist" class="form-control form-control-sm filter-select select2" id="productlist" onchange="onselectimage(this.value)">
                                                            <option value="" selected>Select Medicine</option>
                                                            @foreach($product_list as $medicines)
                                                            <option value="{{ $medicines->product_id }}">{{ $medicines->product_name }} ({{ $medicines->strength }})</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <script>
                                                    // Pass itemlist from PHP to JavaScript
                                                    const itemlist = @json($itemlist);
                                                </script>
                                                <style>
                                                    .active_qty {
                                                        position: absolute;
                                                        top: 5px;
                                                        right: 5px;
                                                        background-color: green;
                                                        color: white;
                                                        border-radius: 50%;
                                                        padding: 2px 6px;
                                                        font-size: 12px;
                                                        display: none;
                                                        /* Initially hidden */
                                                    }
                                                </style>
                                                <div class="product-grid">
                                                    <div class="row row-m-3" id="product_search">
                                                        @foreach($itemlist as $items)
                                                        <div class="col-4 col-sm-3 col-md-4 col-lg-4 col-xl-3 col-p-3 product-item" data-category="{{ $items->category_name }}">
                                                            <div class="product-panel bg-white overflow-hidden border-0 shadow-sm" id="image-active_{{ $items->product_id }}">
                                                                <div class="item-image position-relative overflow-hidden" onclick="onselectimage({{ $items->product_id }})">
                                                                    <div id="image-active_count_{{ $items->product_id }}">
                                                                        <span id="active_pro_{{ $items->product_id }}" class="active_qty"></span>
                                                                    </div>
                                                                    <img src="{{ $items->image ? asset($items->image) : asset('../assets2/dist/img/products/product.png') }}" alt="" class="img-fluid">
                                                                </div>
                                                                <div class="panel-footer border-0 bg-white" onclick="onselectimage({{ $items->product_id }})">
                                                                    <h3 class="item-details-title">{{ $items->product_name }} ({{ $items->strength }})</h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 mt-3 mt-md-0">
                                        <div class="row mb-3">
                                            <div class="col-sm-8">
                                                <div class="d-flex align-items-center">
                                                    <div class="form-group mb-0">
                                                        <input type="text" id="add_item" class="form-control form-control-sm" placeholder="Barcode or QR-code scan here">
                                                    </div>
                                                    <label class="mr-2 ml-2 mb-0 mr-xl-3 ml-xl-3 font-weight-bold"><span>OR</span></label>
                                                    <div class="form-group mb-0">
                                                        <input type="text" id="add_item_m" class="form-control form-control-sm" placeholder="Manual Input barcode">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 mt-3 mt-sm-0">
                                                <div class="input-group mb-0 mr-xl-2 ml-xl-2">
                                                    <input
                                                        type="text"
                                                        class="form-control form-control-sm"
                                                        value="{{ isset($customer_list[0]) ? $customer_list[0]->customer_name : '' }}"
                                                        id="customer_name"
                                                        onkeyup="CustomerList_pos()">
                                                    <input
                                                        type="hidden"
                                                        name="customer_id"
                                                        class="form-control form-control-sm"
                                                        value="{{ isset($customer_list[0]) ? $customer_list[0]->customer_id : '' }}"
                                                        id="customer_id">
                                                    <div class="input-group-append">
                                                        <button
                                                            class="client-add-btn btn btn-success md-trigger"
                                                            type="button"
                                                            aria-hidden="true"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#cust_info"
                                                            id="customermodal-link">
                                                            <i class="ti ti-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <!-- Invoice table -->
                                        <!-- Invoice Table -->
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover table-sm text-nowrap" id="normalinvoice">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th>Medicine Information <i class="text-danger">*</i></th>
                                                        <th>Batch</th>
                                                        <th>Expiry Date</th>
                                                        <th>Quantity <i class="text-danger">*</i></th>
                                                        <th width="150">Price <i class="text-danger">*</i></th>
                                                        <th>Discount %</th>
                                                        <th width="170">Total</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <!-- Products will be added dynamically here -->
                                                </tbody>
                                            </table>
                                        </div>


                                        <!-- Invoice summary (discount, taxes, etc.) -->
                                        <div class="footer">
                                            <div class="form-group mb-1">
                                                <div class="row justify-content-end align-items-center">
                                                    <label for="invoice_discount" class="col-5 col-sm-6 col-lg-6 col-xl-7 text-end font-weight-bold mb-0">Invoice Discount:</label>
                                                    <div class="col-5 col-sm-5 col-lg-5 col-xl-3">
                                                        <input type="text" class="form-control form-control-sm text-end" id="invdcount" name="invoice_discount" placeholder="0.00">
                                                        <input type="hidden" id="total_product_dis" value="">
                                                    </div>
                                                    <div class="col-2 col-sm-1"></div>
                                                </div>
                                            </div>

                                            <div class="form-group mb-1">
                                                <div class="row justify-content-end align-items-center">
                                                    <label for="total_discount_ammount" class="col-5 col-sm-6 col-lg-6 col-xl-7 text-end font-weight-bold mb-0">Total Discount:</label>
                                                    <div class="col-5 col-sm-5 col-lg-5 col-xl-3">
                                                        <input type="text" id="total_discount_ammount" class="form-control form-control-sm gui-foot text-end valid_number" name="total_discount" value="0.00" readonly />
                                                    </div>
                                                    <div class="col-2 col-sm-1"></div>
                                                </div>
                                            </div>

                                            <div class="form-group mb-1">
                                                <div class="row justify-content-end align-items-center">
                                                    <label for="total_vat" class="col-5 col-sm-6 col-lg-6 col-xl-7 text-end font-weight-bold mb-0">Total VAT:</label>
                                                    <div class="col-5 col-sm-5 col-lg-5 col-xl-3">
                                                        <input type="text" id="total_vat" class="form-control form-control-sm gui-foot text-end valid_number" name="total_vat" value="0.00" readonly />
                                                    </div>
                                                    <div class="col-2 col-sm-1"></div>
                                                </div>
                                            </div>

                                            <div class="form-group mb-1">
                                                <div class="row justify-content-end align-items-center">
                                                    <label for="grandTotal" class="col-5 col-sm-6 col-lg-6 col-xl-7 text-end font-weight-bold mb-0">Grand Total:</label>
                                                    <div class="col-5 col-sm-5 col-lg-5 col-xl-3">
                                                        <input id="grandTotal" tabindex="-1" class="form-control gui-foot text-end valid_number" name="grand_total_price" value="0.00" readonly="readonly" aria-invalid="false" type="text">
                                                    </div>
                                                    <div class="col-2 col-sm-1"></div>
                                                </div>
                                            </div>

                                            <div class="form-group mb-1">
                                                <div class="row justify-content-end align-items-center">
                                                    <label for="previous" class="col-5 col-sm-6 col-lg-6 col-xl-7 text-end font-weight-bold mb-0">Previous:</label>
                                                    <div class="col-5 col-sm-5 col-lg-5 col-xl-3">
                                                        <input type="text" id="previous" class="form-control form-control-sm gui-foot text-end valid_number" name="previous" value="0.00" readonly />
                                                    </div>
                                                    <div class="col-2 col-sm-1"></div>
                                                </div>
                                            </div>

                                            <div class="form-group mb-1">
                                                <div class="row justify-content-end align-items-center">
                                                    <label for="change" class="col-5 col-sm-6 col-lg-6 col-xl-7 text-end font-weight-bold mb-0">Change:</label>
                                                    <div class="col-5 col-sm-5 col-lg-5 col-xl-3">
                                                        <input type="text" id="change" class="form-control form-control-sm gui-foot text-end valid_number" name="change" value="0.00" readonly />
                                                    </div>
                                                    <div class="col-2 col-sm-1"></div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="footer">
                                            <div class="form-group mb-0">
                                                <div class="row justify-content-end align-items-center">
                                                    <label for="paidAmount" class="col-5 col-sm-6 col-lg-6 col-xl-7 text-end font-weight-bold mb-0">{{ __('Paid Amount') }}:</label>
                                                    <div class="col-5 col-sm-5 col-lg-5 col-xl-3">
                                                        <input type="text" id="paidAmount" class="form-control form-control-sm text-end valid_number" name="paid_amount" placeholder="0.00">
                                                    </div>
                                                    <div class="col-2 col-sm-1"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <input type="hidden" name="baseUrl" class="baseUrl" value="">
                                        <input type="hidden" name="invoice_id" id="invoice_id">
                                        <input type="hidden" name="status" value="1">
                                        <input type="hidden" name="is_pos" value="1">

                                        <div class="form-group text-center mt-2">
                                            <!-- <button class="btn btn-success" type="button" id="full_paid_tab">{{ __('Full Paid') }}</button> -->
                                            <button type="submit" onclick="saveInvoice()" class="btn btn-success" id="add_payment_pos">{{ __('Submit') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

<div class="modal fade" id="cust_info" role="dialog" aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title"></h3>
                <a href="#" class="close  md-close" data-bs-dismiss="modal">×</a>
            </div>
            <div class="modal-body">
                <form action="" class="form-vertical" id="newcustomer" method="post" accept-charset="utf-8">
                    <input type="hidden" name="app_csrf" value="78c2caeb049f2f4bb2f3b58fc7c9ff96">
                    <div class="panel-body">
                        <div class="form-group row">
                            <label for="customer_name" class="col-sm-4 col-form-label">Customer Name <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <input class="form-control" name="customer_name" id="m_customer_name" type="text" placeholder="Customer Name" required="" tabindex="1">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label">Email</label>
                            <div class="col-sm-6">
                                <input class="form-control" name="email" id="email" type="email" placeholder="Email" tabindex="2">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mobile" class="col-sm-4 col-form-label">Mobile No</label>
                            <div class="col-sm-6">
                                <input class="form-control valid_number" name="mobile" id="mobile" type="text" placeholder="Mobile No" min="0" tabindex="3">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address " class="col-sm-4 col-form-label">Address</label>
                            <div class="col-sm-6">
                                <textarea class="form-control" name="address" id="address " rows="3" placeholder="Address" tabindex="4"></textarea>
                            </div>
                        </div>

                    </div>

                </form>
            </div>

            <div class="modal-footer">
                <a href="#" class="btn btn-danger" tabindex="5" data-bs-dismiss="modal">Close</a>
                <input type="submit" tabindex="6" class="btn btn-success" value="Submit">
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    document.getElementById('product_name').addEventListener('keyup', function() {
        let searchQuery = this.value.toLowerCase();
        let products = document.querySelectorAll('#product_search .product-item');

        products.forEach(function(product) {
            let productName = product.querySelector('.item-details-title').textContent.toLowerCase();
            if (productName.includes(searchQuery)) {
                product.style.display = 'block'; // Show product if it matches the search query
            } else {
                product.style.display = 'none'; // Hide product if it doesn't match
            }
        });
    });

    function filterProducts(category) {
        // Get all product items
        const products = document.querySelectorAll('.product-item');

        // If 'all' is clicked, show all products
        if (category === 'all') {
            products.forEach(product => {
                product.style.display = 'block'; // Show all products
            });
        } else {
            // Filter based on selected category
            products.forEach(product => {
                const productCategory = product.getAttribute('data-category');
                if (productCategory === category) {
                    product.style.display = 'block'; // Show matching category products
                } else {
                    product.style.display = 'none'; // Hide non-matching category products
                }
            });
        }
    }

    function fetchProductDetails(productId) {
        // Find the product in the itemlist by product ID
        const product = itemlist.find(item => item.product_id === productId);

        if (product) {
            const price = parseFloat(product.price); // Assuming the price is stored as a string in the data
            const discount = parseFloat(product.discount) || 0; // Assuming the discount is a percentage, default to 0 if not available
            const quantity = 1; // Default initial quantity

            // Calculate total price after applying discount
            const total = (price * quantity) - (price * quantity * (discount / 100));

            return {
                id: product.product_id,
                name: `${product.product_name} (${product.strength})`,
                batch: `${product.batch}`, // Placeholder, replace with actual batch if available
                expiry: `${product.expiry}`, // Placeholder, replace with actual expiry if available
                price: price.toFixed(2), // Make sure price is a number
                discount: discount.toFixed(2),
                quantity: quantity,
                total: total.toFixed(2) // Ensure total is a number with 2 decimal places
            };
        } else {
            console.error(`Product with ID ${productId} not found.`);
            return null;
        }
    }


    // Object to track the count of each product by productId
    let productClickCounts = {};

    function onselectimage(productId) {
        const productDetails = fetchProductDetails(productId);
        if (productDetails) {
            let existingRow = document.querySelector(`tr[data-product-id="${productId}"]`);

            if (existingRow) {
                // Update quantity in the table row
                let quantityInput = existingRow.querySelector('.product-quantity');
                let newQuantity = parseInt(quantityInput.value) + 1;
                quantityInput.value = newQuantity;
                updateRowTotal(existingRow, newQuantity, productDetails.price, productDetails.discount);
            } else {
                // Add new row if the product is not already in the table
                addProductRow(productDetails);
            }

            // Update the product count displayed on the image
            updateProductImageCount(productId);
        }
    }

    function updateProductImageCount(productId) {
        const countElement = document.getElementById(`active_pro_${productId}`);

        // Initialize or increment the product click count
        if (!productClickCounts[productId]) {
            productClickCounts[productId] = 0;
        }
        productClickCounts[productId] += 1;

        // Update the count displayed on the image
        countElement.textContent = productClickCounts[productId];

        // Show the count element if it's not already visible
        if (productClickCounts[productId] > 0) {
            countElement.style.display = 'inline-block';
        }
    }



    function addProductRow(product) {
        const tbody = document.querySelector('#normalinvoice tbody');

        const newRow = document.createElement('tr');
        newRow.setAttribute('data-product-id', product.id);

        newRow.innerHTML = `
        <td>${product.name}</td>
        <td>${product.batch}</td>
        <td>${product.expiry}</td>
        <td>
            <input type="number" class="form-control form-control-sm product-quantity" name="product_quantity" value="${product.quantity}" min="1" onchange="updateRowTotal(this.closest('tr'), this.value, ${product.price}, ${product.discount})">
        </td>
        <td>${product.price}</td>
        <td>
            <input type="text" class="form-control form-control-sm product-discount" name="product_discount" value="${product.discount}" onchange="updateRowTotal(this.closest('tr'), this.closest('tr').querySelector('.product-quantity').value, ${product.price}, this.value)">
        </td>
        <td class="product-total">${product.total}</td>
        <td>
            <button class="btn btn-success btn-sm" onclick="viewProductDetails(${product.id})"><i class="ti ti-eye f-18"></i></button>
            <button class="btn btn-danger btn-sm" onclick="deleteProductRow(this)"><i class="ti ti-trash f-18"></i></button>
        </td>
    `;

        tbody.appendChild(newRow);
    }

    function prepareInvoiceItems() {
        const rows = document.querySelectorAll('#normalinvoice tbody tr');
        const items = [];

        rows.forEach(row => {
            const productId = row.getAttribute('data-product-id');
            const productName = row.querySelector('td:nth-child(1)').innerText;
            const quantity = parseFloat(row.querySelector('.product-quantity').value);
            const price = parseFloat(row.querySelector('td:nth-child(5)').innerText);
            const discount = parseFloat(row.querySelector('.product-discount').value);
            const total = parseFloat(row.querySelector('.product-total').innerText);

            const item = {
                product_id: productId,
                product_name: productName,
                quantity: quantity,
                price: price,
                discount: discount,
                total: total
            };

            items.push(item);
        });

        return items;
    }

    function saveInvoice() {
        const invoiceData = {
            customer_id: document.querySelector('#customer_id').value, // Assuming you have a field for the customer ID
            total_discount: parseFloat(document.querySelector('#total_discount_ammount').value),
            total_vat: parseFloat(document.querySelector('#total_vat').value),
            grand_total: parseFloat(document.querySelector('#grandTotal').value),
            items: prepareInvoiceItems()
        };

        // Send data via jQuery AJAX
        // Send data via jQuery AJAX
        $.ajax({
            url: '/save-invoice', // Adjust this URL based on your Laravel route
            method: 'POST',
            data: JSON.stringify(invoiceData),
            contentType: 'application/json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRF token for Laravel
            },
            success: function(response) {
                if (response.success) {
                    alert('Invoice saved successfully!');

                    // Reset the form (assuming your form has an ID of 'invoiceForm')
                    $('#invoiceForm')[0].reset(); // Resets the form fields
                } else {
                    alert('Failed to save invoice.');
                }
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
                console.log(xhr.responseText);
                alert('An error occurred while saving the invoice.');
            }
        });

    }

    function updateRowTotal(row, quantity, price, discount) {
        // Calculate the total for the current row
        const total = (price * quantity) - (price * quantity * (discount / 100));
        row.querySelector('.product-total').textContent = total.toFixed(2);

        // Recalculate grand total and VAT
        calculateGrandTotalAndVAT();
    }

    // New function to calculate and update grand total, VAT, and other totals
    function calculateGrandTotalAndVAT() {
        const rows = document.querySelectorAll('#normalinvoice tbody tr');
        let grandTotal = 0;
        let totalDiscount = 0;
        let totalVAT = 0;
        const vatRate = 0.15; // Example VAT rate: 15%

        // Iterate through each row to calculate totals
        rows.forEach(row => {
            const quantity = parseFloat(row.querySelector('.product-quantity').value) || 0;
            const price = parseFloat(row.querySelector('td:nth-child(5)').textContent) || 0;
            const discount = parseFloat(row.querySelector('.product-discount').value) || 0;

            // Calculate subtotal and discount
            const subtotal = quantity * price;
            const discountAmount = (discount / 100) * subtotal;
            const total = subtotal - discountAmount;

            // Add to grand total
            grandTotal += total;
            totalDiscount += discountAmount;

            // Calculate VAT for the current product
            const vatAmount = (vatRate * total);
            totalVAT += vatAmount;
        });

        // Calculate and apply invoice-level discount if any
        const invoiceDiscount = parseFloat(document.getElementById('invdcount').value) || 0;
        const invoiceDiscountAmount = (invoiceDiscount / 100) * grandTotal;
        grandTotal -= invoiceDiscountAmount;
        totalDiscount += invoiceDiscountAmount;

        // Update fields in the footer
        document.getElementById('total_discount_ammount').value = totalDiscount.toFixed(2);
        document.getElementById('total_vat').value = totalVAT.toFixed(2);
        document.getElementById('grandTotal').value = (grandTotal + totalVAT).toFixed(2);
    }

    // Attach event listener to the input fields for the invoice discount
    document.getElementById('invdcount').addEventListener('keyup', calculateGrandTotalAndVAT);
    document.getElementById('invdcount').addEventListener('change', calculateGrandTotalAndVAT);

    // Call the function after each row update or row addition
    calculateGrandTotalAndVAT();



    function deleteProductRow(button) {
        button.closest('tr').remove();
    }

    function viewProductDetails(productId) {
        // Implement view product details functionality
        alert(`Viewing details for product ID: ${productId}`);
    }
</script>


@include('components.footer')
@endauth