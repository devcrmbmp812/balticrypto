@extends('layouts.masterHome')
@section('title') BCT Coin Home Page @endsection
@section('style')
<!-- Responsive css -->
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/responsive.css') }}" >
@endsection
@section('content')

<header  class="jarallax"  data-jarallax='{"speed": 0.2}'    style="background-image: url(assets/images/bg-2.jpeg);"  >
<div class="container">
    <div class="row">
        <div class="col-md-5 mobile-text-center">
            <div class="home-coin">
            <a href="{{url('smart-token')}}"><img src="{{asset('assets/images/coin.png')}}"></a>
            </div>
            <h1 id="intro-title"><span>Highly  Profitable</span></h1>
            <p class="intro-paragraph"><span class="intro-sub-title">SMART SUSTAINABLE ECOVERSE</span><br /> - powered by blockchain technology, backed by real assets</p>
            <p>With ongoin Smart Hybrid Token payout<br>
                direct to your private wallet.</p>
            <div class="mt-4">
            <a href="{{url('/')}}/#home-ico" class="theme-btn mr-3">ICO details</a>
            <a  target="_blank" href="{{url('assets\images\Whitepaper.pdf')}}" class="theme-btn">White paper</a>
            </div>
        </div>
        <div class="col-md-7 bg-right text-center">
            <div class="home-right">
                <h2 class="text-white">Pre-sale starts</h2>
                <div class="row">
                    <div class="col-sm-12">
                        <!-- <?php
                        $ico_strat_date = strtotime($seting->ico_start_date); $ico_end_date = strtotime($seting->ico_end_date);
                          if($ico_strat_date <= time() && $ico_end_date >= time()){
                              $ico_status='ICO Sale is live now';
                              $date= $seting->ico_end_date;

                             }
                          elseif($ico_strat_date > time()){  $ico_status='ICO Sale is strat at';  $date= $seting->ico_start_date; }
                          elseif($ico_end_date < time()){ $ico_status='ICO Sale is ended'; $date="10-12-2015";  }
                          else{ $date="";  }
                        ?> -->
                        <p id="ico-timer"></p>
                    </div>
                </div>

            <div class="prices">
                <div>
                    <h4>Token price today:</h4>
                    <h2 class="">USD ${{number_format($seting->rate,2)}}</h2>
                </div>
                <div>
                    <h4>Bouns:</h4>
                    <h2><span class="">{{$seting->bonus}}%</span></h2>
                </div>
            </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div>

                            {{--<a href="{{url('register')}}" class="theme-btn btn-gradiant btn-glow">Join the Whitelist Now!</a>--}}
                            <a href="{{'https://whitelist.balticrypto.io'}}" class="theme-btn btn-gradiant btn-glow">Join the Whitelist Now!</a>
                        </div>
                        <p> We accept<br>
                           <b>ETH, BTC, LTC </b>
                        </p>
                    </div>
                </div>
        </div>
            <div class="mt-61">
                <a href="#" class="theme-btn btn-inverse mr-4"><span>Contributed (USD)<br/></span>0</a>
                <a href="#" class="theme-btn btn-inverse mr-4"><span>BCT sold<br/></span>{{number_format($seting->sold_coins)}}</a>
                <a href="#" class="theme-btn btn-inverse  mr-4"><span>Contributors<br/></span>{{$count_user}}</a>
            </div>
        </div>
    </div>
</div>
</header>

@include('layouts.bottom_fix')

<!-- about Section -->

