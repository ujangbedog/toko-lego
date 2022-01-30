<div class="footer-copyright" style="bottom:0; width:100%;">
        <p class="footer-company">All Rights Reserved. &copy; 2022 <a href="#">Ilham Alfath</a></p>
</div>
    <!-- End copyright  -->

    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>
    @if(Request::path() == 'carts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $(".update-cart").click(function (e) {
                e.preventDefault();
                
                var ele = $(this);

                $.ajax({
                    url: '{{ route('carts.update') }}',
                    method: "PATCH",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".quantity").val()},
                    success: function (response) {
                        window.location.reload();
                    }
                });
            });

            $(".remove-from-cart").click(function (e) {
                e.preventDefault();

                var ele = $(this);

                if(confirm("Are you sure")) {
                    $.ajax({
                        url: '{{ route('carts.remove') }}',
                        method: "DELETE",
                        data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                        success: function (response) {
                            window.location.reload();
                        }
                    });
                }
            });
        });

    </script>
    @endif
    <!-- ALL JS FILES -->
    <script src="{{ asset('vendor/app/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('vendor/app/js/popper.min.js') }}"></script>
    <script src="{{ asset('vendor/app/js/bootstrap.min.js') }}"></script>
    <!-- ALL PLUGINS -->
    <script src="{{ asset('vendor/app/js/jquery.superslides.min.js') }}"></script>
    <script src="{{ asset('vendor/app/js/bootstrap-select.js') }}"></script>
    <script src="{{ asset('vendor/app/js/inewsticker.js') }}"></script>
    <script src="{{ asset('vendor/app/js/bootsnav.js') }}"></script>
    <script src="{{ asset('vendor/app/js/images-loded.min.js') }}"></script>
    <script src="{{ asset('vendor/app/js/isotope.min.js') }}"></script>
    <script src="{{ asset('vendor/app/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('vendor/app/js/baguetteBox.min.js') }}"></script>
    @if(Request::path() == 'products')
    <script src="{{ asset('vendor/app/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('vendor/app/js/jquery.nicescroll.min.js') }}"></script>
    @endif
    <script src="{{ asset('vendor/app/js/form-validator.min.js') }}"></script>
    <script src="{{ asset('vendor/app/js/contact-form-script.js') }}"></script>
    <script src="{{ asset('vendor/app/js/custom.js') }}"></script>
    
</body>