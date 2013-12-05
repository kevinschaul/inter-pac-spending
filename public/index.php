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
  <button onclick='p.drawLinks();'>Draw lines</button>

  <div class='stages'>
    <div class='stage stage-1' data-stage='1'>1</div>
    <div class='stage stage-2' data-stage='2'>2</div>
    <div class='stage stage-3' data-stage='3'>3</div>
  </div>
  <div class='clear'></div>

  <div id='target'></div>
</div>

<script src="lib/d3.v3.js" type="text/javascript" charset="utf-8"></script>
<script src="lib/underscore-min.js" type="text/javascript" charset="utf-8"></script>
<script src="lib/queue.v1.min.js" type="text/javascript" charset="utf-8"></script>
<script src="js/base.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>

