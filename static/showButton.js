function showOption(x) {
  if (x == 1) {
    document.getElementById("upload-file").style.display = "block";
    document.getElementById("file-name").style.display = "none";
  } else if (x == 2) {
    document.getElementById("upload-file").style.display = "none";
    document.getElementById("file-name").style.display = "block";
  }
}
