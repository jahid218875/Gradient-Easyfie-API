
<script>

    if(localStorage.getItem("items") <= "0") {
        url = "https://<?= $web_data->website ?>";
      	alert("No Product In Cart.");
        window.location.replace(url);
    }
</script>
<div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>Check-out</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="https://<?= $web_data->website ?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Check-out</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

<section class="section-b-space">
    <div class="container">
        <div class="checkout-page">
            <div class="checkout-form">
                <form class="billing">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 col-xs-12">
                            <div class="checkout-title">
                                <h3>Billing Details</h3>
                            </div>
                            <div class="row check-out">
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <div class="field-label">Name</div>
                                    <input type="text" class="form-control" name="full_name" placeholder="Full Name" required>

                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <div class="field-label">Email Address</div>
                                    <input type="email" class="form-control" name="email" placeholder="E-mail" required>

                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <div class="field-label">Mobile</div>
                                    <input type="number" class="form-control" name="mobile" placeholder="Mobile No." required>


                                </div>
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <div class="field-label">Address</div>
                                    <textarea class="form-control" name="address" rows="3" placeholder="Write your address"></textarea>
                                </div>

                                <div class="form-group submitDiv col-md-12 col-sm-12 col-xs-12">
                                    <div class="text-right">
                                        <button type='button' class="btn btn-solid po justify-content-center submitBtn">Submit</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>



