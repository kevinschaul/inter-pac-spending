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
  <div id='graph'></div>

  <div id='show-wrapper-dfl-target'></div>
  <div id='show-wrapper-rpm-target'></div>

  <script id='show-wrapper-template' type='text/template'>
    <div class='show-wrapper <%= party %>'>
      <div class='title'>Top <%= partyReadable %> Spenders</div>

      <% _.each(sortedByCategory, function(d, c) { %>
        <div class='show'>
          <div class='button' data-party='<%= party %>' data-show='<%= c %>'>
            <div class='label'><%= d.categoryReadable %></div>
          </div>
          <div class='top-spenders'>
          <% for (var i = 0; i < 5; i++) { %>
            <% var pac = d[party][i]; %>
            <div class='spender'><span class='amount'><%= pac[amountsReadable[c]] %></span> <%= pac.Committee %></div>
          <% } %>
          </div>
        </div>
      <% }); %>

      <div class='clear'></div>
    </div>
  </script>

  <div class='clear'></div>

  <div class='info'>
    <script id='node-info-template' type='text/template'>
      <div class='name'><%= pac.Committee %></div>

      <div class='info'>
        <span class='label'>Category</span><span class='value'><%= pac.cat2 %></span>
        <div class='clear'></div>
      </div>

      <div class='info'>
        <span class='label'>Type</span><span class='value'><%= pac.stype %></span>
        <div class='clear'></div>
      </div>

      <div class='info'>
        <span class='label'>Based in</span><span class='value'><%= pac.CommCity %>, <%= pac.CommState %></span>
        <div class='clear'></div>
      </div>

      <div class='info'>
        <span class='label'>Spent</span><span class='value'><%= pac.totspendFormatted %></span>
        <div class='clear'></div>
      </div>

      <div class='info'>
        <span class='label'>Cash on hand</span><span class='value'><%= pac.endcash2012Formatted %></span>
        <div class='clear'></div>
      </div>
    </script>
    <div id='node-info-target'>
      <div class='help'>Touch a pac to the left for more information.</div>
    </div>
  </div>
</div>


<script src="lib/d3.v3.min.js" type="text/javascript" charset="utf-8"></script>
<script src="lib/queue.v1.min.js" type="text/javascript" charset="utf-8"></script>
<script src="lib/underscore-min.js" type="text/javascript" charset="utf-8"></script>
<script src="js/base.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>

