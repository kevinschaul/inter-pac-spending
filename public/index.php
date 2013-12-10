<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <title>2013-12-3-inter-pac-spending</title>

  <link rel="stylesheet" href="css/base.css" />
</head>
<body>

<h1>2013-12-3-inter-pac-spending</h1>
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
    went to
    <span class='committee'>
      <%= d.pac.Committee %>
    </span>
    <div class='info'>
      A <span class='info-value'><%= d.pac.cat2 %> <%= d.pac.stype %></span> based in <span class='info-value'><%= d.pac.CommCity %>, <%= d.pac.CommState %></span>.
    </div>
    <div class='info'>
      Spent <span class='info-value'><%= d.pac.spentFormatted %></span> over the past three election cycles.
    </div>
    <div class='info'>
      Raised <span class='info-value'><%= d.pac.receivedFormatted %></span> in the same time period.
    </div>
    <div class='info'>
      Had <span class='info-value'><%= d.pac.endcash2012 %></span> on hand at the end of 2012.
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

