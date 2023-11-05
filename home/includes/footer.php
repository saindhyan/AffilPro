<script>
            $("#sidebarCollapse").on("click", function() {
                $("#sidebar").toggleClass("active");
                $(this).toggleClass("active");
            });

            $(".nav__close").click(function() {

                $("#sidebarCollapse").click();
            });
        </script>
        
        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog" style="display: none;">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" id="icon_close">×</button>
                        <h4 class="modal-title english_hindi_btn">Dashboard Guide <button type="button" id="btn_lang">Watch in English</button> </h4>
                    </div>
                    <div class="modal-body">
                        <iframe id="vdo_frame" width="560" height="300" style="width: 100%;" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="" data-ready="true"></iframe>
                    </div>
                    <div class="modal-footer guid__videoFooter">
                        <div class="guid__videoFooter__check">
                            <input type="checkbox" id="chk_stop_vdo_pop">
                            <span>Thank you! I have already seen it.</span>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="ctl00$ctl00$ContentPlaceHolder1$NestedContentPlaceHolder$hdn_checkFPSval" id="hdn_checkFPSval" value="1">
            </div>
        </div>

       
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">

        <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>


          <script src="/affilpro/home/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="/affilpro/home/js/vendor/waypoints.min.js"></script>
    <script src="/affilpro/home/js/bootstrap.bundle.min.js"></script>
    <script src="/affilpro/home/js/meanmenu.js"></script>
    <script src="/affilpro/home/js/swiper-bundle.min.js"></script>
    <script src="/affilpro/home/js/owl.carousel.min.js"></script>
    <script src="/affilpro/home/js/magnific-popup.min.js"></script>
    <script src="/affilpro/home/js/huicalendar.js"></script>
    <script src="/affilpro/home/js/parallax.min.js"></script>
    <script src="/affilpro/home/js/backToTop.js"></script>
    <script src="/affilpro/home/js/nice-select.min.js"></script>
    <script src="/affilpro/home/js/counterup.min.js"></script>
    <script src="/affilpro/home/js/ajax-form.js"></script>
    <script src="/affilpro/home/js/wow.min.js"></script>
    <script src="/affilpro/home/js/isotope.pkgd.min.js"></script>
    <script src="/affilpro/home/js/imagesloaded.pkgd.min.js"></script>
    <script src="/affilpro/home/js/main.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> 


        <style>
            body {
                position: relative;
            }

            .pre_loader {
                background-color: rgb(0 0 0 / 70%);
                height: 100%;
                display: flex;
                align-items: center;
                z-index: 99999;
                position: fixed;
                width: 100%;
                top: 0;
                left: 0;
                right: 0;
            }

            .pre_loader h2 {
                text-align: center;
                font-size: 50px;
                font-weight: 800;
            }

            .pre_loader .flag_box {
                width: fit-content;
                margin: 0 auto;
            }

            .pre_loader .flag_box img {
                max-width: 400px;
            }

            .zoom-in-zoom-out {
                -webkit-animation: zoom-in-zoom-out 2s ease-out infinite;
                animation: zoom-in-zoom-out 2s ease-out infinite;
            }

            @keyframes zoom-in-zoom-out {
                0% {
                    transform: scale(1, 1);
                }

                50% {
                    transform: scale(1.2, 1.2);
                }

                100% {
                    transform: scale(1, 1);
                }
            }

            @media(max-width:575px) {
                .pre_loader .flag_box img {
                    max-width: 250px;
                }

                .pre_loader h2 {
                    font-size: 35px;
                    font-weight: 800;
                }
            }

            @media(max-width:479px) {
                .pre_loader .flag_box img {
                    max-width: 250px;
                }

                .pre_loader h2 {
                    font-size: 27px;
                    font-weight: 800;
                }
            }

           
        </style>
        <script>
            $("#sidebarCollapse").on("click", function() {
                $("#sidebar").toggleClass("active");
                $(this).toggleClass("active");
            });

            $(".nav__close").click(function() {

                $("#sidebarCollapse").click();
            });
        </script>

        </div>
</body>
</html>
