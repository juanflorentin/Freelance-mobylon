<!--Catergories-->
    <div class="span3">
      
      <h1 id="list">Categories</h1>
        
      <div class="well" style="padding: 8px 0;">
        <ul class="nav nav-list">
          <li class="#"><a href="alljobs.php" class="catlink" STYLE="text-decoration:none">All Listings&nbsp;(<?=getalljobs(0);?>)</a></li>
          <li class="divider"></li>
          <li class="nav-header">Categories</li>
          <?php $w_ql="select * from tbljobcategories order by name";
$w_res=mysql_query($w_ql);
while($r=mysql_fetch_array($w_res))
{?>		   <li class="divider"></li><li><a href="alljobs.php?cid=<?=$r['id']?>"><?=$r['name']?>&nbsp;(<?=gettotaljobs($r['id']);?>)</a>
 <?php } ?></li>
         </ul>
      </div>
 </div>