<div style="width:100%;background:#f0ffff;">
    <center>
        <h1>圖書館公告</h1>
    
    <table width="70%" border="1">
        <th>公告事項</th>
        <th width="250px">公告日期</th>
        <?php 
        if(isset($_GET['page']))
            $page=$_GET['page'];
        else
        $page=1;
        for ($i=1;$i<=10;$i++){ ?>
            <tr style="height:30px;line-height:30px;font-size:18px;">
                <td>公告<?php echo ($page-1)*10+$i ; ?></td>
                <td>2017.06.<?php echo 10+$i;?></td>
            </tr>
        <?php } ?>
    </table>
    <?php 
    for($i=1;$i<=10;$i++){ ?>
        <a href="?mod=index&page=<?php echo  $i;?>"><?php echo $i;?></a>
    <?php } ?>
    <br>
    <fort style="font-size:16px;color:blue;">當前為第<?php echo $page;?>頁</fort>
    </center>
</div>