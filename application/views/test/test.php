<!DOCTYPE html>

<html>
    <head>
        <title>Diseases</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">



        
        <script type="text/javascript" src="<?php echo base_url('includes/test/bootstrap-datepicker.js');?>"></script>
        <link rel="stylesheet" href="<?php echo base_url('includes/test/bootstrap.min.css');?>" media="screen, projection">
        <link rel="stylesheet" href="<?php echo base_url('includes/test/home.css');?>">
        <link rel="stylesheet" href="<?php echo base_url('includes/test/jquery-ui-1.11.4.custom/jquery-ui.css');?>">
        <script src="<?php echo base_url('includes/test/jquery-ui.js');?>"></script>

        <script src="<?php echo base_url('includes/test/jquery.js');?>"></script>

        <link rel="stylesheet" href="<?php echo base_url('includes/test/jquery-ui.css');?>">
        <script src="<?php echo base_url('includes/test/jquery-1.10.2.js');?>"></script>
        <script src="<?php echo base_url('includes/test/jquery-ui.js');?>"></script>
        
        <script>
            $(function () {
                $("#from").datepicker({
                    defaultDate: "+1w",
                    changeMonth: true,
                    numberOfMonths: 1,
                    onClose: function (selectedDate) {
                        $("#to").datepicker("option", "minDate", selectedDate);
                    }
                });
                $("#to").datepicker({
                    defaultDate: "+2w",
                    changeMonth: true,
                    numberOfMonths: 1,
                    onClose: function (selectedDate) {
                        $("#from").datepicker("option", "maxDate", selectedDate);
                    }
                });
            });
        </script>



    </head>
    <body>

        <input type="text" id="from" name="sick" required/>

        <input type="text" id="to" name="recovery" required/>


 


</body>
</html>
