<?php
session_start();
?><head>
<link href="css/pagination.css" rel="stylesheet" type="text/css">
</head>
<?php
require "navbar.php";
?>
<?php
if(!isset($_GET['tab'])){
	$tab = 1;
}else{
	$tab = $_GET['tab'];
}
include_once('../../controllers/singer.controller.php');
$c = new SingerController();
?>

<style>
	.hide{
		display: none;
	}
	.onhover:hover + .hide{
		display: block;
		
	}
</style>
<body id="index-body">
<br>
<br>
<div id="gallery"><br>
		  <div class="container">
			<h3 class="text-center"><br>Artist Gallery<br>
			  <hr><br>
			</h3>
			<div class="d-flex flex-row flex-wrap justify-content-center">
				<?php
							$singerList = $c->invoke();
							$listlen = count($singerList);
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
							$singerPagList = $c->getPaginationSinger($page, $result_per_page);
								for($i=0;$i<count($singerPagList);$i++){?>
									<div class="d-flex flex-column">
										  <a href="single-singer-page.php?singerID=<?php echo $singerPagList[$i]->getSingerID(); ?>" class="onhover">
										<img src="images/<?php echo $singerPagList[$i]->getSingerImage(); ?>" class="img-fluid">
											  <h5><?php echo $singerPagList[$i]->getSingerName(); ?></h5>
										  </a>
										  <div class="hide"><?php echo $singerPagList[$i]->getBackground(); ?></div>
									  </div>
							<?php	}?>
						<br><br>
			</div>
			<br>
			  <div class="pagination">
		<?php //display pagination list bar << 1 2 3 >>
	   $pagLink = "";
	   if($page>=2){   
            echo "<a href='singer-page.php?page=".($page-1)."'>  Prev </a>";   
        }       
                   
        for ($i=1; $i<=$number_of_page; $i++) {   
          if ($i == $page) {   
              $pagLink .= "<a class = 'active' href='singer-page.php?page="  
                                                .$i."'>".$i." </a>";   
          }               
          else  {   
              $pagLink .= "<a href='singer-page.php?page=".$i."'>   
                                                ".$i." </a>";     
          }   
        };     
        echo $pagLink;   
  
        if($page<$number_of_page){   
            echo "<a href='singer-page.php?page=".($page+1)."'>  Next </a>";   
        }   
	   ?>
	   </div>
		  </div>
</div>
  <br>
  <br>
</body>
<?php
require "footer.php";
?>