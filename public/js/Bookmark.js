document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll(".BookmarkBtn").forEach(btn => {
        btn.addEventListener("click", () => {
            const bookmark = btn.querySelector(".bookmarkIcon");
            if (!bookmark) return;
            if (bookmark.dataset.liked === "true") {
                bookmark.src = "/img/bookmark.svg";
                bookmark.dataset.liked = "false";
            } else {
                bookmark.src = "/img/bookmark-fill.svg";
                bookmark.dataset.liked = "true";
            }
        });
    });
});
