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

    <form class='form-inline'>
      If I donated
      <div class='col-md-2 form-group input-group'>
        <span class="input-group-addon">$</span>
        <input type='text' id='amount' class='form-control' value='100' />
      </div>
      to
      <div class='form-group'>
        <select class='form-control combobox'><option></option></select>
      </div>

      <button onclick='return false;' class='btn btn-primary'>Go</button>
    </form>
  </div>

  <div id='sentence-results-target'></div>
</div>

<script id='sentence-results-template' type='text/template'>
<% _.each(amounts, function(d) { %>
  <div class='amount'>
    <span class='value'>
      <%= d.amountFormatted %>
    </span>
    to
    <span class='committee'>
      <%= d.pac.Committee %>
    </span>
    <div class='info'>
      <div class='category'>
        <% if (d.pac.cat2 === 'labor') { %>
          (labor icon)
        <% }; %>
        <%= d.pac.cat2 %>
      </div>
      <div class='category'>
        <%= d.pac.cat1 %>
      </div>
      (more information)
    </div>
  </div>
<% }); %>
</script>

<script src="lib/d3.v3.js" type="text/javascript" charset="utf-8"></script>
<script src="lib/underscore-min.js" type="text/javascript" charset="utf-8"></script>
<script src="lib/queue.v1.min.js" type="text/javascript" charset="utf-8"></script>
<script src="lib/jquery-1.10.2.min.js" type="text/javascript" charset="utf-8"></script>
<script src="lib/bootstrap-combobox.js" type="text/javascript" charset="utf-8"></script>
<script src="js/base.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>

