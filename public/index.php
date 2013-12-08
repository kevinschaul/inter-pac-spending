<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <title>2013-12-3-pac-dag</title>

  <link rel="stylesheet" href="css/base.css" />
</head>
<body>

<h1>2013-12-3-pac-dag</h1>
<div class='graphic'>
  <div class='sentence'>
    If I donated <input type='text' id='amount' class='form-control' value='$100' /> to

    <div class='form-group'>
      <select class='form-control combobox'><option></option></select>
    </div>

    <button>Go</button>

    <div id='sentence-results-target'></div>
  </div>
</div>

<script id='sentence-results-template' type='text/template'>
  <ul>
  <% _.each(amounts, function(d) { %>
    <li><%= d.amountFormatted %> to <%= d.pacName %></li>
  <% }); %>
  </ul>
</script>

<script src="lib/d3.v3.js" type="text/javascript" charset="utf-8"></script>
<script src="lib/underscore-min.js" type="text/javascript" charset="utf-8"></script>
<script src="lib/queue.v1.min.js" type="text/javascript" charset="utf-8"></script>
<script src="lib/jquery-1.10.2.min.js" type="text/javascript" charset="utf-8"></script>
<script src="lib/bootstrap-combobox.js" type="text/javascript" charset="utf-8"></script>
<script src="js/base.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>

