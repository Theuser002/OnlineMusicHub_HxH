<head>
<link href="css/pagination.css" rel="stylesheet" type="text/css">
</head>
<div class="container">
						<h3 class="text-center"><br>Latest<br>
						  <hr><br>
						</h3>
						<div class="d-flex flex-row flex-wrap justify-content-left">
						  <?php
							$MVPagList = $c->getPaginationLatest($page, $result_per_page);
//							echo count($MVPagList);
								for($i=0;$i<count($MVPagList)/2;$i++){
									echo "<div class=\"d-flex flex-column\">";
									for($j=0;$j<2;$j++){
								echo "<a href=\"".$MVPagList[$j+2*$i]->getMVLink()."\"><img src=\"images/".$MVPagList[$j+2*$i]->getMVImage()."\" class=\"img-fluid\"></a>
								<div class=\"container\">
								<h5 class=\"mv-title\">".$MVPagList[$j+2*$i]->getMVTitle()." #".($j+2*$i)."</h5><h6 class=\"mv-view\">View: xxx</h6>
								</div>";
									}
							  echo "</div>";
							}?>
						<br><br>
					  </div>
	   </div>