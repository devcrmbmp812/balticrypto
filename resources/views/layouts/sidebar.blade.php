<?php
// check admin or user
$slug = Sentinel::getUser()->roles()->first()->slug;
?>
      <div class="nice-nav">

         <div class="user-info">

            <div class="media">
               @if($slug == '1')
            <a href="{{ url('admin/dashboard')}}">
               <img class="mr-3 align-self-center" src="{{ url('/assets/images/user')}}/{{Sentinel::getUser()->profile}}" alt="Generic placeholder image">
            </a>
            @else
            <a href="{{ url('user/dashboard')}}">
               <img class="mr-3 align-self-center" src="{{ url('/assets/images/user')}}/{{Sentinel::getUser()->profile}}" alt="Generic placeholder image">
            </a>
            @endif
               <div class="media-body">
                  <h5>{{Sentinel::getUser()->first_name}}</h5>
                 <h6>{{Sentinel::getUser()->last_name}}</h6>
               </div>
            </div>
         </div>

         <ul>
            @if($slug == '1')
            <!-- Admin Menu Section -->
            <li><a href="{{url('admin/dashboard')}}" class="{{ (Request::is('admin/dashboard') ? 'active ' : '') }}">Dashboard</a> </li>
            <li><a href="{{url('admin/users')}}" class="{{ (Request::is('admin/users') ? 'active ' : '') }}">Users</a></li>
            <li><a href="{{url('admin-withdrawal')}}" class="{{ (Request::is('admin-withdrawal') ? 'active ' : '') }}">Withdrawal Request</a> </li>
            <li> <a href="{{url('admin-setting')}}" class="{{ (Request::is('admin-setting') ? 'active ' : '') }}">ICO Settings</a>  </li>
            <li> <a href="{{url('admin-rates')}}" class="{{ (Request::is('admin-rates') ? 'active ' : '') }}">Rate Settings</a> </li>
             <li class="child-menu">
               <a href="#"><span>Transaction History</span> <span class="fa fa-angle-right toggle-right"></span>
               </a>
               <ul class="child-menu-ul">
                  <li>
                     <a href="{{url('admin-buytokentransaction')}}">Buy Token </a>
                  </li>
                  <li>
                     <a href="{{url('admin-deposittransaction')}}">Deposit</a>
                  </li>
                  <li>
                     <a href="{{url('admin-withdrawaltransaction')}}">Withdrawal</a>
                  </li>
                  <li>
                        <a href="{{url('admin-tokentransaction')}}">Transfer Token</a>
                  </li>
               </ul>
            </li>

              <li> <a href="{{url('admin-kycstatusupdate')}}" class="{{ (Request::is('admin-kycstatusupdate') ? 'active ' : '') }}">User Kyc List</a> </li>
              <li><a href="{{url('admin-bounty')}}" class="{{ (Request::is('admin-bounty') ? 'active ' : '') }}">User Bounty</a> </li>
              <li> <a href="{{url('admin/subscriber')}}" class="{{ (Request::is('admin/subscriber') ? 'active ' : '') }}">Subscribers</a> </li>
               <li><a href="{{url('admin/support')}}" class="{{ (Request::is('admin/support') ? 'active ' : '') }}">Support</a> </li>
             <li><a href="{{url('admin/profile')}}" class="{{ (Request::is('admin/profile') ? 'active ' : '') }}">Profile</a> </li>
             <li> <a href="{{url('list_user')}}" class="{{ (Request::is('list_user') ? 'active ' : '') }}">Partners / Advisors</a> </li>  
            <li><a href="{{url('admin/team-member')}}" class="{{ (Request::is('team_member') ? 'active ' : '') }}">Team Members</a></li>
             <li><a href="{{url('admin/partner')}}" class="{{ (Request::is('partner') ? 'active ' : '') }}">Partner Exchanges</a>  </li>
              
            <li> <a href="{{url('admin/negotiation')}}" class="{{ (Request::is('negotiation') ? 'active ' : '') }}">Negotiation</a></li>
            <li> <a href="{{url('admin/polls')}}" class="{{ (Request::is('polls') ? 'active ' : '') }}">Polls</a> </li>
            <li><a href="{{url('admin/user-referral')}}" class="{{ (Request::is('admin/user-referral') ? 'active ' : '') }}">User-Referral</a></li>


            {{--<li class="child-menu">--}}
               {{--<a href="#"><span>Site Setting</span> <span class="fa fa-angle-right toggle-right"></span>--}}
               {{--</a>--}}
               {{--<ul class="child-menu-ul">--}}
                  {{--<li>--}}
                     {{--<a href="{{url('admin-sitelogo')}}">Logo</a>--}}
                  {{--</li>--}}

                  {{--<li>--}}
                     {{--<a href="{{url('admin-pages')}}">Pages</a>--}}
                  {{--</li>--}}

                  {{--<li>--}}
                     {{--<a href="{{url('admin-socialLink')}}">Social Link</a>--}}
                  {{--</li>--}}
                 {{----}}
               {{--</ul>--}}
            {{--</li>--}}

            <!-- End Admin Menu Section -->
            @elseif($slug == '4')
               <!-- User Menu Section -->
                  <li>
                     <a href="{{url('support/dashboard')}}"  class="{{ (Request::is('support/dashboard') ? 'active ' : '') }}">Dashboard</a>
                  </li>
                  <li>
                     <a href="{{url('support/profile')}}" class="{{ (Request::is('support/profile') ? 'active ' : '') }}">Profile</a>
                  </li>

                  <li><a href="{{url('support/bounty')}}" class="{{ (Request::is('support/bounty') ? 'active ' : '') }}">Bounty Dashboard</a></li>


                  <li>
                     <a href="{{url('support/kycstatusupdate')}}" class="{{ (Request::is('support/kycstatusupdate') ? 'active ' : '')}}">KYC Form</a>
                  </li>


            @else
            <!-- User Menu Section -->
            <li>
               <a href="{{url('user/dashboard')}}"  class="{{{ (Request::is('user/dashboard') ? 'active ' : '') }}}">Dashboard</a>
            </li>


             <li class="child-menu">
               <a href="#"><span>ICO</span> <span class="fa fa-angle-right toggle-right"></span>
               </a>
               <ul class="child-menu-ul">
                  <li>
                     <a href="{{url('user-ico')}}">Buy BCT Token</a>
                  </li>
                  @if($header_data['transfer'] == 1)
                  <li>
                     <a href="{{url('user-transferToken')}}">Transfer BCT Token</a>
                  </li>
                  @endif
                  <li>
                     <a href="{{url('user-icoInformation')}}">ICO Information</a>
                  </li>

               </ul>
            </li>
               <li>
                  <a href="{{url('user-wallet')}}" class="{{{ (Request::is('user-wallet') ? 'active ' : '') }}}">Wallet</a>
               </li>
               <li class="child-menu">
                  <a href="#"><span>Transaction History</span> <span class="fa fa-angle-right toggle-right"></span>
                  </a>
                  <ul class="child-menu-ul">
                     <li>
                        <a href="{{url('buytokentransaction')}}">Buy Token </a>
                     </li>
                     <li>
                        <a href="{{url('deposittransaction')}}">Deposit</a>
                     </li>
                     <li>
                        <a href="{{url('withdrawaltransaction')}}">Withdrawal</a>
                     </li>
                     <li>
                        <a href="{{url('tokentransaction')}}">Transfer Token</a>
                     </li>

                  </ul>
               </li>
               <li>
                  <a href="{{url('user/profile')}}" class="{{{ (Request::is('user/profile') ? 'active ' : '') }}}">Profile</a>
               </li>
               <li>
                  <a href="{{url('quick-polls')}}" class="{{{ (Request::is('quick-polls') ? 'active ' : '') }}}">Polls</a>
               </li>
               <li><a href="{{url('bounty-dash')}}" class="{{{ (Request::is('bounty-dash') ? 'active ' : '') }}}">Bounty Dashboard</a></li>


            <li>
               <a href="{{url('user-referral')}}" class="{{{ (Request::is('user-referral') ? 'active ' : '') }}}">Referral List</a>
            </li>
            <li>
               <a href="{{url('user/login-history')}}" class="{{{ (Request::is('user/login-history') ? 'active ' : '') }}}">Login History</a>
            </li>



             <li><a href="{{url('kyc-newForm')}}" class="{{ (Request::is('kyc-newForm') ? 'active ' : '') }}">KYC Form</a></li>
            <!-- End User Menu Section -->
            @endif
         </ul>
      </div>