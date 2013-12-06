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
  <div id='chart-wrapper'>
    <div id='tooltip-target'></div>
    <div id='chart-target'></div>
  </div>
  <div class='col'>
    <span class='box receiver'></span><h3>Receiver PACs</h3>
    <p>These PACs receive the bulk of their money from other PACs. Some more text describing their general properties and tactics.</p>
    <h4>Top Receiver PACs</h4>
    <ol>
      <li class='pac-hover pacid-80024' data-pacid='80024'>Alliance for a Better Minnesota Action Fund</li>
      <li class='pac-hover pacid-30593' data-pacid='30593'>North Central States Carpenters PAC</li>
      <li class='pac-hover pacid-70007' data-pacid='70007'>Coalition of MN Businesses PAC</li>
    </ol>
  </div>
  <div class='col'>
    <span class='box feeder'></span><h3>Feeder PACs</h3>
    <p>These PACs spend most of their money directly to other PACs. Some more text describing their general properties and tactics.</p>
    <h4>Top Feeder PACs</h4>
    <ol>
      <li class='pac-hover pacid-30625' data-pacid='30625'>WIN Minnesota Political Action Fund</li>
      <li class='pac-hover pacid-30204' data-pacid='30204'>AFSCME</li>
      <li class='pac-hover pacid-41051' data-pacid='41051'>Minnesota Future LLC</li>
    </ol>
  </div>
  <div id='legend-target'></div>
  <div class='clear'></div>

  <div class='sentence'>
    If I donate <input type='text' /> to <select></select>, <button>Go</button>
  </div>

</div>

  <button onclick='p.drawLinks();'>Draw lines</button>

  <div class='stages'>
    <div class='stage stage-1' data-stage='1'>1</div>
    <div class='stage stage-2' data-stage='2'>2</div>
    <div class='stage stage-3' data-stage='3'>3</div>
  </div>
  <div class='clear'></div>


<script id='tooltip-template' type='text/template'>
  <div class='name'><%= name %></div>
  <div class='info-wrapper'>
    <div class='received-total'>
      <span class='label'>Receieved: </span>
      <span class='value'><%= receivedTotal %></span>
      <div class='clear'></div>
    </div>
    <div class='spent-total'>
      <span class='label'>Spent: </span>
      <span class='value'><%= spentTotal %></span>
      <div class='clear'></div>
    </div>
  </div>
</script>

<script src="lib/d3.v3.js" type="text/javascript" charset="utf-8"></script>
<script src="lib/underscore-min.js" type="text/javascript" charset="utf-8"></script>
<script src="lib/queue.v1.min.js" type="text/javascript" charset="utf-8"></script>
<script src="js/base.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>

