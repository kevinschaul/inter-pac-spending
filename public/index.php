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

  <div class='infobar'>
    <script id='node-info-template' type='text/template'>
      <div class='name'><%= pac.Committee %></div>

    <div class='info'>
      A <span class='info-value'><%= pac.cat2 %> <%= pac.stype %></span> based in <span class='info-value'><%= pac.CommCity %>, <%= pac.CommState %></span>.
    </div>
    <div class='info'>
      Spent <span class='info-value'><%= pac.totspendFormatted %></span> over the past three election cycles.
    </div>
    <div class='info'>
      Raised <span class='info-value'><%= pac.totreceivedFormatted %></span> in the same time period.
    </div>
    <div class='info'>
      Had <span class='info-value'><%= pac.endcash2012Formatted %></span> on hand at the end of 2012.
    </div>
    </script>
    <div id='node-info-target'>
      <div class='help'>Touch a pac below for more information.</div>
    </div>
  </div>

  <div id='graph'></div>

  Most PACs tend to focus their spending in certain areas.
  <div class='show-wrapper'>
    <div class='show'>
      <div class='button' data-show='issue'>
        <div class='title'>Issue</div>
      </div>
    </div>
    <div class='show'>
      <div class='button' data-show='labor'>
        <div class='title'>Labor</div>
      </div>
    </div>
    <div class='show'>
      <div class='button' data-show='biz'>
        <div class='title'>Business</div>
      </div>
    </div>
    <div class='show'>
      <div class='button' data-show='indian'>
        <div class='title'>Indian</div>
      </div>
    </div>
    <div class='show'>
      <div class='button' data-show='lawyers'>
        <div class='title'>Lawyers</div>
      </div>
    </div>
    <div class='clear'></div>
  </div>

</div>


<script src="lib/d3.v3.min.js" type="text/javascript" charset="utf-8"></script>
<script src="lib/queue.v1.min.js" type="text/javascript" charset="utf-8"></script>
<script src="lib/underscore-min.js" type="text/javascript" charset="utf-8"></script>
<script src="js/base.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>