<section class="about-us" id="about">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mobile-text-center reveal-left">
                <div class="about-video-home text-right">
                    <img src="assets/images/home/about-video-background.png" class="img-fluid">
                    <div class="row play-video-button-container">
                        <button class="btn-play-video" data-toggle="modal" data-target="#about-video-modal"><img src="assets/images/home/play-video-button.png" class="img-fluid"></button>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mobile-text-center responsive-mt-70 reveal-right">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title">
                            <h2>What is BaltiCrypto?</h2>
                        </div>
                    </div>
                    <div class="col-md-12 about-us-content">
                        <p>
                            BaltiCrypto is a highly profitable smart sustainable ecoverse powered by blockchain technology.<br><br>
                            BaltiCrypto is a revolution in blockchain technology, a vertically integrated & pioneering enterprise focusing on realising the true potential of this game-changing tech, from crypto mining, to tailored wealth education and crypto trade solutions, as well as effective, targeted positive impact foundations addressing real problems ethically and transparently. All while providing ongoing rewards back to BaltiCrypto’s token holders.<br><br>
                            <strong>MISSION: </strong> Enriching the lives of all contributors while making the world a better place.

                        </p>
                        <a href="{{url('about')}}" class="theme-btn mr-3">read more</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="small-intro-home">
                    <div class="row">
                        <div class="col-md-12 reveal-right">
                            <div class="title">
                                <h2 class="text-center">Introducing a new<br><span> Smart Hybrid </span> Ongoing Reward Token</h2>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-8 intro-text offset-md-2 reveal-right">
                            <p>
                                BaltiCrypto ‘SMART Hybrid Reward Token’ (BCT) is a cryptocurrency running on Ethereum platform (ERC20), backed by BaltiCrypto’s ECOVERSE. BCT is multifunctional token providing more benefits and options than usually offered by traditional utility or security tokens.
                            </p>
                            <div class="text-center">
                                <a href="{{url('smart-token')}}" class="theme-btn mr-3 text-center">read more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- about section end -->


<section class="charts clip-section-bg" id="home-ico">
    <div class="container mb-150">

        <div class="col-sm-12 mb-5 pt-150 text-center reveal-right">
                <h2 class="title">Massive <span>10%</span> Affiliate bonus and Bounty program</h2>
                <div><a href="{{url('ico')}}" class="theme-btn mb-5">Read more</a></div>
        </div>
        <div class="row ico-stage">

            <div class="col-sm-2 offset-md-1">
                <div class="ico-round active">
                    <h4>Pre sales</h4>
                    <h5>$0.50</h5>
                    <h5>30% Bonus</h5>
                </div>
                <div class="ico-round-info"><h5>Max <span class="text-white">35 Million </span> Tokens
                        26/03/18 - 15/4/18</h5></div>
            </div>
            <div class="col-sm-2">
                <div class="ico-round">
                    <h4>Pre ICO</h4>
                    <h5>$0.55</h5>
                    <h5>25% Bonus</h5>
                </div>
                <div class="ico-round-info">
                    <h5>Max <span class="text-white">45 Million </span>Tokens
                        23/04/18 - 05/05/18</h5></div>
            </div>
            <div class="col-sm-2">
                <div class="ico-round">
                    <h4>ICO 1st Round</h4>
                    <h5>$0.60</h5>
                    <h5>20% Bonus</h5>
                </div>
                <div class="ico-round-info">
                    <h5>Max <span class="text-white">50 Million </span>Tokens
                        07/05/18 - 20/05/18</h5></div>
            </div>
            <div class="col-sm-2">
                <div class="ico-round">
                    <h4>ICO 2nd Round</h4>
                    <h5>$0.65</h5>
                    <h5>15% Bonus</h5>
                </div>
                <div class="ico-round-info">
                    <h5>Max <span class="text-white">75 Million </span>Tokens
                        21/05/18 - 03/06/18</h5></div>
            </div>
            <div class="col-sm-2">
                <div class="ico-round">
                    <h4>ICO 3rd Round</h4>
                    <h5>$0.70</h5>
                    <h5>5% Bonus</h5>
                </div>
                <div class="ico-round-info">
                    <h5>Until a cap of  <span class="text-white">280,000,000</span>
                             Tokens are sold out
                             04/06/18 - TBA</h5></div>
            </div>
        </div>
        <div class="row responsive-mt-70">

            <div class="col-md-6 col-sm-12 mobile-text-center">
                <img src="assets/images/chart1.png" class="img-fluid"/>
            </div>
            <div class="col-md-6 col-sm-12">
                <h2 class="title">ICO Funds Usage</h2>
                <ul>
                    <li><span>70%</span>Sustainable cryptocurrency mining farm (property,warehouses, green energy, software development,hardware and infrastructure).</li>
                    <li><span>12%</span>ECOVERSE projects.</li>
                    <li><span>8%</span>Enterprise (administration, legal costs for ICO,operational, overheads, security, research,development, narketing, insurance).</li>
                    <li><span>6%</span>Founding members (early investors, advisors, team).</li>
                    <li><span>4%</span>General reserve (unforeseen expenses).</li>
                </ul>
            </div>
        </div>
        <div class="row mt-5 ">
            <div class="col-sm-12 col-md-5 offset-sm-1 text-right">
                <h2 class="title">Token Distribution</h2>
                <ul class="right">
                    <li>ICO - (280 Million)<span>70%</span></li>
                    <li>COMPANY - (40 Million)<span>10%</span></li>
                    <li>AFFILIATE BONUS -  (28 Million)<span>7%</span> </li>
                    <li>TEAM - (24 Million)<span>6%</span> </li>
                    <li>PARTNERS - (16 Million)<span>4%</span> </li>
                    <li>SMART FOUNDATION -  (8 Million)<span>2%</span> </li>
                    <li>BOUNTY PROGRAM -  (4 Million)<span>1%</span> </li>
                </ul>
            </div>
            <div class="col-sm-12 col-md-6 responsive-mt-70 mobile-text-center">
                <img src="assets/images/chart2.png" class="img-fluid"/>
            </div>
        </div>
        <div class="col-sm-12 mb-5 mt-5 text-center reveal-bottom">
                <h2 class="title">More detailed info about ICO</h2>
                <div><a href="{{url('ico')}}" class="theme-btn">Read more</a></div>
        </div>
    </div>
    </div>
