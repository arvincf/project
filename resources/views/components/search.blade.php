<script src="https://code.jquery.com/jquery-3.6.4.min.js" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        $("#searchInput").on("input", function() {
            var value = $(this).val().toLowerCase();

            // Filter the user table based on the first name
            $(".user-table-body tr").filter(function() {
                $(this).toggle($(this).find('td:first').text().toLowerCase().indexOf(value) > -1);
            });
        });
    });
</script>