<script src="https://code.jquery.com/jquery-3.6.4.min.js" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        $("#searchForm").on("submit", function(e) {
            e.preventDefault();
            var value = $("#searchInput").val().toLowerCase();

            
            $.ajax({
                url: $(this).attr("action"),
                method: "GET",
                data: { query: value },
                success: function(response) {
                    s
                    $(".user-table-body").html(response);
                },
                error: function(xhr) {
                    // Handle the error
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>