<!-- Footer -->
    <style>
        a{
            color: white;
            text-decoration: none;
        }
        @media (max-width: 790px) {
            #content{
                text-align: center !important;
                text-indent:0px !important;
            }
        }
    </style>




<footer class="text-center text-lg-start footer-body-color text-white mb-0">
    <!-- Section: Social media -->
    <section class="d-flex justify-content-center justify-content-between p-4 border-bottom">
        <!-- Left -->
        <div class="me-5 d-none d-lg-block">
            <span>Get connected with us on social networks:</span>
        </div>
        <!-- Left -->


        <!-- Right -->
        <div>
            <?php
            // to get data from view sahre $socialShare

                $numeric_indexed_array = array_values($socialShare);
                ?>
            <a href="<?php print($numeric_indexed_array[0]) ?>" class="me-4 text-reset">

                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="<?php print($numeric_indexed_array[1]) ?>" class="me-4 text-reset">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="<?php print($numeric_indexed_array[2]) ?>" class="me-4 text-reset">
                <i class="fab fa-linkedin"></i>
            </a>
            <a href="<?php print($numeric_indexed_array[3]) ?>" class="me-4 text-reset">
                <i class="fab fa-whatsapp"></i>
            </a>
            <a href="<?php print($numeric_indexed_array[4]) ?>" class="me-4 text-reset">
                <i class="fab fa-telegram"></i>
            </a>

            <a href="<?php print($numeric_indexed_array[5]) ?>" class="me-4 text-reset">
                <i class="fab fa-pinterest"></i>
            </a>
        </div>
        <!-- Right -->
    </section>
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section class="d-flex justify-content-between">
        <div class="container-fluid text-center text-md-start mt-5">
            <!-- Grid row -->
            <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <!-- Content -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        <i class="fas fa-gem me-3"></i> "Sein" Kachinlongyi.com
                    </h6>
                    <p style="text-align: justify;text-indent: 60px; word-spacing: 2px" id="content">
                        Kachinlongyi.com Website သည် Customers များကို (၁၀၀%) ဝန်ဆောင်မှုပေးသော Online Shopping
                        တစ်ခုဖြစ်ပါသည်။ Kachinlongyi.com မှ ဝယ်ယူသော ပစ္စည်းများကို သက်ဆိုင်ရာ မြို့နယ်အသီးသီးသို့
                        စာတိုက်မှလည်းကောင်း၊ ကားဂိတ်မှလည်းကောင်း ပို့ဆောင်ပေးလျက် ရှိနေပြီဖြစ်ပါသည်။ Kachinlongyi.com
                        မှဝယ်ယူသော ပစ္စည်းများကို ငွေပေးချေရာတွင် KBZ Pay၊ Wave Money Pay၊ Myanmar Economic Bank
                        တို့မှလည်း ပေးချေနိုင်ပြီဖြစ်ပါသည်။
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        Products
                    </h6>
                    <p>
                        <a href="#" class="text-reset">Longyi</a>
                    </p>
                    <p>
                        <a href="#" class="text-reset">Pasoe</a>
                    </p>
                    <p>
                        <a href="#" class="text-reset">Other</a>
                    </p>
                    <p>
                        <a href="#" class="text-reset">Services</a>
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        Share links
                    </h6>
                    @foreach($socialShare as $key => $value)
                          <p> <a href="{{$value}}">{{ucfirst($key)}}</a></p>
                    @endforeach
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        Contact
                    </h6>
                    <p><i class="fas fa-home me-3"></i>Myitkyina, Region (9),Kachin State</p>
                    <p>
                        <i class="fas fa-envelope me-3"></i>
                        <a href="mailto:admin@kachinlongyi.com">admin@kachinlongyi.com</a>
                    </p>
                    <p>
                        <i class="fas fa-envelope me-3"></i>
                        <a href="mailto:zawminhtwe199475@gmail.com">zawminhtwe199475@gmail.com</a>
                    </p>
                    <p><i class="fas fa-phone me-3"></i>
                        <a href="tel:+959661114660">+959661114660</a>
                    </p>
                    <p><i class="fas fa-phone me-3"></i>
                        <a href="tel:+959661114660">+959440724330</a>
                    </p>
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
        </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
        © 2021 Copyright:
        <a class="text-reset fw-bold" href="{{route("developer")}}" title="Zaw Min Htwe">Develover => ZMH</a>
    </div>
    <!-- Copyright -->

</footer>


<!-- Footer -->