</section>

<!-- Ecoverse section start -->

<section class="ecoverse" id="Ecoverse">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 reveal-top">
                <div class="title">
                    <h2 class="text-center">BaltiCrypto <span> Ecoverse </span></h2>
                </div>
            </div>
            <div class="col-sm-12 col-md-8 offset-md-2 reveal-bottom">
                <div class="Ecoverse-text text-center">
                    <p>
                        BaltiCrypto Ecoverse is a successful arrangement of different ecologically sustainable elements that leverage off each other to create an extraordinary positive impact on the planet while also enhancing the quality of the lives of everyone who contributes to BaltiCrypto, and participates in the Ecoverse.
                    </p>
                </div>
            </div>
            <!-- <div class="col-sm-12 text-center reveal-right">
                <img src="assets/images/home/Ecoverse.png" class="img-fluid">
            </div> -->

            <div class="col-sm-12">
                <div class="ecovers12">

                    <div class="row">
                        <div class="col-sm-3">

                        </div>
                        <div class="col-sm-6">
                             <div class="inner-boxes">
                            <div class="row">
                                <div class="col-sm-4">
                                    <a href="{{url('renewable-energy')}}" class="hex-inner-1"><img class="float-right" src="assets/images/home/Renewable.png"></a>
                                </div>
                                <div class="col-sm-4">
                                    <a href="{{url('smart-impact')}}" class="hex-inner-2"><img class="float-right" src="assets/images/home/Foundation.png"></a>
                                </div>
                                <div class="col-sm-4">
                                    <a href="{{url('mining')}}" class="hex-inner-3"><img class="float-right" src="assets/images/home/Mining-Farm.png"></a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <a href="{{url('crypto-university')}}" class="hex-inner-4"><img class="float-right" src="assets/images/home/University.png"></a>
                                </div>
                                <div class="col-sm-4">
                                    <a href="{{url('smart-token')}}" class="hex-inner-5"><img class="float-right" src="assets/images/home/Smart-Hybrid-Token.png"></a>
                                </div>
                                <div class="col-sm-4">
                                    <a href="{{url('debit-ico-ideas')}}" class="hex-inner-6"><img class="float-right" src="assets/images/home/Debit-Card.png"></a>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-sm-3">
                        </div>
                    </div>


                    <div class="row ecovers-main-div">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-6">
                                    <a href="{{url('media-property-empowerment')}}" class="hex-1"><img class="float-right" src="assets/images/home/Media.png"></a>
                                </div>
                                <div class="col-sm-6">
                                    <a href="{{url('newindustry-investorinstruments-research')}}" class="hex-2"> <img class="float-left" src="assets/images/home/Integration.png"></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-4">
                                   <a href="{{url('debit-ico-ideas')}}" class="hex-3"> <img class="float-right" src="assets/images/home/Ideas.png"></a>
                                </div>
                                <div class="col-sm-4">
                                </div>
                                <div class="col-sm-4">
                                    <a href="{{url('newindustry-investorinstruments-research')}}" class="hex-4"><img class="float-left" src="assets/images/home/Instruments.png">
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-3">
                                    <a href="{{url('debit-ico-ideas')}}" class="hex-5"><img class="float-right" src="assets/images/home/Ico.png"></a>
                                </div>
                                <div class="col-sm-6">
                                </div>
                                <div class="col-sm-3">
                                    <a href="{{url('newindustry-investorinstruments-research')}}" class="hex-6"><img class="float-left" src="assets/images/home/Blockchain.png"></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-4">
                                    <a href="{{url('academy')}}" class="hex-7"><img class="float-right" src="assets/images/home/Trading.png"></a>
                                </div>
                                <div class="col-sm-4">
                                </div>
                                <div class="col-sm-4">
                                    <a href=" {{url('exchange')}}" class="hex-8"><img class="float-left" src="assets/images/home/Exchange.png"></a>
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-6">
                                    <a href="{{url('media-property-empowerment')}}" class="hex-9"><img class="float-right" src="assets/images/home/Property.png"></a>
                                </div>

                                <div class="col-sm-6">
                                    <a href="{{url('media-property-empowerment')}}" class="hex-10"><img class="float-left" src="assets/images/home/Empowerment.png"></a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Ecoverse section end -->
