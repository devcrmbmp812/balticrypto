
<!-- Header Start-->


<div class="header <?php echo e((Request::is('about') || Request::is('ico') || Request::is('smartreward') || Request::is('smart-token')|| Request::is('team')|| Request::is('academy')|| Request::is('crypto-university')|| Request::is('debit-ico-ideas')|| Request::is('exchange')|| Request::is('faq')|| Request::is('media-property-empowerment') || Request::is('smart-impact') || Request::is('renewable-energy')|| Request::is('newindustry-investorinstruments-research')||Request::is('mining') ||Request::is('privacy-policy') ||Request::is('terms-and-conditions')? 'inner-page' : '')); ?>  ">
<div id="header-bottom" class="header-bottom nav-bar-top">
      <div class="container">
         <div class="row">
            <div class="col-sm-12">
               <!-- Static navbar -->
               <nav class="navbar navbar-expand-md navbar-light  btco-hover-menu">

                  <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                     <img src="<?php echo e(url::asset('assets/images/menu-logo.png')); ?>" alt=""/>
                  </a>
                  <button class="navbar-toggler bg-white" type="button" >
                     <span class="navbar-toggler-icon"></span>
                  </button>
                   <?php if(Request::is('/')): ?>
                  
                  <div class="collapse navbar-collapse main-BCT-nav">
                     <ul class="navbar-nav">
                        <li class="nav-item <?php echo e((Request::is('about') ) ? 'active' : ''); ?> ">
                           <a class="nav-link" href="<?php echo e(url('/')); ?>/#about">About</a>  
                        </li>

                        <li class="nav-item <?php echo e((Request::is('ico') ) ? 'active' : ''); ?>">
                           <a class="nav-link" href="<?php echo e(url('/')); ?>/#home-ico">ICO</a>
                        </li>
                        <li class="nav-item <?php echo e((Request::is('smart-token') ) ? 'active' : ''); ?>">
                           <a class="nav-link" href="<?php echo e(url('/')); ?>/#Ecoverse" >Ecoverse</a>
                        </li>

                        


                        <li class="nav-item <?php echo e((Request::is('smartreward') ) ? 'active' : ''); ?>">
                           <a class="nav-link" href="<?php echo e(url('/')); ?>/#mining-calc">Rewards</a>
                        </li>
                        <li class="nav-item <?php echo e((Request::is('') ) ? 'active' : ''); ?>">
                           <a class="nav-link" href="<?php echo e(url('/')); ?>/#roadmap">Roadmap</a>
                        </li>
                         <li class="nav-item <?php echo e((Request::is('team') ) ? 'active' : ''); ?>">
                           <a class="nav-link" href="<?php echo e(url('/')); ?>/#home-team" >team</a>
                        </li>
                         <li class="nav-item <?php echo e((Request::is('faq') ) ? 'active' : ''); ?>" >
                             <a class="nav-link" href="<?php echo e(url('/faq')); ?>" >FAQ</a>
                         </li>

                     </ul>

                     <div class="header-right">
                     <ul class="mb-0">
                        
                        <li><a href="<?php echo e(url('assets\images\Whitepaper.pdf')); ?>" class="">WHITEPAPER</a></li>
                            <?php if(Sentinel::check()): ?>
                            <?php if(Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == '1'): ?>
                              <li><a href="<?php echo e(url('admin/dashboard')); ?>" class="color-font">Dashboard</a></li>
                            <?php elseif(Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == '2'): ?>
                              <li><a href="<?php echo e(url('user/dashboard')); ?>" class="color-font">Dashboard</a></li>
                            <?php elseif(Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == '4'): ?>
                               <li><a href="<?php echo e(url('support/dashboard')); ?>" class="color-font">Dashboard</a></li>
                            <?php endif; ?>
                            <?php else: ?>
                               <li><a href="<?php echo e('https://whitelist.balticrypto.io'); ?>" class="color-font">JOIN</a></li>
                               
                            <?php endif; ?>
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
                     
                     
                     
                     
                     
                     
                     
                      


               </div>
                  </div>
                   <?php else: ?>
                       <div class="collapse navbar-collapse main-BCT-nav">
                           <ul class="navbar-nav">
                               <li class="nav-item <?php echo e((Request::is('about') ) ? 'active' : ''); ?> ">
                                   <a class="nav-link" href="<?php echo e(url('/')); ?>/#about" onclick="return window.location.replace('<?php echo e(url('/')); ?>#about');">about</a>
                               </li>

                               <li class="nav-item <?php echo e((Request::is('ico') ) ? 'active' : ''); ?>" onclick="return window.location.replace('<?php echo e(url('/')); ?>#home-ico');" >
                                   <a class="nav-link" href="<?php echo e(url('/')); ?>/#home-ico">ICO</a>
                               </li>
                               <li class="nav-item <?php echo e((Request::is('smart-token') ) ? 'active' : ''); ?>" onclick="return window.location.replace('<?php echo e(url('/')); ?>#Ecoverse');">
                                   <a class="nav-link" href="<?php echo e(url('/')); ?>/#Ecoverse" >Ecoverse</a>
                               </li>

                               


                               <li class="nav-item <?php echo e((Request::is('smartreward') ) ? 'active' : ''); ?>" onclick="return window.location.replace('<?php echo e(url('/')); ?>#mining-calc');">
                                   <a class="nav-link" href="<?php echo e(url('/')); ?>/#mining-calc">Rewards</a>
                               </li>
                               <li class="nav-item <?php echo e((Request::is('') ) ? 'active' : ''); ?>" onclick="return window.location.replace('<?php echo e(url('/')); ?>#roadmap');">
                                   <a class="nav-link" href="<?php echo e(url('/')); ?>/#roadmap">Roadmap</a>
                               </li>
                               <li class="nav-item <?php echo e((Request::is('team') ) ? 'active' : ''); ?>" onclick="return window.location.replace('<?php echo e(url('/')); ?>#home-team');">
                                   <a class="nav-link" href="<?php echo e(url('/')); ?>/#home-team" >team</a>
                               </li> 
                                <li class="nav-item <?php echo e((Request::is('faq') ) ? 'active' : ''); ?>" >
                                   <a class="nav-link" href="<?php echo e(url('/faq')); ?>" >FAQ</a>
                               </li>

                           </ul>

                           <div class="header-right">
                     <ul class="mb-0">
                        
                        <li><a href="<?php echo e(url('assets\images\Whitepaper.pdf')); ?>" class="">WHITEPAPER</a></li>
                            <?php if(Sentinel::check()): ?>
                            <?php if(Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == '1'): ?>
                              <li><a href="<?php echo e(url('admin/dashboard')); ?>" class="color-font">Dashboard</a></li>
                            <?php elseif(Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == '2'): ?>
                              <li><a href="<?php echo e(url('user/dashboard')); ?>" class="color-font">Dashboard</a></li>
                            <?php elseif(Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == '4'): ?>
                               <li><a href="<?php echo e(url('support/dashboard')); ?>" class="color-font">Dashboard</a></li>
                            <?php endif; ?>
                            <?php else: ?>
                               <li><a href="<?php echo e(url('register')); ?>" class="color-font">JOIN</a></li>
                            <?php endif; ?>
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
                     
                     
                     
                     
                     
                     
                     
                      


               </div>
                       </div>

                   <?php endif; ?>
                  
                  
               
                  
               </nav>

            </div>
         </div>
      </div>
   </div>
</div>
<!-- Header End-->