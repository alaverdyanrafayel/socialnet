
    <div class="container content_login">
        <form action="/home/login" method = "post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control email" name="email" value = "<?=$this->email?>">
            </div>
            <div class="form-group">
                <label for="pass">Password:</label>
                <input type="password" class="form-control password" name="password">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success" name="submit" value="Login">
            </div>
        </form>
        <h3 style = "color:red"><?=$this->error?></h3>
    </div>


