@extends('layouts.masterHome')
@section('content')
@include('layouts.bottom_fix')

<style>
    footer {
        padding: 30px 0;
        padding-bottom: 60px;
        background: linear-gradient(to bottom, #000000 0%, #1b1b1b 100%);
        -webkit-clip-path: polygon(70% 32%, 100% 0, 100% 100%, 0 100%, 0 0);
        clip-path: polygon(80% 21%, 100% 0%, 100% 100%, 0% 100%, 0 0);
        margin-top: -61px;
    }
</style>
<div class="dashboard-body">
    <div class="crypto-university">
        <div class="debit-ico-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <div class="link-img mt-3">
                            <img src="assets/images/debiticoideas-link.png" class="img-fluid">
                        </div>
                        <div class="title mt-5 mb-4">
                            <h2 class="text-center">BaltiCrypto <span class="color-orange">Debit Card</span></h2>
                        </div>
                        <p>It is our goal to issue BaltiCrypto’s debit card which enables token holders to send ones cryptomining rewards to online wallets which are connected to BaltiCrypto’s debit card. Token holders can use BaltiCrypto tokens anywhere in the world, withdraw money from traditional ATMs and to purchase goods from online and regular shops with the BaltiCrypto debit card.</p>
                        <p class="color-darkblue">NOTE: This project is still under development, and BaltiCrypto makes no commitment about when or if it will be delivered.  Whilst we see the benefit of this to contributors, it is not a high priority in terms of building reward streams, and it may be that SMARTphone technology advances to the point where tap and pay is possible, before we are able to issue it.  In this case, we will of course be first adopters of the SMARTphone tech.</p>
                        <div class="text-center">
                        <img src="assets/images/debit-card.png" class="img-fluid">
                        </div>
                        </div>
                </div>
            </div>
        </div>
        <div class="debit-ico-second">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <div class="title mt-5 mb-4">
                            <h2 class="text-center">ICO Funding</h2>
                        </div>
                        <p>Taking this a step further, we go beyond merely providing trading and buy/sell advice, and actually seek out promising ICO’s, whose philosophies are in line with those of the BaltiCrypto Ecoverse.  Using our combined resources, and leveraging our significant mining returns, we can obtain tokens and coins with huge economies of scale, lowering purchase price, and maximising future rewards - all of which feed back into the BaltiCrypto reward pool.</p>
                        <p>The Media Centre will provide regular news and updates of upcoming or ongoing ICO’s, including predictions and commentary from our resident experts, to help contributors find the best value for their investment.  This means even if contributors choose to invest from their own private wallet, they have the best opportunity to maximise their returns.</p>
                        <p>As well as assisting ICO’s to connect with our extensive community, and achieve viable investment levels, we will provide advice and ongoing assistance to new ICO’s whose goals we support.  For this we will receive payment through ICO or ETH tokens, the rewards from which, again, will flow back to all contributors via the Reward Pool.  BaltiCrypto will also help funding different ICOs; Low risk - High Reward vetted ICO’s will be able to apply for funding rounds. </p>
                    </div>
                </div>

            </div>
        </div>
        <div class="debit-ico-third">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <div class="title mt-5 mb-4">
                            <h2 class="text-center">Crypto Ideas and Trade Hub</h2>
                        </div>
                        <p>An industry-first use case for blockchain: the industry's leading hub for trade ideas.</p>
                        <p>Just as blockchain provides solutions for wealth transfer, through consistent tracking of the blockchain ledger, it can also provide a new, self-governed system of patent protection.  As any user can track the origin of data of any kind into the ledger, a person can quite readily prove that they were the progenitor of a given idea, and receive payment in kind.</p>
                        <p>BaltiCrypto’s objective is to create an open platform for the efficient and secure exchange of trade ideas as well as goods and services. We seek to accomplish this through strategic partnerships to develop standards, interfaces, and industry leading best practices.</p>
                        <div class="text-center"><img src="assets/images/ideasandtrade.png" class="img-fluid"></div>
                    </div>
                </div>

            </div>
        </div>

    </div>


    @endsection

