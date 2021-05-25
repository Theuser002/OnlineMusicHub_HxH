<head>
<link href="css/pagination.css" rel="stylesheet" type="text/css">
</head>
<div class="container">
						<h3 class="text-center"><br>A-Z List<br>
						  <hr><br>
						</h3>
						<div class="d-flex flex-row flex-wrap justify-content-left">
						  <?php
							$azlist = $c->getAZList();
							$listlen = count($azlist);
							//define total number of results you want per page
							$result_per_page = 8;

							//determine the total number of pages available  
							$number_of_page = ceil($listlen/$result_per_page);

							//determine which page number visitor is currently on  
							if(!isset($_GET['page'])){
								$page = 1;
							}else{
								$page = $_GET['page'];
							}
							$MVPagList = $c->getPaginationAZ($page, $result_per_page);
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
	<div class="pagination">
		<?php //display pagination list bar << 1 2 3 >>
	   $pagLink = "";
	   if($page>=2){   
            echo "<a href='mv-page.php?page=".($page-1)."'>  Prev </a>";   
        }       
                   
        for ($i=1; $i<=$number_of_page; $i++) {   
          if ($i == $page) {   
              $pagLink .= "<a class = 'active' href='mv-page.php?page="  
                                                .$i."'>".$i." </a>";   
          }               
          else  {   
              $pagLink .= "<a href='mv-page.php?page=".$i."'>   
                                                ".$i." </a>";     
          }   
        };     
        echo $pagLink;   
  
        if($page<$number_of_page){   
            echo "<a href='mv-page.php?page=".($page+1)."'>  Next </a>";   
        }   
	   ?>
	   </div>
	   </div>