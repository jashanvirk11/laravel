

        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box " id="showlink1" style="background-color:#6099b5;color:white">
              <div class="inner">
                <h3>{{$order_count}}</h3>

                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">  
            <!-- small box -->
            <div class="small-box " id="showlink2" style="background-color:#476839;color:white">
              <div class="inner">
                <h3>{{$product_count}}</h3>

                <p> Total Product</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box " id="showlink3" style="background-color:#d9bb1e;color:white">
              <div class="inner">
                <h3>{{$user_count}}</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box " id="showlink4" style="background-color:#a90d0d;color:white">
              <div class="inner">
                <h3>{{$payment_count}}</h3>

                <p>Payment </p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#showlink1").hover(function(){
    $(this).css("background-color", "#90c6e1");
    }, function(){
    $(this).css("background-color", "#6099b5");   
  });
});

</script>       
<script>
$(document).ready(function(){
  $("#showlink2").hover(function(){
    $(this).css("background-color", "#588943");
    }, function(){
    $(this).css("background-color", "#476839");
  });
});

</script>   
<script>
$(document).ready(function(){
  $("#showlink3").hover(function(){
    $(this).css("background-color", "#f5d534");
    }, function(){
    $(this).css("background-color", "#d9bb1e");
  });
});

</script> 
<script>
$(document).ready(function(){
  $("#showlink4").hover(function(){
    $(this).css("background-color", "#c13636");
    }, function(){
    $(this).css("background-color", "#a90d0d");
  });
});

</script>        
 
 