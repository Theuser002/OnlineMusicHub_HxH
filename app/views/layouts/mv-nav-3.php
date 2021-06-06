<?php
							$mvlist = $c->invoke();
							$listlen = count($mvlist);
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
							$MVPagList = $c->getPaginationView($page, $result_per_page);
//							echo count($MVPagList);
								for($i=0;$i<count($MVPagList);$i++){
									echo "<div class=\"d-flex flex-column\">";
									echo "<a href=\"single-mv-page.php?MVID=".$MVPagList[$i]->getMVID()."\" onclick=\"updateMVView(".$MVPagList[$i]->getMVID().")\"><img src=\"images/".$MVPagList[$i]->getMVImage()."\" class=\"img-fluid\"></a>
									<div class=\"container\">
									<h5 class=\"mv-title\">".$MVPagList[$i]->getMVTitle()." #".($i)."</h5><h6 class=\"mv-view\">View: ".$MVPagList[$i]->getMVView()."</h6>
									</div>";
							  echo "</div>";
							}?>