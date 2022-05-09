<div class="sidebar">
    <div id="book" class="sidebar-item">Sách</div>
    <div id="member" class="sidebar-item">Thành viên</div>
    <div id="borrow" class="sidebar-item">Mượn sách</div>
    <div id="logout" class="sidebar-item bot-sidebar">Đăng xuất</div>
</div>
<script type="module">
    
window.onhashchange = function() {
 alert("Changed")
}
document.getElementsByTagName("head")[0].insertAdjacentHTML(
    "beforeend",
    "<link rel=\"stylesheet\" href=\"/QLTV/components/sidebar.css\" />");
let itemList = document.querySelectorAll('.sidebar-item')
for (let item of itemList) {
    if (item.id === 'logout') {
        item.addEventListener('click', () => {
            window.location.replace("./logout.php")
        })
    }
    if (item.id==='book'){
        item.addEventListener('click', () => {
            window.location.replace("./admin.php?page=book")
        })
    }
    if (item.id==='member'){
        item.addEventListener('click', () => {
            window.location.replace("./admin.php?page=member")
        })
    }
    if (item.id==='borrow'){
        item.addEventListener('click', () => {
            window.location.replace("./admin.php?page=borrow")
        })
    }
}
</script>