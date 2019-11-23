// navbar js
window.onscroll = function () {
    scrollFunction()
};

function scrollFunction() {
    if (document.body.scrollTop > 70 || document.documentElement.scrollTop > 70) {
        document.getElementById("menubar").style.top = "0";
    } else {
        document.getElementById("menubar").style.top = "-60px";
    }
}

// click dropdow js
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

document.getElementById('start_date').value = Date();