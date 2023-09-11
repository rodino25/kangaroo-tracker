if (!localStorage.getItem("token")) {
    window.location.href = "/login";
}

$(() => {
    axios.defaults.headers.common = {
        'Authorization': `Bearer ${localStorage.getItem("token")}`,
        'Accept': `application/json`
    };

    // set display name
    $(".label-displayName").text(localStorage.getItem("displayName"));

    // add active for selected navigation
    $(".nav-link").each(function() {
        const navUrl = $(this).attr("href");
        const currentUrl = `${window.location.protocol}//${window.location.host}${window.location.pathname == "/" ? "" : window.location.pathname}`; 
    
        
        if (currentUrl == navUrl) {
            $(this).addClass("active");
        } else {
            $(this).removeClass("active");
        }
    });

    // logout button
    $(".btn-logout").click(function() {
        doLogout()
    });
});

async function doLogout() {
    axios.get("/api/auth/logout");
    localStorage.removeItem("token");
    window.location.href = "/login";
}