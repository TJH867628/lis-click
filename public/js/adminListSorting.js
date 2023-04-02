function filterTable(column, value) {
    var table, rows, cell, i, j;
    table = document.getElementsByTagName("table")[0];
    rows = table.getElementsByTagName("tr");
    for (i = 1; i < rows.length; i++) {
      cell = rows[i].getElementsByTagName("td")[column];
      if (cell) {
        if (cell.innerHTML.toLowerCase().indexOf(value.toLowerCase()) > -1) {
          rows[i].style.display = "";
        } else {
          rows[i].style.display = "none";
        }
      }
    }
  }
  