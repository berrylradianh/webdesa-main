document.addEventListener("DOMContentLoaded", function () {
    const togglePassword = document.querySelector("#togglePassword");
    const password = document.querySelector("#password");
    const eyeOpen = document.querySelector("#eyeOpen");
    const eyeClosed = document.querySelector("#eyeClosed");

    if (togglePassword && password && eyeOpen && eyeClosed) {
        togglePassword.addEventListener("click", function () {
            const type =
                password.getAttribute("type") === "password"
                    ? "text"
                    : "password";
            password.setAttribute("type", type);

            // Toggle icon
            eyeOpen.classList.toggle("hidden");
            eyeClosed.classList.toggle("hidden");
        });
    }
});
