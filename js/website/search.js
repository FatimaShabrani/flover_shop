
const searchToggle = document.getElementById("searchToggle");
const searchInput = document.getElementById("searchInput");

if (searchToggle && searchInput) {
    searchToggle.addEventListener("click", function () {

        if (searchInput.style.display === "block") {

            if (searchInput.value.trim() !== "") {
                searchInput.closest("form").requestSubmit();
            } else {
                searchInput.style.display = "none";
            }

        } else {
            searchInput.style.display = "block";
            searchInput.focus();
        }

    });
}
