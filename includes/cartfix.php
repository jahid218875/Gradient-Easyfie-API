<!-- Cart Worker -->
<div class="sm-cart-details" style="overflow-x: hidden;">
            <div class="row m-3">
            <div class="col-8">
                <span class="itemCount">0</span> Items
            </div>
            <div class="col-4 text-right">
                <span class="centralized-mini-cart-close">
                    Close
                </span>
            </div></div>
            <table class="table cartList">
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Qt</th>
                            <th>Total</th>
                            <th>&nbsp;</th>
                        </tr>
                    </table>
                    <div class="row text-white d-md-none position-relative">
                <div class="col-7 position-absolute centralized" style="height: 50px; padding-right:0">
                    <a href="checkout.php" class="text-capitalize text-white text-center" style="background:#ff4c3b; font-size: 1.2rem; width: 100%; height: 50px;     display: flex;align-items: center; justify-content: center;">
                    <span>Place Order</span>
                    </a>
                    
                </div>
                <div class="col-5 position-absolute centralized" style="right:0.75rem; height: 50px; background:#fb3624;">
                <?= @$me->currency; ?>&nbsp; &nbsp;<span class="cartTotal">0</span>
                </div>
            </div>
        </div>

<!-- Cart Worker Ended -->