<!-- FOOTER -->
<div class="footer">
    <div class="container-fluid tmava">
        <div class="row">
            <div class="col-12">
                <footer class="text-white text-center text-lg-start">
                    <!-- Grid container -->
                    <div class="container p-4">
                        <!--Grid row-->
                        <div class="row">
                            <!--Grid column-->
                            <!-- <div class="col-lg-6 col-md-12 mb-4 mb-md-0"></div> -->
                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col d-flex justify-content-center">
                                <ul class="list-unstyled mb-0">
                                    <li class="">
                                        <a class="odkaz" href="/">Domov</a>
                                    </li>
                                    <li class="">
                                        <a class="odkaz" href="{{ route('hikes.index', ['category_id'=>1]) }}">Vysoké Tatry</a>
                                    </li>
                                    <li class="">
                                        <a class="odkaz" href="{{ route('hikes.index', ['category_id'=>2]) }}">Nízke Tatry</a>
                                    </li>
                                    <li class="">
                                        <a class="odkaz" href="{{ route('hikes.index', ['category_id'=>3]) }}">Západné Tatry</a>
                                    </li>
                                    <li class="">
                                        <a class="odkaz" href="{{ route('hikes.index', ['category_name'=>'all']) }}">Všetky</a>
                                    </li>
                                    <!-- <li>
                                        <a href="#" class="odkaz">Akcie 2022</a>
                                    </li> -->
                                </ul>
                            </div>
                            <!--Grid column-->

                            <!--Grid column-->
                        </div>
                        <!--Grid row-->
                    </div>
                    <!-- Grid container -->
                </footer>
            </div>
        </div>
    </div>
</div>
