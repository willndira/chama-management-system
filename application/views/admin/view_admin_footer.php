<script src="<?php echo base_url("includes/css/moment.js"); ?>"></script>
<script src="<?php echo base_url("includes/css/pikaday.js"); ?>"></script>
<script>
    var picker = new Pikaday({
        field: document.getElementById('datepicker'),
        format: 'YYYY/MM/D',
        onSelect: function() {
            console.log(this.getMoment().format('Do MMMM YYYY'));
        }
    });
</script>

<script>
    var picker = new Pikaday({
        field: document.getElementById('to'),
        format: 'YYYY/MM/D',
        onSelect: function() {
            console.log(this.getMoment().format('Do MMMM YYYY'));
        }
    });
</script>

<!-- /#wrapper -->
        <!-- Nav CSS -->
        <link href="<?php echo base_url('includes/css/pikaday.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('includes/css/custom.css'); ?>" rel="stylesheet">
        <!-- Metis Menu Plugin JavaScript -->
        <script src="<?php echo base_url('includes/js/metisMenu.min.js'); ?>"></script>
        <script src="<?php echo base_url('includes/js/custom.js'); ?>"></script>
    </body>
</html>