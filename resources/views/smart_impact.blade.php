@extends('layouts.masterHome')
@section('content')
    @include('layouts.bottom_fix')
    <style>
        footer {
            padding: 30px 0;
            padding-bottom: 60px;
            background: linear-gradient(to bottom, #000000 0%, #1b1b1b 100%);
            -webkit-clip-path: polygon(70% 32%, 100% 0, 100% 100%, 0 100%, 0 0);
            clip-path: polygon(70% 32%, 100% 0%, 100% 100%, 0% 100%, 0 0);
            margin-top: -61px;
        }
    </style>

    <div class="dashboard-body">
        <div class="academy">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <div class="link-img mt-3">
                            <img src="assets/images/smart-impact.png" class="img-fluid">
                        </div>

                        <div class="title mt-5 mb-4">
                            <h2 class="text-center">
                                BaltiCrypto <span class="color-orange"> Smart Impact Foundation</span></h2>
                        </div>

                        <div class="title-sub mt-5">
                            <h3>Creating an ongoing positive impact</h3>
                        </div>
                        <p>It is the vision of the BaltiCrypto team to be able to serve others in need by creating targeted foundations which are self-sustaining, focused and effective.  We believe that we can not only make real difference in the world, but also show a way beyond charity that relies on donations and vague estimates of expenditure.</p>

                        <p>Introducing BaltiCrypto´s decentralized and self-sufficient SMART Impact Foundation, powered by Blockchain technology. Now, through the power of blockchain, all contributors can see accurate, real-time figures of rewards earned and spent by the foundation, and help to choose the areas that BaltiCrypto will be focusing its efforts.</p>

                       <p> The SMART Impact Foundation will be designated 2% of the total of minted tokens, which will receive mining rewards and SMART rewards, just as any other token holder.  This means that as BaltiCrypto, and its mining rewards, grow, so does the funding available to the foundation.</p>

                       <p> With our SMART Impact foundations, all funds are kept and tracked in the Blockchain. In this way, contributors are able to view exactly how much is spent, and where, and monitor the efficacy of the allocated rewards. 100% of the contributions made towards creating a positive impact will be used for the projects chosen by BCT token holders.</p>

                       <p> Of course, our media centre will feature regular video updates from the areas where we are working, and there will be opportunities for token holders to travel to areas of operation and contribute their time, and gain valuable life experience.</p>

                       <p> As cryptocurrencies are largely unavailable, or non-existent, in some areas of the world, we will convert the ETH the foundations receive as rewards into fiat currency as needed.</p>

                       <p> Making a real difference means constantly looking at how we can better use the resources at our disposal.  This is no less important when considering how to best maximise rewards for token holders. For this reason, we plan to establish the BaltiCrypto exchange.</p>



                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection

