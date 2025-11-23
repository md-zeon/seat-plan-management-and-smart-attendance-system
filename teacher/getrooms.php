<?php
include_once '../dbconnection.php';
session_start();

$examdate = $_POST['examdate'];

$need = $_POST['need'];



echo

'
<div id="need" style="display: none;">' . $need . '</div>


<div class="form-group">
<label>Select Rooms</label>
<select id="choices-multiple-remove-button" placeholder="Select Rooms" multiple name="rooms[]" required>
    <div >
    
';



$query = "select * from room;";
$result = $conn->query($query);

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {

        $roomid   = $row['roomid'];
        $capacity = $row['capacity'];


        $query1 = "select * from avaiableseat where room ='" . $roomid . "' and date='" . $examdate . "';";
        $result1 = $conn->query($query1);
        $date = $examdate;
        $used = 0;
        while ($row = $result1->fetch_assoc()) {
            $used = $row['used'];
        }

        if (($capacity - $used) > 0) {
            echo "<option value=" . $roomid . "@" . $capacity  . "@" . $used . ">" . $roomid . "(" . ($capacity - $used) . " Available Seat)</option>";
        }
    }
}










echo '    </div>
</select>

</div>


<div id="msgneed"></div>



<button type="submit" class="btn btn-primary" id="submitexam">Submit</button>

';

echo "
<script> $(document).ready(function() {
    var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
        removeItemButton: true,
        renderChoiceLimit: 5
    });

    $('#submitexam').attr('disabled','disabled');
});

$('#choices-multiple-remove-button').on('keyup change', function() {
    var val =  $('#choices-multiple-remove-button').val();

    var need = document.getElementById('need').innerHTML;
    var sum = 0;
   
    for (i = 0; i < val.length; i++)
    {
        const sp  = val[i].split('@');

        var roomid = sp[0];
        var capacity = sp[1];
        var used = sp[2];
        var space = capacity - used;
        sum += space;
        
    }

    if(need<=sum){
        
        $('#submitexam').removeAttr('disabled');
        document.getElementById('msgneed').innerHTML='<span>seat selection is ok</span>'; 
 
    }else{
        $('#submitexam').attr('disabled','disabled');
        document.getElementById('msgneed').innerHTML='<span>Not enough space, select more rooms</span>'; 
    }
    
   

    
});


</script>


";
