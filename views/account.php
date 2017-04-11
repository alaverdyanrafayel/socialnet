<div class="container" style="width:400px; right:0">
    <h2 style="color:red">Confirm friend request</h2>
    <table class="table table-striped">
        <tbody>
        <?php
        foreach ($this->pendingRequest as $friendRequestSenders) {
            ?>
            <tr id="<?php echo $friendRequestSenders['id']; ?>">
                <td><?php echo $friendRequestSenders['f_name']; ?></td>
                <td><?php echo $friendRequestSenders['l_name']; ?></td>
                <td><img src="<?php if (!empty($friendRequestSenders['image'])) {
                        echo '/public/uploads/' . $friendRequestSenders['image'];
                    } else {
                        echo '/public/uploads/avator.png';
                    } ?>" class="img-rounded" alt="<?php echo $friendRequestSenders['image']; ?>"
                         width="104" height="96"></td>
                </td>
                <td>
                    <button type="button" class="btn btn-primary confirm" name="confirm"
                            id="<?php echo $friendRequestSenders['id']; ?>">Confirm
                    </button>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>


<!- get the image and description of a user ->
<div class="container search_content">
    <form action="account/users/" method="post" enctype="multipart/form-data">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search" name="search">
            <div class="input-group-btn" style="height:35px">
                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </div>
        </div>
    </form>
</div>

<div class="account">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="img_account">
            <img src="<?php if (!empty($this->user['image'])) {
                echo '/public/uploads/' . $this->user['image'];
            } else {
                echo '/public/uploads/avator.png';
            } ?>"
                 class="img-rounded" alt="<?php echo $this->user['image']; ?>" width="204" height="196">
            <input type="file" name="image"/><br>
            <input type="submit" name="submit" value="upload">
        </div>
    </form>
    <div class="desc_account">
        <?php echo "Name: " . $this->user['f_name'] . "<br><br> Surname: " . $this->user['l_name'] . "<br><br> E_mail: " . $this->user['email']; ?>
    </div>
</div>




