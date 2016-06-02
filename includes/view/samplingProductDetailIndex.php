                    <div class="col-sm-3 col-lg-3 col-md-3" style="height:420px;">
                        <div class="thumbnail">
                            <img src="upload/<?php echo $pictureProduct; ?>" alt="" style="width:184px; height:184px;">
                            <div class="caption">
                                <!-- <h4 class="pull-right">$24.99</h4> -->
                                <h4><a href="index.php?flag=productDetail&pid=<?php echo $productID; ?>"><?php echo $productName; ?></a>
                                </h4>
                                <p><a href="index.php?flag=productDetail&pid=<?php echo $productID; ?>" class="linkBlueBlack12Bold" target="_top">Product Detail</a>&nbsp;&nbsp;&nbsp;&nbsp;<label class="middleSilver11">(&nbsp;<?php echo number_format($productClickCount, 0)."&nbsp;&nbsp;Views"; ?>&nbsp;)</label></p>
                                <p><label class="middlePurple11">Use Points&nbsp;:</label>&nbsp;&nbsp;&nbsp;&nbsp;<label class="middleSilver11"><?php echo $productPrice."&nbsp;&nbsp;Points"; ?></label>
                                </p>
                            </div>
                            <div class="ratings">
                                <p style="margin-left:10px;">
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                </p>
                                <p  class="pull-right">
                                    <a href="index.php?flag=grapSample&pid=<?php echo $productID; ?>" target="_top"><img src="images/showProduct_r7_c22_r2_c2.jpg" width="104" height="28" style="margin-top:-35px;"></a>
                                </p>
                            </div>
                        </div>
                    </div>