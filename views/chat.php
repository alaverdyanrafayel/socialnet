<div class="container message_field" xmlns="http://www.w3.org/1999/html">
    <h1>Message field:</h1>
    <div class="form-group">
        <textarea class="form-control" id = "big_textarea" rows=15>
            <?php foreach ($this->getChat as $messages) {
                echo $messages['text'] . "\n" . $messages['date'] . "\n";
            } ?>
        </textarea>
    </div>
    <div class="form-group under_message">
        <form action="/account/chat" method="post" enctype="multipart/form-data">
            <textarea id="message" class="form-control" rows=4></textarea>
            <button type="button" class="btn btn-default envelope" id="<?php echo $messages['to_id']; ?>">
                <span class="glyphicon glyphicon-envelope"></span>
            </button>
        </form>
    </div>
</div>

