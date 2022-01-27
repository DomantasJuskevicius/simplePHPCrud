function deleteRec(id) {
  if (confirm("Do you want to cancel your appointment ?")) {
    window.location.href = "delete.php?del_id=" + id + "";
    return true;
  }
}
