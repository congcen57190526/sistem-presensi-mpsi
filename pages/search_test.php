<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 12px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#table {
  list-style-type: none;
  padding: 0;
  margin: 0;
}

#table td a {
  border: 1px solid #ddd;
  margin-top: -1px; /* Prevent double borders */
  background-color: #f6f6f6;
  padding: 12px;
  text-decoration: none;
  font-size: 18px;
  color: black;
  display: block
}

#table td a:hover:not(.header) {
  background-color: #eee;
}
</style>
</head>
<body>

<h2>My Phonebook</h2>

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">

<table id="table">
<tr>
<th>test</th>
  <td id="name"><a href="#">Adele</a></td>
  <td id="num">123</td>
<tr>
  <td id="name"><a href="#">Agnes</a></td>
  <td id="num"><a href="#">456</a></td>
</tr>
<tr>
  <td id="name"><a href="#">Billy</a></td>
  <td id="num"><a href="#">789</a></td>
  </tr>
  <tr>
  <td id="name"><a href="#">Bob</a></td>
  </tr>
  <tr>
  <td id="name"><a href="#">Calvin</a></td>
  </tr>
  <tr>
  <td id="name"><a href="#">Christina</a></td>
  </tr>
  <tr>
  <td id="name"><a href="#">Cindy</a></td>
</tr>
</table>

<script>
function myFunction() {
    var input, filter, t, td, a, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    t = document.getElementById("table");
    tr = t.getElementsByTagName("tr");
    td = t.getElementsByTagName("td");
    for (i = 0; i < td.length; i++) {
        a = tr[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
            
        } else {
            tr[i].style.display = "none";
        }
    }
}
</script>

</body>
</html>
