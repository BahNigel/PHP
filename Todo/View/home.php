<?php
include('header/header.php');
?>

<section class="add">
    <div class="container">
        <div class="mesg" style="color:green"></div>
        <form class="form">
            <div class="form-group">
                <label for="formGroupExampleInput">
                    <h4>New task</h4>
                </label>
                <textarea name="task" type="text" class="form-control task" id="formGroupExampleInput"
                    placeholder="Example input" required></textarea>
            </div>
            <button type="submit" id="submit" class="btn btn-secondary submit">Submit</button>
        </form>
    </div>
</section>
<section class="list">
    <div class="container">
        <h2>List of all task</h2>
        <div class="done_mesg" style="color:green"></div>
        <div class="list_tb"></div>
    </div>
</section>
<section class="list2">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>List of completed task</h2>
                <div class="completed"></div>
            </div>
            <div class="col-md-6">
                <h2>List of pending task</h2>
                <div class="pending"></div>
            </div>
        </div>
    </div>
</section>
<?php
include('header/footer.php');
?>

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script>
$(document).ready(function() {
    $('.submit').click(function(e) {
        e.preventDefault();
        var data = $('.form').serialize() + '&submit=submit';
        $.ajax({
            url: '/add',
            type: 'post',
            data: data,
            success: function(response) {
                $('.mesg').html(response);
                $('.task').val('');
                displayData();
            }
        });
    });
});
//show full list
$(document).ready(function() {

    setInterval(function() {
        load_last_notification();
    }, 2000);

    function load_last_notification() {
        $.ajax({
            url: "/list",
            method: "POST",
            success: function(data) {
                $('.list_tb').html(data);
            }
        })
    }
});

//show completed task
$(document).ready(function() {

    setInterval(function() {
        load_last_notification();
    }, 2000);

    function load_last_notification() {
        $.ajax({
            url: "/completed",
            method: "POST",
            success: function(data) {
                $('.completed').html(data);
            }
        })
    }
});

//show pendding task
$(document).ready(function() {

    setInterval(function() {
        load_last_notification();
    }, 2000);

    function load_last_notification() {
        $.ajax({
            url: "/pending",
            method: "POST",
            success: function(data) {
                $('.pending').html(data);
            }
        })
    }
});
</script>