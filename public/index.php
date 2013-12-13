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
    <div class='title'>Top DFL Spenders</div>
    <div class='show pro-dfl'>
      <div class='button' data-show='pro-dfl'>
        <div class='label'>Independent Expenditures</div>
      </div>
      <div class='description'>Some PACs send their donations to the DFL party and its candidates. About XX percent of PAC spending is done by pro-DFL groups.</div>
      <div class='party dfl'>
        <ol>
          <li>Alliance for a Better Minnesota Action Fund</li>
          <li>Alliance for a Better Minnesota</li>
          <li>Education Minn PAC</li>
        </ol>
      </div>
    </div>
    <div class='show ie'>
      <div class='button' data-show='ie'>
        <div class='label'>To Candidates</div>
      </div>
      <div class='description'>Some PACs spend their money on independent expenditures. These donations are independent of candidates and parties.</div>
    </div>
    <div class='show to-candidates'>
      <div class='button' data-show='to-candidates'>
        <div class='label'>To Parties</div>
      </div>
      <div class='description'>Other PACs concentrate their spending directly on candidates and parties. These donations are limited to $XX per group per election cycle.</div>
    </div>
    <div class='clear'></div>
  </div>

  <div id='graph'></div>

  <div class='show-wrapper'>
    <div class='show pro-dfl'>
      <div class='button' data-show='pro-dfl'>
        <div class='title'>Independent Expenditures</div>
      </div>
      <div class='description'>Some PACs send their donations to the DFL party and its candidates. About XX percent of PAC spending is done by pro-DFL groups.</div>
      <div class='party dfl'>
        <ol>
          <li>Alliance for a Better Minnesota Action Fund</li>
          <li>Alliance for a Better Minnesota</li>
          <li>Education Minn PAC</li>
        </ol>
      </div>
    </div>
    <div class='show ie'>
      <div class='button' data-show='ie'>
        <div class='title'>To Candidates</div>
      </div>
      <div class='description'>Some PACs spend their money on independent expenditures. These donations are independent of candidates and parties.</div>
    </div>
    <div class='show to-candidates'>
      <div class='button' data-show='to-candidates'>
        <div class='title'>To Parties</div>
      </div>
      <div class='description'>Other PACs concentrate their spending directly on candidates and parties. These donations are limited to $XX per group per election cycle.</div>
    </div>
    <div class='clear'></div>
  </div>

  <div class='sidebar'>
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

