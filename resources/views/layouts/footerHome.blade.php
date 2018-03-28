<!-- Footer Start -->
<footer class="@if(Request::is('about') || Request::is('ico')||Request::is('faq')|| Request::is('smart-impact')|| Request::is('newindustry-investorinstruments-research')||Request::is('mining')||Request::is('academy')||Request::is('debit-ico-ideas')||Request::is('media-property-empowerment'))inner-footer @elseif(Request::is('smartreward')|| Request::is('smart-token')|| Request::is('team')|| Request::is('crypto-university')|| Request::is('exchange')|| Request::is('renewable-energy')||Request::is('privacy-policy') ||Request::is('terms-and-conditions'))left-footer @else @endif">

   <div class="container footer-clip">
      <div class="row">
         <div class="col-sm-12">
            <h2 class="title text-white text-center">
               Join the BaltiCrypto community
            </h2>
         </div>
         <div class="col-sm-12 text-center">
            <form class="form-inline theme-form-inline">
              <!--  <div id="error-message"> </div>
               <div id="success-message"> </div>
               <div id="warning-message"> </div> -->
               <div class="input-group mb-2 mr-sm-2 offset-md-1">

                  <input type="email" class="form-control subscribe-bottom" id="subscribe_email" placeholder="Your email address">

               </div>
               <a onclick="addSubscribe()" class="theme-btn btn-gradiant mb-2 btn-glow">Subscribe</a>
            </form>
         </div>
         <div class="col-sm-12 text-center">
            <ul class="footer-social">
               <li>
                  <div class="social-block">
                     <a href="https://twitter.com/Balti_Crypto" target="_blank"><i class="fa fa-twitter"></i></a>
                  </div>
               </li>
               <li>
                  <div class="social-block">
                     <a href="https://www.facebook.com/balticryptoICO/" target="_blank"><i class="fa fa-facebook"></i></a>
                  </div>
                  <div class="social-block">
                     <a href="#"><i class="fa fa-youtube"></i></a>
                  </div>
               </li>
               <li>
                  <div class="social-block">
                     <a href="https://t.me/officialbalticryptochannel"><i class="fa fa-send"></i></a>
                  </div>
               </li>
               <li>
                  <div class="social-block">
                     <a href="https://www.instagram.com/balticryptoico/" target="_blank"><i class="fa fa-instagram"></i></a>
                  </div>
                  <div class="social-block">
                     <a href="#"><img src="assets/images/steemit.png"/></a>
                  </div>
               </li>
               <li>
                  <div class="social-block">
                     <a href="https://www.linkedin.com/in/balticrypto" target="_blank"><i class="fa fa-linkedin"></i></a>
                  </div>
               </li>
               <li>
                  <div class="social-block">
                     <a href="#"><i class="fa fa-github"></i></a>
                  </div>
                  <div class="social-block">
                     <a href="https://www.reddit.com/user/balticrypto" target="_blank"><i class="fa fa-reddit-alien"></i></a>
                  </div>
               </li>
               <li class="t-y-30">
                  <div class="social-block">
                     <a href="https://medium.com/@balticrypto" target="_blank"><img src="assets/images/medium.png"/></a>
                  </div>
               </li>
            </ul>
         </div>

         <div class="col-sm-12 footer-bottom">
            <div class="row responsive-mt-70">
               <div class="col-sm-12 col-md-3 mobile-text-center">
                  <img src="assets/images/logo.png" />
                  
                  <p class="mt-2">
                     <ul>
                        <li><a target="_blank" href="{{url('terms-and-conditions')}}">Terms & Conditions</a></li>
                        <li><a target="_blank" href="{{url('privacy-policy')}} ">Privacy Policy</a></li>
                     </ul>
                     <br><span class="text-white">© All rights reserved</span>
                  </p>
               </div>
               <div class="col-sm-12 col-md-4 mobile-text-center">
               <h3>Contact</h3>
                  <ul>
                     <li><span>Webpage : </span>www.balticrypto.io</li>
                     <li><span>Info : </span>info@balticrypto.com</li>
                     <li><span>Support : </span>support@balticrypto.com</li>
                     <li><span>Contributors : </span>contributors@balticrypto.com</li>
                  </ul>
                 <!--  <p id="ico-timer-footer"></p> -->
               </div>
               <div class="col-sm-12 col-md-5 mobile-text-center">
                  <h3>Sitemap</h3>
                  <ul>
                     <li><a href="{{url('about')}}">About</a></li>
                     <li><a href="{{url('ico')}}">ICO</a></li>
                     <li><a href="{{url('smart-token')}}">Ecoverse</a></li>
                     <li><a href="{{url('smartreward')}}">Rewards</a></li>
                     <li><a href="{{url('/')}}/#roadmap">Roadmap</a></li>
                     <li><a href="{{url('team')}}">Team</a></li>
                     <li><a target="_blank" href="{{url('terms-and-conditions')}}">Terms & Conditions</a></li>
                  </ul>
                  <ul class="ml-5">
                     <li ><a href="{{url('faq')}}">F.A.Q</a></li>
                     <li><a href="{{url('ico')}}">Affiliate & Bounty</a></li>
                     <li><a href="{{url('media-property-empowerment')}}">Media</a></li>
                     <li><a href="{{url('assets\images\Whitepaper.pdf')}}"  target="blank">White paper</a></li>
                     <li><a href="{{url('assets\images\LightPaper.pdf')}}"  target="blank">Light paper</a></li>
                     <li><a target="_blank" href="{{url('privacy-policy')}} ">Privacy Policy</a></li>
                  </ul>
               </div>

            </div>
         </div>
         {{--<div class="col-sm-3">--}}
            {{--<div class="payment-img text-center">--}}
               {{--<a href=""> <img src="assets/images/payment-info.png" alt="payment info"></a>--}}
            {{--</div>--}}
         {{--</div>--}}
         {{--<div class="col-sm-6">--}}
            {{--<div class="copyright">--}}
               {{--<p class="text-center m-0">© Copyright by BCT corperation 2018.</p>--}}
            {{--</div>--}}
         {{--</div>--}}
         {{--<div class="col-lg-3 col-sm-12 text-center">--}}
            {{--<div class="footer-social">--}}
               {{--<a href="https://www.facebook.com/BCTCoin/" class=""><i class="fa fa-facebook"></i> </a>--}}
               {{--<a href="https://twitter.com/BCTCoin" class=""><i class="fa fa-twitter"></i> </a>--}}
               {{--<a href="#" class=""><i class="fa fa-linkedin"></i> </a>--}}
               {{--<a href="#" class=""><i class="fa fa-youtube"></i> </a>--}}
               {{--<a href="https://t.me/BCTCoin_Official" class=""><i class="fa fa fa-telegram"></i> </a>--}}
            {{--</div>--}}
         {{--</div>--}}
      </div>
   </div>
</footer>
<!-- Footer Ends -->
<!-- Tap on Top -->
<div class="tap-top">
   <div>
      <i class="fa fa-angle-double-up"></i>
   </div>
</div>

<!-- Tap on Ends -->