function show(x) {
  if (x == 1) {
    document.getElementById("print-only-class").style.display = "block";
    document.getElementById("document-class").style.display = "none";
    document.getElementById("canvas-only-class").style.display = "none";
    return;
  } else if (x == 2) {
    document.getElementById("document-class").style.display = "block";
    document.getElementById("print-only-class").style.display = "none";
    document.getElementById("canvas-only-class").style.display = "none";
    return;
  } else if (x == 3) {
    document.getElementById("canvas-only-class").style.display = "block";
    document.getElementById("print-only-class").style.display = "none";
    document.getElementById("document-class").style.display = "none";
    return;
  }
}
