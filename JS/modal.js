document.getElementById("button").addEventListener("click", function () {
  document.querySelector(".bg-modal").style.display = "flex";
});

function showModal() {
  var x = document.getElementById("modal");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function deleteRec(id) {
  if (confirm("Do you want to cancel your appointment ?")) {
    window.location.href = "delete.php?del_id=" + id + "";
    return true;
  }
}
