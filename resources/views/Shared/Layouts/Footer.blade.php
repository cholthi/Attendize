<footer class="footer-section pt-5 pb-3">
    <div class="container">
        <div class="footer-grid mb-4">
            <div>
                <h5 class="footer-links-title">Use Ticketana</h5>
                <ul class="footer-links list-unstyled mb-0">
                    <li class="footer-link-item">
                        <a href="{{route('howToBuy')}}" class="footer-link">How to buy a ticket</a>
                    </li>
                    <li class="footer-link-item">
                        <a href="{{route('howToSell')}}" class="footer-link">How to sell tickets</a>
                    </li>
                   <li class="footer-link-item">
                        <a href="#" class="footer-link">Contact us</a>
                    </li>

                </ul>
            </div>
            <div>
                <h5 class="footer-links-title">Legal</h5>
                <ul class="footer-links list-unstyled mb-0">
                    <li class="footer-link-item">
                        <a href="{{route('termsAndConditions')}}" class="footer-link">Terms and Conditions</a>
                    </li>
                    <li class="footer-link-item">
                        <a href="{{route('termsAndConditions')}}" class="footer-link">Privacy Policy</a>
                    </li>

                </ul>
            </div>

            <div class="ml-sm-auto contact-col">
                 <img style="width: 150px;"  alt="Attendize" src="{{asset('assets/images/logo-light.png')}}"/>
                <address style="margin-left:10px;">
                    Ticketana.com<br>
                    Box 564, Airport Road<br>
                    South Sudan
                </address>
            </div>

        </div>
        <div class="py-2 fs-7 d-flex align-items-center">
            <span class="fs-7">© 2022 Ticketana</span>
            <div class="footer-social d-flex align-items-center ms-auto gap-4">
                <a href="">
                    <i class="ico-facebook me-1"></i> Facebook
                </a>
                <a href="">
                    <i class="ico-twitter me-1"></i> Twitter
                </a>
            </div>
        </div>
    </div>
</footer>
