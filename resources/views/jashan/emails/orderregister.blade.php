<body style="background-color:#e2e1e0;font-family: Open Sans, sans-serif;font-size:100%;font-weight:400;line-height:1.4;color:#000; padding:3px 0px 2px 0px">
  <table style="max-width:100%;margin:0px auto 10px;background-color:#fff;padding:0px 0px 50px 0px;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;-webkit-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);-moz-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24); border-top: solid 0px black; ">
      
<!--      <body style="background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;">-->
<!--<div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: 'Lato', Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;"> Registration on RuralPure. </div>-->
<!--<table border="0" cellpadding="0" cellspacing="0" width="100%">-->
      
        <!-- LOGO -->
   
    <tr>
        <td bgcolor="black" >
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                <tr>
                    <td bgcolor="" align="center" valign="top" style="padding: 0px 20px 20px 20px; color: #111111; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">
                        <h1 style="font-size: 48px; font-weight: 400; margin: 2;"></h1> <img src="{{asset('logo/Logo.png')}}" width="100%" height="100%" style="display: block; border: 0px;" />
                    </td>
                </tr>
            </table>
        </td>
    </tr>
      
      
    <!--<thead>-->
    <!--  <tr>-->
    <!--    <th style="text-align:left;"><img style="max-width: 150px;" src="{{ asset('logo/Logo.png') }}" alt="Rural Pure"></th>-->
    <!--    <th style="text-align:right;font-weight:400;">{{ date("Y/m/d") }}</th>-->
    <!--  </tr>-->
    <!--</thead>-->
    <tbody>
      <tr>
        <td style="height:35px;"></td>
      </tr>
      <tr>
        <td colspan="2" style="border: solid 1px #ddd; padding:10px 20px;">
          <p style="font-size:14px;margin:0 0 6px 0;"><span style="font-weight:bold;display:inline-block;min-width:150px">Order status</span><b style="color:green;font-weight:normal;margin:0">Success</b></p>
          <p style="font-size:14px;margin:0 0 6px 0;"><span style="font-weight:bold;display:inline-block;min-width:146px">Biilling Person Name </span> {{ $order['billing_name'] }} </p>
          <p style="font-size:14px;margin:0 0 6px 0;"><span style="font-weight:bold;display:inline-block;min-width:146px">Order ID</span> {{ $order['order_id'] }} </p>
          <p style="font-size:14px;margin:0 0 0 0;"><span style="font-weight:bold;display:inline-block;min-width:146px">Payment Id</span> {{ $order['payment_id'] }}</p>
          <p style="font-size:14px;margin:0 0 0 0;"><span style="font-weight:bold;display:inline-block;min-width:146px">Paid Amount</span> Rs. {{ $order['total'] }}</p>
       
        </td>
      </tr>
      <tr>
        <td style="height:35px;"></td>
      </tr>                  
    </tbody>
    <tfooter>
      <tr>
        <td colspan="2" style="font-size:14px;padding:50px 15px 0 15px;">
          <strong style="display:block;margin:0 0 10px 0;">Regards</strong> Rural Pure <br> Shop no 8,Opp kiran Nursing Home, Ajmer Road, India<br><br>
          <b>Phone:</b> 9582066729 <br>
          <b>Email:</b> Care@ruralpure.co.in
        </td>
      </tr>
    </tfooter>
  </table>
</body>

</html>

