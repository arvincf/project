<script>
    let dropdown = document.getElementsByClassName("dropdown-btn");

    for (i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function() {
            let dropdownContent = this.nextElementSibling;

            this.classList.toggle("active");

            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
            } else {
                dropdownContent.style.display = "block";
            }
        });
    }
</script>
