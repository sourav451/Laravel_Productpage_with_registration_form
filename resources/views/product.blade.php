<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
            crossorigin="anonymous"
        />
        <title>Document</title>
    </head>
    <body class="bg-gray">
        <h3 class="text-center mb-4">This is the product page</h3>
        <div class="container mb-5">
            <table class="table">
                <thead>
                    <tr
                        class="text-center table-primary"
                        style="background: black"
                    >
                        <!-- <th scope="col">id</th> -->
                        <th scope="col">Product Image</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Actual Price</th>
                        <th scope="col">Offer Price</th>
                        <th scope="col">QTY</th>
                        <th scope="col">Total Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $data)
                    <tr class="text-center">
                        <!-- <th scope="row">{{$data->id}}</th> -->
                        <td>
                            <img
                                src="{{$data->image}}"
                                alt="Saharukh"
                                height="50px"
                                width="50px"
                            />
                        </td>
                        <td>{{$data->name}}</td>
                        <td>{{$data->actual_price}}</td>
                        <td class="offer_price">{{$data->offer_price}}</td>
                        <td>
                            <input
                                type="number"
                                min="0"
                                max="999"
                                class="input-field"
                            />
                            
                        </td>
                        <td class="total">0.00</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        

        <div class="container mb-5">
            <div class="row">
                <div class="container border col-sm-10 col-md-5 col-lg-5">
                    <h3 class="text-yellow">Customer Details</h3>
                    <form action="/store-user" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="" class="form-label">Name</label>
                            <input
                                type="text"
                                class="form-control"
                                name="name"
                                value="{{old('name')}}"
                            />
                            <span class="text-danger">
                                @error('name')
                                    {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label"
                                >Mobile Number</label
                            >
                            <input
                                type="mobile"
                                class="form-control"
                                name="mobile"
                                value="{{old('mobile')}}"
                            />
                            <span class="text-danger">
                                @error('mobile')
                                    {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Email ID</label>
                            <input
                                type="email"
                                class="form-control"
                                name="email"
                                value="{{old('email')}}"
                            />
                            <span class="text-danger">
                                @error('email')
                                    {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Address</label>
                            <input
                                type="text"
                                class="form-control"
                                name="address"
                                value="{{old('address')}}"
                            />
                            <span class="text-danger">
                                @error('address')
                                    {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">City</label>
                            <input
                                type="text"
                                class="form-control"
                                name="city"
                                value="{{old('city')}}"
                            />
                            <span class="text-danger">
                                @error('city')
                                    {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">State</label>
                            <input
                                type="text"
                                class="form-control"
                                name="state"
                                value="{{old('state')}}"
                            />
                            <span class="text-danger">
                                @error('state')
                                    {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Pincode</label>
                            <input
                                type="text"
                                class="form-control"
                                name="pincode"
                                value="{{old('pincode')}}"
                            />
                            <span class="text-danger">
                                @error('pincode')
                                    {{$message}}
                                @enderror
                            </span>
                        </div>

                        <button type="submit" class="btn btn-primary mb-3">
                            Submit
                        </button>
                    </form>
                </div>
                <br /><br />
                <div class="container col-md-5 col-sm-10 col-lg-5">
                    <h3>Total Price</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Subtotal</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Subtotal</th>
                                <td class="sub_total">0.00</td>
                            </tr>
                            <tr>
                                <th scope="row">Total</th>
                                <td class="total_price">0.00</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="btn btn-danger">Buy Now</div>
                </div>
            </div>
        </div>
    </body>

    <script>
        // Get all the input fields with class 'input-field'
        const inputFields = document.querySelectorAll(".input-field");

        // Attach event listeners to each input field
        inputFields.forEach((inputField) => {
            inputField.addEventListener("input", () => {
                const inputValue = parseInt(inputField.value);
                if (inputValue < 1) {
                    alert("Quantity can't be less than 1");
                    inputField.value = ""; // Clear the input value
                }
                if (inputValue > 999) {
                    alert("Quantity can't be greater than 999");
                    inputField.value = ""; // Clear the input value
                }
            });
        });


        inputFields.forEach((input) => {
            input.addEventListener("input", updateTotal);
        });
        var subTotal = 0;
        var totalCells = document.querySelectorAll(".total");
        function updateTotal(event) {
            const row = event.target.closest("tr");
            const offerPrice = parseFloat(
                row.querySelector(".offer_price").textContent
            );
            const inputValue = parseFloat(event.target.value);
            const totalCell = row.querySelector(".total");

            if (!isNaN(inputValue)) {
                const total = offerPrice * inputValue;
                totalCell.textContent = total.toFixed(2);
            } else {
                totalCell.textContent = "0.00";
            }

            subTotal = 0;
            totalCells.forEach((cell) => {
                const cellTotal = parseFloat(cell.textContent);
                if (!isNaN(cellTotal)) {
                    subTotal += cellTotal;
                }
            });
            const subtotalCell = document.querySelector(".sub_total");
            const totalPriceCell = document.querySelector(".total_price");
            subtotalCell.textContent = subTotal.toFixed(2);
            totalPriceCell.textContent = subTotal.toFixed(2);
        }
    </script>
</html>
