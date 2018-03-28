
<!-- Header Start-->
{{--<div class="header {{{ (Request::is('about') || Request::is('ico') || Request::is('smartreward') || Request::is('smart-token')|| Request::is('team')|| Request::is('academy')|| Request::is('crypto-university')|| Request::is('debit-ico-ideas') || Request::is('smart-impact') || Request::is('renewable-energy')|| Request::is('newindustry-investorinstruments-research')||Request::is('mining')  ? 'inner-page' : '')  }}}  ">--}}

<div class="header {{{ (Request::is('about') || Request::is('ico') || Request::is('smartreward') || Request::is('smart-token')|| Request::is('team')|| Request::is('academy')|| Request::is('crypto-university')|| Request::is('debit-ico-ideas')|| Request::is('exchange')|| Request::is('faq')|| Request::is('media-property-empowerment') || Request::is('smart-impact') || Request::is('renewable-energy')|| Request::is('newindustry-investorinstruments-research')||Request::is('mining') ||Request::is('privacy-policy') ||Request::is('terms-and-conditions')? 'inner-page' : '')  }}}  ">
<div id="header-bottom" class="header-bottom nav-bar-top">
      <div class="container">
         <div class="row">
            <div class="col-sm-12">
               <!-- Static navbar -->
               <nav class="navbar navbar-expand-md navbar-light  btco-hover-menu">

                  <a class="navbar-brand" href="{{ url('/') }}">
                     <img src="{{url::asset('assets/images/menu-logo.png')}}" alt=""/>
                  </a>
                  <button class="navbar-toggler bg-white" type="button" >
                     <span class="navbar-toggler-icon"></span>
                  </button>
                   @if(Request::is('/'))
                  
                  <div class="collapse navbar-collapse main-BCT-nav">
                     <ul class="navbar-nav">
                        <li class="nav-item {{{ (Request::is('about') ) ? 'active' : '' }}} ">
                           <a class="nav-link" href="{{url('/')}}/#about">About</a>  
                        </li>

                        <li class="nav-item {{{ (Request::is('ico') ) ? 'active' : '' }}}">
                           <a class="nav-link" href="{{url('/')}}/#home-ico">ICO</a>
                        </li>
                        <li class="nav-item {{{ (Request::is('smart-token') ) ? 'active' : '' }}}">
                           <a class="nav-link" href="{{url('/')}}/#Ecoverse" >Ecoverse</a>
                        </li>

                        {{--index.html#testimonial--}}


                        <li class="nav-item {{{ (Request::is('smartreward') ) ? 'active' : '' }}}">
                           <a class="nav-link" href="{{url('/')}}/#mining-calc">Rewards</a>
                        </li>
                        <li class="nav-item {{{ (Request::is('') ) ? 'active' : '' }}}">
                           <a class="nav-link" href="{{url('/')}}/#roadmap">Roadmap</a>
                        </li>
                         <li class="nav-item {{{ (Request::is('team') ) ? 'active' : '' }}}">
                           <a class="nav-link" href="{{url('/')}}/#home-team" >team</a>
                        </li>
                         <li class="nav-item {{{ (Request::is('faq') ) ? 'active' : '' }}}" >
                             <a class="nav-link" href="{{url('/faq')}}" >FAQ</a>
                         </li>

                     </ul>

                     <div class="header-right">
                     <ul class="mb-0">
                        
                        <li><a href="{{url('assets\images\Whitepaper.pdf')}}" class="">WHITEPAPER</a></li>
                            @if(Sentinel::check())
                            @if(Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == '1')
                              <li><a href="{{url('admin/dashboard')}}" class="color-font">Dashboard</a></li>
                            @elseif(Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == '2')
                              <li><a href="{{url('user/dashboard')}}" class="color-font">Dashboard</a></li>
                            @elseif(Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == '4')
                               <li><a href="{{url('support/dashboard')}}" class="color-font">Dashboard</a></li>
                            @endif
                            @else
                               <li><a href="{{'https://whitelist.balticrypto.io'}}" class="color-font">JOIN</a></li>
                               {{--<li><a href="{{url('register')}}" class="color-font">JOIN</a></li>--}}
                            @endif
                               <li><div class="dropdown">
                              <button class="btn bg-transparent dropdown-toggle" type="button" data-toggle="dropdown"><span class="text-white">ENG</span>
                                 <span class="caret"></span></button>
                              <ul class="dropdown-menu mb-0">
                                 <li><a href="#">Eng</a></li>
                                 <li><a href="#">Eng</a></li>
                                 <li><a href="#">Eng</a></li>
                                 <li><a href="#">Eng</a></li>
                              </ul>
                           </div>
                            </li>
                     </ul>
                     {{--@if(Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == '1')--}}
                     {{--<a class="btn-sm btn-dash" href="{{url('admin/dashboard')}}">Dashboard</a>--}}
                     {{--@elseif(Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == '2')--}}
                     {{--<a class="btn-sm btn-dash" href="{{url('user/dashboard')}}">Dashboard</a>--}}
                     {{--@else--}}
                     {{--<a class="btn-sm btn-login" href="{{url('login')}}">Login</a>--}}
                     {{--<a class="btn-sm btn-signup" href="{{url('register')}}">Register</a>--}}
                      {{--@endif--}}


               </div>
                  </div>
                   @else
                       <div class="collapse navbar-collapse main-BCT-nav">
                           <ul class="navbar-nav">
                               <li class="nav-item {{{ (Request::is('about') ) ? 'active' : '' }}} ">
                                   <a class="nav-link" href="{{url('/')}}/#about" onclick="return window.location.replace('{{url('/')}}#about');">about</a>
                               </li>

                               <li class="nav-item {{{ (Request::is('ico') ) ? 'active' : '' }}}" onclick="return window.location.replace('{{url('/')}}#home-ico');" >
                                   <a class="nav-link" href="{{url('/')}}/#home-ico">ICO</a>
                               </li>
                               <li class="nav-item {{{ (Request::is('smart-token') ) ? 'active' : '' }}}" onclick="return window.location.replace('{{url('/')}}#Ecoverse');">
                                   <a class="nav-link" href="{{url('/')}}/#Ecoverse" >Ecoverse</a>
                               </li>

                               {{--index.html#testimonial--}}


                               <li class="nav-item {{{ (Request::is('smartreward') ) ? 'active' : '' }}}" onclick="return window.location.replace('{{url('/')}}#mining-calc');">
                                   <a class="nav-link" href="{{url('/')}}/#mining-calc">Rewards</a>
                               </li>
                               <li class="nav-item {{{ (Request::is('') ) ? 'active' : '' }}}" onclick="return window.location.replace('{{url('/')}}#roadmap');">
                                   <a class="nav-link" href="{{url('/')}}/#roadmap">Roadmap</a>
                               </li>
                               <li class="nav-item {{{ (Request::is('team') ) ? 'active' : '' }}}" onclick="return window.location.replace('{{url('/')}}#home-team');">
                                   <a class="nav-link" href="{{url('/')}}/#home-team" >team</a>
                               </li> 
                                <li class="nav-item {{{ (Request::is('faq') ) ? 'active' : '' }}}" >
                                   <a class="nav-link" href="{{url('/faq')}}" >FAQ</a>
                               </li>

                           </ul>

                           <div class="header-right">
                     <ul class="mb-0">
                        
                        <li><a href="{{url('assets\images\Whitepaper.pdf')}}" class="">WHITEPAPER</a></li>
                            @if(Sentinel::check())
                            @if(Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == '1')
                              <li><a href="{{url('admin/dashboard')}}" class="color-font">Dashboard</a></li>
                            @elseif(Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == '2')
                              <li><a href="{{url('user/dashboard')}}" class="color-font">Dashboard</a></li>
                            @elseif(Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == '4')
                               <li><a href="{{url('support/dashboard')}}" class="color-font">Dashboard</a></li>
                            @endif
                            @else
                               <li><a href="{{url('register')}}" class="color-font">JOIN</a></li>
                            @endif
                               <li><div class="dropdown">
                              <button class="btn bg-transparent dropdown-toggle" type="button" data-toggle="dropdown"><span class="text-white">ENG</span>
                                 <span class="caret"></span></button>
                              <ul class="dropdown-menu mb-0">
                                 <li><a href="#">Eng</a></li>
                                 <li><a href="#">Eng</a></li>
                                 <li><a href="#">Eng</a></li>
                                 <li><a href="#">Eng</a></li>
                              </ul>
                           </div>
                            </li>
                     </ul>
                     {{--@if(Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == '1')--}}
                     {{--<a class="btn-sm btn-dash" href="{{url('admin/dashboard')}}">Dashboard</a>--}}
                     {{--@elseif(Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == '2')--}}
                     {{--<a class="btn-sm btn-dash" href="{{url('user/dashboard')}}">Dashboard</a>--}}
                     {{--@else--}}
                     {{--<a class="btn-sm btn-login" href="{{url('login')}}">Login</a>--}}
                     {{--<a class="btn-sm btn-signup" href="{{url('register')}}">Register</a>--}}
                      {{--@endif--}}


               </div>
                       </div>

                   @endif()
                  
                  
               
                  
               </nav>

            </div>
         </div>
      </div>
   </div>
</div>
<!-- Header End-->