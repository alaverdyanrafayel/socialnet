<?php

foreach ($this->selUsers as $user) {


?>


<div class="container">
    <h2>Users list</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Image</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><a href = "<?php echo '/account/users/' .$user['id'] ?>"><?php echo $user['f_name'];?></a></td>

            <td><?php echo $user['l_name']; ?></td>
            <td><?php echo $user['email']; ?></td>
            <td><img src="<?php if(!empty($user['image'])){ echo '/public/uploads/' . $user['image'];}
                else{ echo '/public/uploads/avator.png';} ?>" class="img-rounded" alt="<?php  echo $user['image'];?>"
                                      width="104" height="96"></td></td>
        </tr>
        </tbody>
    </table>
</div>

<?php } ?>

