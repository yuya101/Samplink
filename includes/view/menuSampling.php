<?php 
$mQuery = new MainQuery();


$reqCatID = (!isset($_REQUEST['catID']) ? "-" : $_REQUEST['catID']);
$reqBrandID = (!isset($_REQUEST['brandID']) ? "-" : $_REQUEST['brandID']);
$reqSubCatID = (!isset($_REQUEST['subcatID']) ? "-" : $_REQUEST['subcatID']);

//--------------------------- Query Category ------------------------------------------
$sql = "select catID, catName from product_category order by catName";
$numCat = $mQuery->checkNumRows($sql);

if($numCat > 0)
{
	$catCount = 0;
	$result = $mQuery->getResultAll($sql);
	foreach($result as $r)
	{
		$catID[$catCount] = $r['catID'];
		$catName[$catCount] = $r['catName'];
		
		$sql = "select subcatID, subcatName from product_subcategory where catID=".$r['catID']." order by subcatName";
		$numSubCat[$catCount] = $mQuery->checkNumRows($sql);
		
		$catCount++;
	}
}

//--------------------------- Query Category ------------------------------------------

//--------------------------- Query Brand ------------------------------------------
$sql = "select brandID, brandName from product_brand order by brandName";
$numBrand = $mQuery->checkNumRows($sql);

if($numBrand > 0)
{
	$brandCount = 0;
	$result = $mQuery->getResultAll($sql);
	foreach($result as $r)
	{
		$brandID[$brandCount] = $r['brandID'];
		$brandName[$brandCount] = $r['brandName'];
		
		$sql = "select distinct subcatID from product_main where brandID=".$r['brandID'];
		$num = $mQuery->checkNumRows($sql);
		
		if($num > 0)
		{
			$numSubCat2[$brandCount] = $num;
			$i=0;
			$result = $mQuery->getResultAll($sql);
			
			foreach($result as $r)
			{
				$subCatWithBrandID[$brandCount][$i] = $r['subcatID'];
				$i++;
			}			
		}
		else
		{
			$numSubCat2[$brandCount] = 0;
		}
		
		$brandCount++;
	}
}
//--------------------------- Query Brand ------------------------------------------
?>
<div id="menuSamplingDiv">
	<a href="javascript:;" onClick="showMenuDetail('menuDetailByCategory');"><img src="images/showProduct_r4_c1_r2_c2.jpg" width="192" height="41" class="imgMenuSampling"></a>
    <div class="menuDetailSamplingDiv" id="menuDetailByCategory" <?php echo ($reqCatID=="-" ? 'style="display:none;"' : ""); ?>>
    <?php if($numCat > 0){ ?>
    	<hr class="lineDetailSampling">
        <?php for($i=0; $i<$catCount; $i++){ ?>
        	<a href="javascript:;" class="linkSilver" target="_top" onClick="showMenuDetail('menuSubDetailByCategory<?php echo $i; ?>');"><?php echo $catName[$i]; ?></a>
            <?php 
				if($numSubCat[$i] > 0)
				{					
					//$showDiv = ((($reqCatID!="-") and ($reqSubCatID!="-")) ? '' : 'style="display:none;"');
					$showDiv = 'style="display:none;"';
					
					echo '<div id="menuSubDetailByCategory'.$i.'" '.$showDiv.'">';
					$sql = "select subcatID, subcatName from product_subcategory where catID=".$catID[$i]." order by subcatName";
					$result = $mQuery->getResultAll($sql);
					
					foreach($result as $r)
					{
						echo '<a href="index.php?flag=sampling&catID='.$catID[$i].'&subcatID='.$r['subcatID'].'" class="linkBlue" target="_top">:&nbsp;'.$r['subcatName'].'&nbsp;:</a>';
					}
					echo '</div>';
			 	} 
			?>
        <?php } ?>
        <hr class="lineDetailSampling">
    <?php } ?>
    </div>
    
    <a href="javascript:;" onClick="showMenuDetail('menuDetailByBrand');"><img src="images/showProduct_r4_c1_r4_c2.jpg" width="192" height="41" class="imgMenuSampling"></a>
    <div class="menuDetailSamplingDiv" id="menuDetailByBrand"  <?php echo ($reqBrandID=="-" ? 'style="display:none;"' : ""); ?>>
    <?php if($numBrand > 0){ ?>
    	<hr class="lineDetailSampling">
        <?php for($i=0; $i<$brandCount; $i++){ ?>
        	<a href="javascript:;" class="linkSilver" target="_top" onClick="showMenuDetail('menuSubDetailByBrand<?php echo $i; ?>');"><?php echo $brandName[$i]; ?></a>
            <?php 
				if($numSubCat2[$i] > 0)
				{
					for($j=0; $j<$numSubCat2[$i]; $j++)
					{
						//$showDiv = ((($reqBrandID!="-") and ($reqSubCatID!="-")) ? '' : 'style="display:none;"');
						$showDiv = 'style="display:none;"';
						
						echo '<div id="menuSubDetailByBrand'.$i.'" '.$showDiv.'">';
						$sql = "select subcatID, subcatName from product_subcategory where subcatID=".$subCatWithBrandID[$i][$j]." order by subcatName";
						$result = $mQuery->getResultAll($sql);
						
						foreach($result as $r)
						{
							echo '<a href="index.php?flag=sampling&brandID='.$brandID[$i].'&subcatID='.$r['subcatID'].'" class="linkBlue" target="_top">:&nbsp;'.$r['subcatName'].'&nbsp;:</a>';
						}
						echo '</div>';
					}
				}
			?>
        <?php } ?>
    	<hr class="lineDetailSampling">
    <?php } ?>
    </div>
    
</div>
<?php
unset($catCount, $catID, $catName, $brandCount, $brandID, $brandName, $reqCatID, $reqBrandID, $reqSubCatID);
unset($mQuery);
?>