<!-- mining reward calculator start here -->

<section class="mining-calculator clip-section-bg mobile-text-center" id="mining-calc">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 mb-5 reveal-top">
                <div class="title">
                    <h2 class="text-center m-0 skyblu-font">Smart Rewards</h2>
                    <h2 class="m-0 text-white text-center mt-2">Projected Crypto Mining Reward Calculator</h2>
                </div>
            </div>
            <div class="col-sm-3">

            </div>
            <div class="col-sm-12 tscalecal">
                <div class="container mining-reward-top-text reveal-left">
                    <h3 class="m-2 text-white">Overall output</h3>
                    <h3 class="m-2 skyblu-font">Over 4 year </h3>
                </div>
                <div class="hexagon-2 even">
                <div class="outer ">
                    <div class="inner">
                        <div class="textWrapper text-center">
                            <div class="range-slider-div">
                                <h3>Smart Reward Pool</h3>
                                <h4 class="gray-variation-font">Your Contribution</h4>
                                <h3 id="rangebudget">0</h3>
                                <input class="slider" value="10000" min="1000" max="50000" name="rangeslider" type="range"/>
                                <h4 class="text-white">
                                    With current discount<br><span class="orange-font-color">${{number_format($seting->rate,2)}} + {{$seting->bonus}}% bonus</span>
                                </h4>
                                <div class="bonus">
                Current discount <strong>{{$seting->bonus}}%</strong> <span class="hide-toggle"><span class="on">Hide</span><span class="off">Show</span></span>
            </div>
            <div class="contribution10 mt-3">
                <div class="checkbox">
                    <label>
                        <strong> 10x your contribution </strong> 
                        <input type="checkbox" value="" id="contribution10x">
                        <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                    </label>
                </div>
            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="hexagon-2">
                <div class="outer">
                    <div class="inner second-poligon">
                        <div class="textWrapper">
                            <div class="bar-chart-container">
                              <div class="user_details_progress_bar">
                                <ul>
                                    <li>
                                        <span data-value="120" id="year1" style="height: 40%">
                                            <b>Year 1</b>
                                            <i class="bonus-chart"></i>
                                            <div class="statistic-text"><strong id="year2-bonus">$100,714 </strong><br>
                                                <p>$70,500  without discount</p>
                                            </div>
                                        </span>
                                        <span class="fix-bottom-bar"></span>
                                    </li>
                                    <li>
                                        <span data-value="120" id="year2" style="height: 60%">
                                            <b>Year 2</b>
                                            <i class="bonus-chart"></i>
                                            <div class="statistic-text"> <strong id="year2-bonus">$100,714 </strong> <br>
                                                <p>$70,500  without discount</p>
                                            </div>
                                        </span>
                                        <span class="fix-bottom-bar"></span>
                                    </li>
                                    <li>
                                        <span data-value="100" id="year3" style="height: 80%">
                                            <b>Year 3</b>
                                            <i class="bonus-chart"></i>
                                            <div class="statistic-text"><strong id="year2-bonus">$100,714</strong> <br>
                                                <p>$70,500  without discount</p>
                                            </div>
                                        </span>
                                        <span class="fix-bottom-bar"></span>
                                    </li>
                                    <li>
                                        <span data-value="100" id="year4" style="height: 80%">
                                            <b>Year 4</b>
                                            <i class="bonus-chart"></i>
                                            <div class="statistic-text"><strong id="year2-bonus">$100,714 </strong> <br>
                                                <p>$70,500  without discount</p>
                                            </div>
                                        </span>
                                        <span class="fix-bottom-bar"></span>
                                    </li>
                                </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hex-right">
            <h3>Additional rewards<br>
            from <span class="skyblu-font">Ecoverse</span><br><span class="text-white">(Not Included in the Graph)</span></h3>
            </div>
            <div class="mining-reward-bottom-text reveal-right">
                    <p class="m-2 text-white">Total output <br><span class="skyblu-font">after 4 year </span></p>

                    <h1 class="m-1 skyblu-font font-weight-bold" >USD <span id="final_total">$196,339</span></h1>


                   
                    <p class="m-2 text-white">Projected Reward forecast based on <br>Average Mined Crypto Currencies prices in Feb, 2018<!--  BTC price <span class="skyblu-font">~ 14k.</span> --></p> 
                    <p>(Rewards are sent monthly directly to your private ETH wallet)</p>   
            </div>

        </div>
        </div>
        <div class="row Whitepaper-scenarios mt-4 reveal-bottom">
            <div class="col-sm-2">

            </div>
            <div class="col-md-8 col-sm-12 text-center">
                <h3>See more scenarios in our <span class="skyblu-font">Whitepaper</span></h3>
                <p>*Our comprehensive data and graph above is based on our best realistic projected
