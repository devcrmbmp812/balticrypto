<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <title>BCT Coin</title>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
      <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700" rel="stylesheet">
<style type="text/css">
  .email {
  display: inline-block;
  text-align: center;
  margin: 0 auto;
  background-color: #0a2c3c;
  border-top: 3px solid #27A9E0;
  border-bottom: 3px solid #27A9E0;
  width: 600px;
  margin: 0 auto;
  display: block;
}

.logo {
  margin: 0 auto;
  text-align: center;
  display: block;
  margin-top: 30px;
  margin-bottom: 30px;
}

.white-container {
  background: #ffffff;
  width: 560px;
  text-align: center;
  margin: 0 auto;
  padding: 30px 0;
  margin-top: -10px;

}

h3 {
  font-weight: light;
}


.button {
    padding: 6px 26px;
    background-color: #27A9E0;
    border-radius: 30px;
    text-decoration: none;
    color: #f58634;
    text-transform: uppercase;
    font-size: 35px;
    letter-spacing: 1px;
}

.link {
  margin-top: 30px;
  text-decoration: none;
  color: #303141;
  display: inline-block;
}

.links {
  margin: 0 auto;
  text-align: center;
  display: block;
}

.sm {
  max-width: 25px;
  display: inline-block;
  margin: 30px 5px;
}

h3 {
  width: 400px;
  margin: 0 auto;
  margin-bottom: 50px;
}
.enquiry{
  margin-top: 30px;
  color: white;
}
@media screen and (max-width: 768px){
.email {
  width: 100%;
}
.white-container{
  width: 100%;
}
h3{
  width: 100%;
}

}
.safe{
  margin-bottom: 10px;
}
.security-description{
  background: #f58634;
    color: white;
    padding: 25px;

}
</style>
</head>
<body>
<div style="font-family:Tondo; margin: 20px;">
<div class="email">
<img class="logo" src="{{url('assets/images/logo.png')}}" width="200">
<!-- <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/615414/Image.jpg"> -->
  <div class="white-container">
    <h2>YOUR BCT CREDENTIALS</h2>
    <div class="security-description">
      <h3 class="safe">Keep it safe  </h3>
<p>As with most other cryptocurrency wallets, we advise you to copy the credentials, record it physically or save it digitally in a secure device. We also recommend that you delete this email afterwards, to prevent it from falling into the wrong hands. </p>
<p><h2>BCT Management team added you successfully as a board memebr .</h2></p>

    </div>

    <h2>Here is your credentials</h2>
    <!-- <label class="button"> -->
    Email :- <span style="size: 18px;font-weight: 800;">{{$Board_member_data->email}}</span> <br>
    Password :- <span style="size: 18px;font-weight: 800;">{{$password_board_member}}</span>
    <!-- </label> -->



  </div>
 <!--  <div class="links">
    <a class="link" href="#">About | </a>
    <a class="link" href="">Contact</a>
  </div> -->

  <div class="enquiry">
    For enquiries, please email us at <strong>support@bctcoin.com</strong>
  </div>


  <div class="social-media">
    <a href="#"><img class="sm" src="{{url('assets/images/small-icon/facebook_icon.svg')}}"></a>
    <a href="#"><img class="sm" src="{{url('assets/images/small-icon/twitter_icon.svg')}}"></a>
    <a href="#"><img class="sm" src="{{url('assets/images/small-icon/linkedin_icon.svg')}}"></a>
  </div>

 </div>
</body>
</html>
