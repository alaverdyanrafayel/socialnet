    <div class="container content_register">
        <form action="/home/register" method = "post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="f_name">First Name:</label>
                <input type="text" class="form-control f_name" name="f_name">
            </div>
            <div class="form-group">
                <label for="l_name">Last Name:</label>
                <input type="text" class="form-control l_name" name="l_name">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control email" name="email">
            </div>
            <div class="form-group">
                <label for="pass">Password:</label>
                <input type="password" class="form-control password" name="password">
            </div>
            <div class="form-group">
                <label for="pass">Confirm Password:</label>
                <input type="password" class="form-control conf_password" name="conf_password">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success" name="register" value="Register">
            </div>
        </form>
        <h3 style = "color:red"><?=$this->error?></h3>
    </div>
