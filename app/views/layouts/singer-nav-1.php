<head>
<link href="css/pagination.css" rel="stylesheet" type="text/css">
</head>
<?php
include_once('../../controllers/singer.controller.php');
$c = new SingerController();
?>
<div class="container">
						<h3 class="text-center"><br><?php echo $c->getASinger($_GET['singerID'])->getSingerName() ?><br>
						  <hr><br>
						</h3>
						<div class="d-flex flex-row flex-wrap justify-content-left">
						  <?php
							$songlist = $c->getSingerSong($_GET['singerID']);
							$listlen = count($songlist);
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
							$SongPagList = $c->getPaginationSong($page, $result_per_page, $_GET['singerID']);
//							echo count($MVPagList);
								for($i=0;$i<count($SongPagList);$i++){
									echo $SongPagList[$i]->getSongTitle().'<br>';
							}?>
						<br><br>
					  </div>
	<br>
	<div class="pagination">
		<?php //display pagination list bar << 1 2 3 >>
	   $pagLink = "";
	   if($page>=2){   
            echo "<a href='single-singer-page.php?page=".($page-1)."&singerID=".$_GET['singerID']."&tab=2'>  Prev </a>";   
        }       
                   
        for ($i=1; $i<=$number_of_page; $i++) {   
          if ($i == $page) {   
              $pagLink .= "<a class = 'active' href='single-singer-page.php?page="  
                                                .$i."&singerID=".$_GET['singerID']."&tab=2'>".$i." </a>";   
          }               
          else  {   
              $pagLink .= "<a href='single-singer-page.php?page=".$i."&singerID=".$_GET['singerID']."&tab=2'>   
                                                ".$i." </a>";     
          }   
        };     
        echo $pagLink;   
  
        if($page<$number_of_page){   
            echo "<a href='single-singer-page.php?page=".($page+1)."&singerID=".$_GET['singerID']."&tab=2'>  Next </a>";   
        }   
	   ?>
	   </div>
	   </div>