forecast 1 BCT TOKEN = USD 0.50c (with variable display option for bonus tokens) =
0.0005 ETH . The previous calculations assume prices of ALT Tokens and BTC prices as
an average in February 2018. All calculations are based on our team’s actual market pre
ICO crypto miners data over the month of February, 2018. If bitcoin and other Alt coins
we mine rise above these levels, the profitability of BaltiCrypto’s Crypto mining assets will
then depend more on mining difficulty and may be lower or higher compared to returns
from direct speculation in all crypto currencies.</p>
            </div>
        </div>

        <div class="col-sm-12 text-center reveal-top">
            <div><a href="{{url('smartreward')}}" class="theme-btn mt-3 mb-5">Read more</a></div>
        </div>

    </div>
</section>

<!-- mining reward calculator end here -->

{{--Road map Start--}}
<section id="roadmap" class="ico-roadmap">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 reveal-top">
                <div class="title">
                    <h2 class="text-center">BaltiCrypto <span>Roadmap</span></h2>
                </div>
            </div>
            <div class="col-sm-12 text-center mt-5 reveal-right">
               <img src="assets/images/Roadmap.png" / class="img-fluid">
            </div>
        </div>
    </div>
</section>
{{--Road map Ends--}}

{{--Team Start --}}
<section class="bg-black team-wrapper jarallax" id="home-team"  data-jarallax="{&quot;speed&quot;: 0.2}" style="background-image: url(assets/images/team.jpeg);" >
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1 text-center reveal-top">
                <h2 class="color-font ">Team</h2>
                <h5><i>”Coming together is a beginning; keeping together is a process;
                        <br>working together is a success.”</i></h5>
                <h5 class="text-right"><i>Henry Ford</i></h5>
                <h2 class="pb-5 text-white responsive-mt-70">Founders</h2>
            </div>
            </div>
        <div class="row team-member">
            @foreach($founders as $key)
            <div class="col-md-2 col-sm-6 {{$loop->iteration==1?'offset-md-1':''}}   {{is_float($loop->iteration/2)? ' reveal-bottom':'  reveal-top' }}">
                <div class="our-team">
                    <div class="pic">
                        <img src="{{asset('assets/images/user/team_member').'/'.$key->image}}" alt="">
                        <div class="social_media_team">
                            <ul class="team_social">
                                <li><a href="{{'mailto:'.$key->email}}"><i class="fa fa-envelope"></i></a></li>
                                <li><a href="{{$key->fblink}}"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="{{$key->telegram}}"><i class="fa fa-send"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="team-prof">
                        <h3 class="post-title">{{$key->name}}</h3>
                        <h3 class="designation">{!! $key->designation !!}</h3>
                    </div>
                </div>
            </div>
            @endforeach

            <div class="space30"></div>


        <!-- sub team -->

                @foreach($team as $key )
                    @if (in_array($loop->iteration, [1,6,11,16]))

                        <div class="row team-member-bottom margin-52">
                            <div class="col-md-1 "></div>
                            @endif
                            @if(in_array($loop->iteration, [16]))
                                <div class="col-md-2 col-sm-6  @if(in_array($loop->iteration, [6,7,8,9,10,16,17,18,19,20]))reveal-left  @else reveal-right  @endif">
                                    <div class="our-team">
                                        <div class="pic">{{--                                            <img src="{{asset('assets/images/user/team_member').'/'.$key->image}}" alt="">--}}

                                        </div>
                                        <div class="team-prof">
                                        </div>
                                    </div>
                                </div>

                            @endif

                            <div class="col-md-2 col-sm-6  @if(in_array($loop->iteration, [6,7,8,9,10,16,17,18,19,20]))reveal-left  @else reveal-right  @endif">
                                <div class="our-team">
                                    <div class="pic">
                                        <img src="{{asset('assets/images/user/team_member').'/'.$key->image}}" alt="">
                                        <div class="social_media_team">
                                            <ul class="team_social">
                                                <li><a href="{{'mailto:'.$key->email}}"><i class="fa fa-envelope"></i></a></li>
                                                <li><a href="{{$key->fblink}}"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="{{$key->telegram}}"><i class="fa fa-send"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="team-prof">
                                        <h3 class="post-title">{{$key->name}}</h3>
                                        <h3 class="designation">{!! $key->designation !!}</h3>
                                    </div>
                                </div>
                            </div>

                            @if (in_array($loop->iteration, [5,10,15,20]))
                                    <div class="col-md-1"></div>

                                    </div>
                            @endif

                @endforeach



        <div class="col-sm-12 text-center reveal-bottom">
            <div><a href="{{url('team')}}" class="theme-btn mt-5 mb-5 text-white">GET TO KNOW US</a></div>
        </div>

        <!-- end sub team -->
        <!--<div class="row">
            <div class="col-sm-12 text-center">
                <ul class="team-group">
                    <li>
                        <div class="team-group-box">
                            <img src="assets/images/placeholder.jpg"/>
                            <div class="team-hover-block">
                                <div>
                                <h3>Indi Newall</h3>
                                <p>Public/Media Relations Copywriter </p>
                                </div>
                            </div>
                        </div>
                        <div class="team-group-box">
                            <img src="assets/images/placeholder.jpg"/>
                            <div class="team-hover-block">
                                <div>
                                    <h3>Indi Newall</h3>
                                    <p>Public/Media Relations Copywriter </p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="team-group-box">
                            <img src="assets/images/placeholder.jpg"/>
                            <div class="team-hover-block">
                                <div>
                                    <h3>Indi Newall</h3>
                                    <p>Public/Media Relations Copywriter </p>
                                </div>
                            </div>
                        </div>
                        <div class="team-group-box">
                            <img src="assets/images/placeholder.jpg"/>
                            <div class="team-hover-block">
                                <div>
                                    <h3>Indi Newall</h3>
                                    <p>Public/Media Relations Copywriter </p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="team-group-box">
                            <img src="assets/images/placeholder.jpg"/>
                            <div class="team-hover-block">
                                <div>
                                    <h3>Indi Newall</h3>
                                    <p>Public/Media Relations Copywriter </p>
                                </div>
                            </div>
                        </div>
                        <div class="team-group-box">
                            <img src="assets/images/placeholder.jpg"/>
                            <div class="team-hover-block">
                                <div>
                                    <h3>Indi Newall</h3>
                                    <p>Public/Media Relations Copywriter </p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="team-group-box">
                            <img src="assets/images/placeholder.jpg"/>
                            <div class="team-hover-block">
                                <div>
                                    <h3>Indi Newall</h3>
                                    <p>Public/Media Relations Copywriter </p>
                                </div>
                            </div>
                        </div>
                        <div class="team-group-box">
                            <img src="assets/images/placeholder.jpg"/>
                            <div class="team-hover-block">
                                <div>
                                    <h3>Indi Newall</h3>
                                    <p>Public/Media Relations Copywriter </p>
                                </div>
                            </div>
                        </div>
                        <div class="team-group-box">
                            <img src="assets/images/placeholder.jpg"/>
                            <div class="team-hover-block">
                                <div>
                                    <h3>Indi Newall</h3>
                                    <p>Public/Media Relations Copywriter </p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="team-group-box">
                            <img src="assets/images/placeholder.jpg"/>
                            <div class="team-hover-block">
                                <div>
                                    <h3>Indi Newall</h3>
                                    <p>Public/Media Relations Copywriter </p>
                                </div>
                            </div>
                        </div>
                        <div class="team-group-box">
                            <img src="assets/images/placeholder.jpg"/>
                            <div class="team-hover-block">
                                <div>
                                    <h3>Indi Newall</h3>
                                    <p>Public/Media Relations Copywriter </p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="team-group-box">
                            <img src="assets/images/placeholder.jpg"/>
                            <div class="team-hover-block">
                                <div>
                                    <h3>Indi Newall</h3>
                                    <p>Public/Media Relations Copywriter </p>
                                </div>
                            </div>
                        </div>
                        <div class="team-group-box">
                            <img src="assets/images/placeholder.jpg"/>
                            <div class="team-hover-block">
                                <div>
                                    <h3>Indi Newall</h3>
                                    <p>Public/Media Relations Copywriter </p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="team-group-box">
                            <img src="assets/images/placeholder.jpg"/>
                            <div class="team-hover-block">
                                <div>
                                    <h3>Indi Newall</h3>
                                    <p>Public/Media Relations Copywriter </p>
                                </div>
                            </div>
                        </div>
                        <div class="team-group-box">
                            <img src="assets/images/placeholder.jpg"/>
                            <div class="team-hover-block">
                                <div>
                                    <h3>Indi Newall</h3>
                                    <p>Public/Media Relations Copywriter </p>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="text-center"><a href="#" class="theme-btn mb-5 mt-4 text-uppercase text-white">Get to know us</a></div>
            </div>
        </div>-->
    </div>
