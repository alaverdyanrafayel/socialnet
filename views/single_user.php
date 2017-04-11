<?php
$this->selectSingleUser['f_name'];




?>


<div class = "singleUser">
   <img src ="<?php echo  "/public/uploads/" .$this->selectSingleUser['image']; ?>" style = "width:225px; height:185px;float:left">
    <div style = "color:blue;line-height: 250px;margin-left:350px">
        <?php echo  $this->selectSingleUser['f_name'] ." ". $this->selectSingleUser['l_name']  ?><br>

    </div>
    <?php if($this->friendshipStatus =="requestSend"){?>
        <button type="button" class="btn btn-primary" name = "add_friend">Friend request send</button>
    <?php }elseif($this->friendshipStatus =="areFriends"){?>
        <button type="button" class="btn btn-primary" name = "add_friend"
            >Friends</button>
    <?php }else{?>
    <button type="button" class="btn btn-primary add_friend" name = "add_friend"
            id="<?php echo $this->selectSingleUser['id']; ?>">Add Friend</button>
   <?php }?>

    <a href = "<?php echo "/account/chat/" .$this->selectSingleUser['id'];?>"
    <button type="button" class="btn btn-info message" id="<?php echo $this->selectSingleUser['id']; ?>">Message</button></a>

</div>

<script src="../public/js/jquery.js"></script>
<script src="../public/js/init.js"></script>