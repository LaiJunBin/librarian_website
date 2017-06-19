<?php
    if(isset($_GET['page']))
        $page=$_GET['page'];
    else
    $page=1;
    include_once('./pdoLink.php');
    $select=$db->prepare('select b_id from bulletin order by b_id desc');
    $select->execute();
    $row=$select->fetch(PDO::FETCH_NUM);
    $select=$db->prepare('select * from bulletin where b_id between :a and :b');
    $select->bindValue(':a',($page-1)*10);
    $select->bindValue(':b',($page-1)*10+10);
    $select->execute();
?>
<div style="width:100%;background:#f0ffff;">
<link rel="stylesheet" href="main.css">
    <center>
        <h1>圖書館公告</h1>
    
    <table width="70%" border="1">
        <th>公告事項</th>
        <th width="250px">公告日期</th>
        <?php 
        $number=0;
        while($result=$select->fetch(PDO::FETCH_ASSOC)){ $number+=1;?>
            <tr style="height:30px;line-height:30px;font-size:18px;">
                <td><a href="#" data-toggle="modal" data-target="#bulletinModal_<?php echo $number ?>"><?php echo $result['b_title'] ; ?></a></td>
                <td><?php echo $result['b_date'];?></td>
            </tr>
        <?php } ?>
    </table>
    <?php
    if($page<=5)
        $allpage=1;
    else
        $allpage=$page-5;
    for($i=$allpage;$i<=($allpage-1)+10;$i++){ 
        if($i<=($row[0]/10)+1){
    ?>
        <a href="?mod=index&page=<?php echo  $i;?>"><?php echo $i;?></a>
    <?php } }?>
    <br>
    <fort style="font-size:16px;color:blue;">當前為第<?php echo $page;?>頁</fort>
    </center>
</div>
<?php for ($i=0;$i<=$number;$i++){  ?>
<div class="modal fade" id="bulletinModal_<?php echo $i;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    
                        <center>
                            <div class="pag">
                                <div class="panel panel-info">
                                    <div class="panel-heading">圖書館公告</div>
                                    <div class="panel-body">
                                        <?php
                                            $select=$db->prepare('select * from bulletin where b_id=:id');
                                            $select->bindValue(':id',($_GET['page']-1)*10+$i);
                                            $select->execute();
                                            $result=$select->fetch(PDO::FETCH_ASSOC);
                                        ?>
                                        <h2><?php echo $result['b_title']?></h2>
                                        <?php 
                                            echo "公告日期：".$result['b_date']."<br>";
                                            echo "<h3 style=text-align:left;>公告內容</h3>";
                                            echo "<content>".$result['b_content']."</content>";
                                        ?>
                                        
                                    </div>
                                </div>
                            </div>
                        </center>
                   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php }?>