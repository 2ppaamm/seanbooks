function validateForm() {
    var x = document.forms["searchForm"]["searchInput"].value;
    if (x == null || x == "") {
        alert("Fill search");
        return false;
    }
}