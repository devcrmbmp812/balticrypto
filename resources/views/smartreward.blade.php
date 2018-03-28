@extends('layouts.masterHome')
@section('content')
    @include('layouts.bottom_fix')
    <div class="dashboard-body">
        <div class="smartreward">
            <div class="smartreward-top">
                <div  class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="title">
                                <h2 class="text-center">SMART Rewards</h2>
                            </div>
                        </div>
                        <div class="col-sm-11 offset-sm-1 mt-4">
                            <p><span class="yellow-label color-orange">SMART Reward Pool</span> - <span class="color-darkblue">60%</span> of the rewards received through <span class="color-darkblue">mining operations</span> will be channelled to the SMART Reward Pool.</p>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-2 col-md-1 offset-md-2"><img src="assets/images/list-icon.png" class="img-fluid"></div>
                        <div class="col-10 col-md-8"><p class="text-justify">Mining rewards from the <span class="color-darkblue">SMART Reward Pool</span> will be distributed on a random day within first two weeks of every month after the rewards have reached the purposeful transactional value as well as taking into account the lead time for farm assembly. Token holders receive rewards based on tokens held, as well as whether they are held inside or outside the BaltiCrypto platform (ECOVERSE).  Token holders who keep their tokens on our platform will receive 100% distribution of their reward entitlement based on held tokens.  For instance, if based on 1000 tokens held we distribute $1000, those holding tokens inside the platform will receive 100%, whereas those who take their tokens to external exchanges will only receive 80% of the rewards distributed, in this case $800. The 20% which the external holders do not receive will be sent straight to BaltiCrypto’s unique <span class="color-darkblue">SMART Reward Center.</span></p></div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-sm-11 offset-sm-1">
                            <p class="text-justify"><span class="yellow-label color-orange">SMART Reward Center</span> -  Rewards received through <span class="color-darkblue">all other</span> BaltiCrypto ECOVERSE projects from which contributors are entitled to rewards. This will amount a 20% of net rewards from each separate project.  Additionally the SMART Reward Center will receive the 20% of mining rewards not distributed to those holding their tokens externally. SMART Rewards will be distributed on a random day within last two weeks of every month, once BaltiCrypto begins generating rewards from projects outside crypto mining</p>
                            <p class="mt-2">The funds to the Reward Center will be collected through all BaltiCrypto’s Ecoverse Projects including: </p>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-4 offset-md-2">
                            <div class="reward-project-list">
                                <ul class="dark-hexaicon">
                                    <li>Education (Crypto University)</li>
                                    <li>BaltiCrypto Exchange (fees etc.)</li>
                                    <li>Renewable Energy Project</li>
                                    <li>Trading Academy</li>
                                    <li>ICO Funding</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="reward-project-list">
                                <ul class="light-hexaicon">
                                    <li>Sophisticated Crypto Investor Instruments</li>
                                    <li>Crypto Ideas Trade Hub</li>
                                    <li>Blockchain Technology Research Incubator Endowments</li>
                                    <li>Blockchain New Industry Integration</li>
                                    <li>20% of rewards which are not distributed between the external token holders</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-sm-11 offset-sm-1">
                            <p class="mt-2"><b class="color-darkblue">Please note rewards from SMART Reward Center only apply to token holders who are keeping their tokens internally on BaltiCrypto’s platform and will be paid out in ETH.</p>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-sm-11 offset-sm-1">
                            <p class="text-justify"><span class="yellow-label color-orange">Reinvestment </span> -  up to <span class="color-darkblue">40%</span> of the mining rewards will be reinvested for upgrading and expansion of the mining farm, which creates compounded growth as mining capacity, and therefore potential earnings, grows month on month.</p>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-sm-11 offset-sm-1">
                            <p class="text-justify">Up to <span class="color-darkblue">30%</span> of the mining rewards will be used for developing and improving BaltiCrypto ecoverse projects, with a constant view towards diversification of interests, as well as value adding through additions such as the BaltiCrypto Exchange and Debit Card.</p>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-sm-11 offset-sm-1">
                            <p class="mt-2"><b class="color-darkblue">Please note that the proportion of rewards used for reinvestment depends on the year.  As rewards grow, the percentage required to expand and maintain the mining farm will of course diminish.</p>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-2 col-md-1 offset-md-2"><img src="assets/images/list-icon.png" class="img-fluid"></div>
                        <div class="col-10 col-md-8"><p class="text-justify">NOTE: In the future if we are not capable of purchasing mining equipment in large quantities or funding other projects due to no funding requirement, the left over balance will be rewarded to the token holders. BaltiCrypto makes no guarantees about the amount of any surplus from this component which will be issued as rewards. Decisions will be based on the best interests of the enterprise at that time, as opportunities for development of additional projects arise.  For example, if markets are depressed at the end of a given month, BaltiCrypto will hold over these funds until BTC and/or ETH values rise, in order to avoid realising a loss.</p></div>
                    </div>
                </div>
            </div>
            <div class="smartreward-mid">
                <div class="container">
                    <div class="title-sub">
                        <h3>100% Mining Rewards Distribution:</h3>
                    </div>
                    <div class="row">
                        <div class="col-sm-10 offset-sm-2">
                            <p>BCT Token holders will benefit of 100% of BaltiCrypto ECOVERSE rewards which will be divided as:</p>
                            <table class="table table-responsive">
                                <tbody>
                                <tr>
                                    <th scope="row" >First year</th>
                                    <td width="25%"><span>60%</span> will go to the<span>Reward-Pool</span> </td>
                                    <td width="25%"><span>40%</span> will be reinvested into the BaltiCrypto SMART Mining. </td>
                                    <td width="25%"></td>
                                </tr>

                                <tr>
                                    <th scope="row" width="25%">Second year</th>
                                    <td ><span>60%</span> will go to the<span>Reward-Pool</span> </td>
                                    <td><span>40%</span> will be reinvested into the BaltiCrypto SMART Mining. </td>
                                    <td><span>20%</span> will be used for developing new BaltiCrypto ECOVERSE Projects.</td>
                                </tr>
                                <tr>
                                    <th scope="row" width="25%">Third year</th>
                                    <td><span>60%</span> will go to the<span>Reward-Pool</span> </td>
                                    <td><span>15%</span> will be reinvested into the BaltiCrypto SMART Mining <span>+5%</span> Mining reserve. </td>
                                    <td><span>20%</span> will be used for developing new BaltiCrypto ECOVERSE Projects.</td>
                                </tr>
                                <tr>
                                    <th scope="row" width="25%">Fourth year</th>
                                    <td scope="col"><span>60%</span> will go to the<span>Reward-Pool</span> </td>
                                    <td><span>15%</span> will be reinvested into the BaltiCrypto SMART Mining <span>+5%</span> Mining reserve. </td>
                                    <td><span>20%</span> will be used for developing new BaltiCrypto ECOVERSE Projects.</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-10 offset-sm-2">
                            <p>First year starts when the mining facilities are 100% operational based on our initial 100% foundation baseline capacity.</p>
                            <p>The mining operations are effective immediately as we start the development of the mining farms and setting up the equipment. All mining rewards what are mined before the full launch of our operations will be going to the SMART Reward Centre which will be distributed between the internal token holders.</p>
                            <div class="title-sub">
                                <h3>SMART Mining Rewards Payout:</h3>
                                <p>Mining rewards will be paid out in ETH into any ETH wallet to which the user holds the personal private key. Rewards can be moved from the token holder’s account to any third party ETH wallet at any time. <span class="color-darkblue">For BCT tokens listed to public exchanges, our executive team will make every endeavour to cooperate with the exchanges in order to send rewards to BCT token holders, directly into the exchange wallet. This will need to be done on a case by case basis with each exchange, but we have full confidence in our team.</span> The first distribution of rewards will be implemented when the mining operations are officially started.</p>
                                <p>Token holders who keep their tokens on our platform will receive 100% distribution of their reward entitlement based on held tokens, whereas those who take their tokens to external exchanges will only receive 80% of the rewards distributed. Please read the section above <span class="color-darkblue">(BaltiCrypto Mining Reward Distribution Arrangement)</span> for more information on rewards distribution.</p>
                                <p>This distribution applies only to the rewards generated through mining and creating blocks. The tokens themselves will of course have the potential for growth in value, and this can be realised at any time by selling them on the public exchange.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection