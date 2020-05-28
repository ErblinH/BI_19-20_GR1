window.addEventListener("load", function() {
    document.getElementById("submitButton").addEventListener("click", searchInput)
    for (var k = 0; k < sportsImages.length; k++) {
        article2(sportsImages[k], sportsHeaders[k], sportsHeaders2[k], k, 1, 0);
    }
})