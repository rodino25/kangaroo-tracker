$(() => {
    $("#form-login").on("submit", e => {
        e.preventDefault();

        const alertLoginError = $(".alert-login-fail");
        const payload = {
            username: $("#input-username").val(),
            password: $("#input-password").val()
        }

        alertLoginError.addClass("d-none");

        axios
            .post("/api/auth/login", payload)
            .then (r => {
                const user = r.data.user;
                localStorage.setItem("userId", user.id);
                localStorage.setItem("displayName", user.name);
                localStorage.setItem("token", r.data.token);
                window.location.href = "/";
            })
            .catch (err => {
                alertLoginError.text(err.response.data.message);
                alertLoginError.removeClass("d-none");
            });
    })
})