</section>
{{--Team Ends--}}


{{--Partner Section start--}}
<section class="partner">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 reveal-top">
                <div class="title">
                    <h2 class="text-center">Exchanges under negotiations</h2>
                </div>
            </div>
            <div class="col-sm-12 col-md-10 offset-md-1 reveal-right">
            <!-- <div id="partner-slider" class="owl-carousel owl-theme partner-slider mt-5">
                @foreach($negotiation as $key)
                    <a href="{{$key->link}}" target="_blank" > <div class="item" ><img src="{{URl::asset('assets/images/user/negotiation').'/'.$key->image}}" /></div></a>
                @endforeach
            </div>-->

             <div class="intro-text"><p>Currently undergoing negotiations with various exchanges</p></div>

        </div>
            <div class="col-sm-12 mt-5 mb-5 reveal-left">
                <div class="title">
                    <h2 class="text-center">Partners</h2>
                </div>
            </div>
            <div class="col-sm-8 offset-sm-2 mt-5 text-center pt-100 reveal-left">
                <ul class="theme-group partner-group">

                   @foreach($partner as $key)
                        <li>
                            <a href="{{$key->link}}" target="_blank"><img src="{{URl::asset('assets/images/user/partner').'/'.$key->image}}" /></a>
                        </li>

                   @endforeach

                </ul>
            </div>


            <!-- <div class="col-sm-12 mt-5 text-center pt-100">
                <ul class="d-inline-flex">

                    <li class="pr-2">
                        <a href="#" target="_blank"><img src="assets/images/partner/coin-payment.png"/></a>
                    </li>
                    <li class="pl-2">
                        <a href="#" target="_blank"><img src="assets/images/partner/icon-stream.png"/></a>
                    </li>
                </ul>
            </div> -->


        </div>
    </div>
