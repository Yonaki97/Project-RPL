document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll(".likeBtn").forEach(btn => {
        btn.addEventListener("click", () => {
            const heart = btn.querySelector(".heartIcon");
            if (!heart) return;
            if (heart.dataset.liked === "true") {
                heart.src = "/img/heart.svg";
                heart.dataset.liked = "false";
            } else {
                heart.src = "/img/heart-fill.svg";
                heart.dataset.liked = "true";
            }
        });
    });
});
