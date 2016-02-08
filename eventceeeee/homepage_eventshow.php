  <section id="blog">
    <div class="container">
      <div class="row">
        <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1200ms" data-wow-delay="300ms">
          <h2>Latest Event</h2>
          </div>
      </div>
		<div class="blog-posts">
			
			  <?php include('db.php');
				$sql="SELECT id,eventname,start_date,location,image FROM offline_ticket ORDER BY id DESC LIMIT 9";
				$result=mysqli_query($conn,$sql);
				if(mysqli_num_rows($result) > 0){
					$count=0;
					while($row=mysqli_fetch_assoc($result)){
						$count++;
						echo('<div class="col-sm-4 mm wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="400ms">
							<div class="post-thumb wow fadeInRightBig">
								<div class="hovereffect">
							  <a href="show_event.php?idNo='.$row['id'] . '"><img class="img-responsive" src="');echo($row['image'].'"alt="" height="250" width="100%"></a> 
							  <div class="post-icon">
								<a href="">Free</a>
							  </div></div>
							</div>
							<div class="single_event entry-header wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="400ms"">
								<h3><a href="show_event.php?idNo='.$row['id'] . '">');echo(substr($row['eventname'],0,50).'</a></h3>
							  <span class="date">');echo($row['start_date'].'</span>
							  <span class="cetagory">at <strong>');echo($row['location'].'</strong></span>
							</div>');
						echo'</div>';
						if($count%3==0 && $count<9){
							echo' <div class="clearfix"><hr></div>';
						}
						
					}
					
					
			}else{
				echo'No Posts Found.';
				}
			?>  
         
      </div>
    </div>
  </section><!--/#blog-->