</section>
{{--Partner Section Ends--}}

<!-- video play modal box -->
<div class="modal fade" id="about-video-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <iframe src="https://player.vimeo.com/video/260015606" width="100%" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
        </div>
    </div>
  </div>

</div>

@endsection @section('bottom_script')
{{--<script src="{{asset('assets/js/jquery-countdown.js')}}" ></script>--}}
<script>
    /* _____________________________________

     Count down
     _____________________________________ */

    var countDownDate = new Date("{{$date}}").getTime();
    // Update the count down every 1 second
    var countdownfunction = setInterval(function() {

        // Get todays date and time
        var now = new Date().getTime();

        // Find the distance between now an the count down date
       var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Output the result in an element with id="timer"
        document.getElementById("ico-timer").innerHTML = "<span>" + days + " : <span class='timer-cal'>Days</span></span> " + "<span>" + hours + " : <span class='timer-cal'>Hrs</span></span> "
                + "<span>" + minutes + " : <span class='timer-cal'>Min</span></span> " + "<span>" + seconds + "<span class='timer-cal'>Sec</span></span> ";


        if (distance < 0) {
            clearInterval(countdownfunction);
            document.getElementById("ico-timer").innerHTML = "00:00:00:00";
//            document.getElementById("ico-timer-footer").innerHTML = "00:00:00:00";
        }
    }, 1000);

</script>
@endsection