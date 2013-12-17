<?php readfile('http://www.startribune.com/templates/vh?vid=236194001&sosp=/politics'); ?>

<link rel="stylesheet" href="css/base.css" />

<div class='graphic'>

  <div class='intro'>

    <p>
      Spending in Minnesota politics may be best described as a web of
      influence. Nearly all of the state's top political donors are
      related to each other in some fashion. Donations between PACs reveal a
      tightly knit network of groups.
    </p>

    <p>
      Minnesota's leading political donor, Alliance for a Better Minnesota,
      receieved XX percent of its $9.9 million from other PACS over
      the past three election cycles. WIN Minnesota, one of Alliance's largest
      donors, chose to influence elections indirectly by giving all of its
      money to other PACs instead of spending it directly.
    </p>

    <p>
      The complex web leads us to a firm conclusion: In Minnesota,
      political spending is a team sport.
    </p>

  </div>

  <div class='button-wrapper'>
    <div class='button' data-show='issue'>
      <div class='title'>Issue</div>
    </div>
    <div class='button' data-show='labor'>
      <div class='title'>Labor</div>
    </div>
    <div class='button' data-show='biz'>
      <div class='title'>Business</div>
    </div>
    <div class='button' data-show='indian'>
      <div class='title'>Indian</div>
    </div>
    <div class='button' data-show='lawyers'>
      <div class='title'>Lawyers</div>
    </div>
  </div>
  <div class='clear'></div>

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
</div>


<script src="lib/d3.v3.min.js" type="text/javascript" charset="utf-8"></script>
<script src="lib/queue.v1.min.js" type="text/javascript" charset="utf-8"></script>
<script src="lib/underscore-min.js" type="text/javascript" charset="utf-8"></script>
<script src="js/base.js" type="text/javascript" charset="utf-8"></script>

<?php readfile('http://www.startribune.com/templates/vf?vid=236194001&sosp=/politics'); ?>

