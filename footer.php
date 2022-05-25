
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="assets/js/style.js"></script>
<!-- Supprimer notification-->
<script>
    $(document).ready(function () {
        $('.deletebtnn').on('click', function () {
            $("#deletemodalnotif").modal('show');

            $tr =$(this).closest('tr') ;
            var data =$tr.children("td").map(function () {
                return $(this).text();
            }).get();

            console.log(data);
            $('#delete_id_notif').val(data[0]);
        });
    });

</script>

<!-- Supprimer signal-->
<script>
    $(document).ready(function () {
        $('.deletebtn').on('click', function () {
            $("#deletemodal").modal('show');

            $tr =$(this).closest('tr') ;
            var data =$tr.children("td").map(function () {
                return $(this).text();
            }).get();

            console.log(data);
            $('#delete_id').val(data[0]);
        });
    });

</script>

<!-- Modifier signal-->
<script>
    $(document).ready(function () {
        $('.editbtn').on('click', function () {
            $("#editmodel").modal('show');

            $tr =$(this).closest('tr') ;
            var data =$tr.children("td").map(function () {
                return $(this).text();
            }).get();

            console.log(data);
            $('#update_id_signal').val(data[0]);
            $('#id_signal').val(data[1]);
            $('#name').val(data[2]);
            $('#type').val(data[3]);
        });
    });

</script>
<!-- Modifier notification-->
<script>
    $(document).ready(function () {
        $('.editbtnn').on('click', function () {
            $("#editmodelnotif").modal('show');

            $tr =$(this).closest('tr') ;
            var data =$tr.children("td").map(function () {
                return $(this).text();
            }).get();

            console.log(data);
            $('#update_id_notif').val(data[0]);
            $('#id_signale').val(data[1]);
            $('#type_notif').val(data[2]);
            $('#email').val(data[3]);
            $('#coordonnees').val(data[4]);

        });
    });

</script>

</body>
</html>