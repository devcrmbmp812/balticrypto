    <!-- dashboard start -->
   <div class="dashboard-header">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-4">
               <a class="navbar-brand-2" href="{{ url('/')}}"><img src="{{ URL::asset('assets/images/BCT.png') }}" /></a>
               <div class="dashboard-sidebar">
                  <a href="#" class="toggle-nav">|||</a>
               </div>
            </div>
            <div class="col-md-8 dashboard-curruncy">
               <ul class="rating-info">
                <li><img src="{{ URL::asset('assets/images/slider/btc.png') }}" alt="BTC" >1 BTC = $ <span class="btcusd">{{ $header_data['BTC'] }}</span></li>
                  <li><img src="{{ URL::asset('assets/images/slider/eth.png') }}" alt="ETH">1 ETH = $ <span class="ethusd">{{ $header_data['ETH'] }}</span></li>
                <li><img src="{{ URL::asset('assets/images/slider/btc.png') }}" alt="BCH" >1 BCH = $ <span class="btcusd">{{ $header_data['BCH'] }}</span></li>
                  <li><img src="{{ URL::asset('assets/images/slider/BCT.png') }}"/>1 BCT = $ {{ $header_data['rate'] }}</li>
               </ul>
                <a href="{{ url('logout') }}" class="btn btn-signout btn-outline my-2 my-sm-0 ml-3">Signout</a>
            </div>
         </div>
      </div>
   </div>

