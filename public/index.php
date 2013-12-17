<?php readfile('http://www.startribune.com/templates/vh?vid=236194001&sosp=/politics'); ?>

<link rel="stylesheet" href="css/base.css" />
<style>
.fallback {
  display: none;
}
.fallback-info {
  width: 750px;
  padding: 10px 20px;
  font-family: Arial, sans-serif;
  font-size: 16px;
  text-align: center;
  background-color: #AAC2AF;
  margin: 60px auto;
}
</style>
<!--[if lte IE 8]>
<style>
.fallback {
  display: block !important;
}
.control-wrapper,
.infobar,
#graph {
  display: none;
}
</style>
<![endif]-->

<div class='graphic'>

  <div class='intro'>

    <p>
      Minnesota's leading political donor, Alliance for a Better Minnesota,
      receieved nearly all of its $9.9 million from other PACs in
      the past three election cycles. WIN Minnesota, one of Alliance's largest
      donors, chose to influence indirectly by giving all of its
      money to other PACs instead of spending it directly.
    </p>

    <p>
      The complex web leads us to a firm conclusion: In Minnesota,
      political spending is a team sport.
    </p>

  </div>

  <div class="fallback fallback-info">Interactive portions of this graphic are not available in this version of Internet Explorer.</div>

  <div class='control-wrapper'>
    <div class='label'>Highlight PACs by category:</div>
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
      <div class='button' data-show='lawyers'>
        <div class='title'>Lawyers</div>
      </div>
    </div>
    <div class='clear'></div>
  </div>

  <div class='graph-wrapper'>
    <div class='infobar'>
      <script id='node-info-template' type='text/template'>
      <div class='name'><%= pac.Committee %></div>

      <div class='info'>
        <span class='info-label'>Based in:</span>
        <span class='info-value'><%= pac.CommCity %>, <%= pac.CommState %></span>
        <div class='clear'></div>
      </div>

      <div class='info major'>
        <span class='info-label'>Spent:</span>
        <span class='info-value'><%= pac.totspendFormatted %></span>
        <div class='clear'></div>
      </div>
      <div class='info minor'>
        <span class='info-label'>To PACs:</span>
        <span class='info-value'><%= pac.topacFormatted %></span>
        <div class='clear'></div>
      </div>

      <div class='info major'>
        <span class='info-label'>Received:</span>
        <span class='info-value'><%= pac.totreceivedFormatted %></span>
        <div class='clear'></div>
      </div>
      <div class='info minor'>
        <span class='info-label'>From PACs:</span>
        <span class='info-value'><%= pac.frompacFormatted %></span>
        <div class='clear'></div>
      </div>

      </script>
      <div id='node-info-target'>
        <div class='help'>Touch a PAC bubble to the right for more information.</div>
      </div>
    </div>

    <div id='graph'></div>
    <img class="fallback" src="img/legend.png" alt="fallback-legend" style="float: left; margin-right: 20px;" />
    <img class="fallback" src="img/issue.png" alt="fallback" style="float: left;" />
    <div class='clear'></div>
  </div>

  <div class='notes'>Data from last three election cycles (2006-2012). PACs that spent less than $50,000 in this period are not included.</div>
  <div class='notes'>Source: Star Tribune analysis of Minnesota Campaign Finance and Disclosure Board data</div>
</div>


<script src="lib/d3.v3.min.js" type="text/javascript" charset="utf-8"></script>
<script src="lib/queue.v1.min.js" type="text/javascript" charset="utf-8"></script>
<script src="lib/underscore-min.js" type="text/javascript" charset="utf-8"></script>
<script src="js/base.js" type="text/javascript" charset="utf-8"></script>

<?php readfile('http://www.startribune.com/templates/vf?vid=236194001&sosp=/politics'); ?>

