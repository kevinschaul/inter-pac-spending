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
  <div class='show-wrapper'>
    <div class='show pro-dfl'>
      <div class='button' data-show='pro-dfl'>
        <div class='title'>Pro DFL</div>
      </div>
      <div class='description'>Some PACs send their donations to the DFL party and its candidates. About XX percent of PAC spending is done by pro-DFL groups.</div>
    </div>
    <div class='show ie'>
      <div class='button' data-show='ie'>
        <div class='title'>IE-designated</div>
      </div>
      <div class='description'>Some PACs spend their money on independent expenditures. These donations are independent of candidates and parties.</div>
    </div>
    <div class='show to-candidates'>
      <div class='button' data-show='to-candidates'>
        <div class='title'>To Candidates</div>
      </div>
      <div class='description'>Other PACs concentrate their spending directly on candidates and parties. These donations are limited to $XX per group per election cycle.</div>
    </div>
    <div class='show feeder'>
      <div class='button' data-show='feeder'>
        <div class='title'>Feeders</div>
      </div>
      <div class='description'>Some PACs give most of their money to other PACs. These PACs influence indirectly by having others ultimately spend their money.</div>
    </div>
    <div class='clear'></div>
  </div>

  <div id='graph'></div>

  <div class='sidebar'>
    <script id='node-info-template' type='text/template'>
      <div class='name'><%= pac.Committee %></div>

      <div class='info'>
        A <span class='info-value'><%= pac.cat2 %> <%= pac.stype %></span> based in <span class='info-value'><%= pac.CommCity %>, <%= pac.CommState %></span>.
      </div>
      <div class='info'>
        Spent <span class='info-value'><%= pac.totspendFormatted %></span> over the past three election cycles.
      </div>
      <div class='info'>
        Had <span class='info-value'><%= pac.endcash2012Formatted %></span> on hand at the end of 2012.
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

