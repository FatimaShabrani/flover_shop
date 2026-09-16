const menuToggle = document.getElementById("menuToggle");
const navLinks = document.getElementById("navLinks");

menuToggle.addEventListener("click", function () {
    navLinks.classList.toggle("active");
});

    <script>

        function toggleMenu() {

            document
                .getElementById("navLinks")
                .classList
                .toggle("active");

        }

    </script>