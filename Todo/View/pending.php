<table class="table">
    <thead class="thead-light">
        <tr>
            <th scope="col">Task</th>
            <th scope="col"> Task Done </th>
            <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($task as $item):
                if($item['status']==0):
        ?>
        <tr>
            <td><?php echo $item['todo'];?></td>
            <td>
                <form class="done_form">
                    <input name="task_id" type="hidden" class="form-control task_id" value="<?php echo $item['id']; ?>"
                        required />
                    <button type="submit" id="submit" class="btn btn-success done_btn">Done</button>
                </form>
            </td>
            <td>
                <form class="delete_form">
                    <input name="task_id" type="hidden" class="form-control task_id" value="<?php echo $item['id']; ?>"
                        required />
                    <button type="submit" id="submit" class="btn btn-danger delete_btn">Delete</button>
                </form>
        </tr>
        <?php
        endif;
    endforeach;
    ?>
    </tbody>
</table>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script>
const btn = document.getElementsByClassName("done_btn");
const form = document.getElementsByClassName("done_form");
for (let i = 0; i < form.length; i++) {
    console.log(btn[0]);
    $(document).ready(function() {
        $(btn[i]).click(function(e) {
            e.preventDefault();
            console.log(e);
            var data = $(form[i]).serialize() + '&done_btn=done_btn';
            $.ajax({
                url: '/done',
                type: 'post',
                data: data,
                success: function(response) {
                    $('.done_mesg').html(response);
                    $('.task_id').val('');
                    displayData();
                }
            });
        });
    });
}

const Dbtn = document.getElementsByClassName("delete_btn");
const Dform = document.getElementsByClassName("delete_form");
for (let i = 0; i < Dform.length; i++) {
    console.log(btn[0]);
    $(document).ready(function() {
        $(Dbtn[i]).click(function(e) {
            e.preventDefault();
            console.log(e);
            var data = $(Dform[i]).serialize() + '&delete_btn=delete_btn';
            $.ajax({
                url: '/delete',
                type: 'post',
                data: data,
                success: function(response) {
                    $('.done_mesg').html(response);
                    $('.task_id').val('');
                    displayData();
                }
            });
        });
    });
}
</script>