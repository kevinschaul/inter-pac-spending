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
      Alliance for a Better Minnesota, the state&rsquo;s leading political
      spender, received nearly all of its $9.9 million from other PACs in the
      past three election cycles. WIN Minnesota, one of Alliance&rsquo;s
      largest donors, chose to influence indirectly by giving all of its money
      to other PACs instead of spending it directly.
    </p>

    <p>
      The complex web leads us to a firm conclusion: In Minnesota,
      political spending is a team sport.
    </p>

  </div>

  <div class="fallback fallback-info">Interactive portions of this graphic are not available in this version of Internet Explorer.</div>

  <div class='control-wrapper'>
    <div class='label'>Highlight PAC networks by category:</div>
    <div class='button-wrapper'>
      <div class='button active' data-show='issue'>
        <div class='title'>Advocacy</div>
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
      <div class='node-info-target'>
        <div class='help'>Touch a PAC bubble for more information.</div>
      </div>
    </div>

    <div id='graph'></div>
    <img class="fallback" src="img/legend.png" alt="fallback-legend" style="float: left; margin-left: 70px; margin-right: 20px;" />
    <img class="fallback" src="img/fallback.png" alt="fallback" style="float: left;" />
    <div class='mobile chart-target'>
      <svg width='100%' height='1'>
        <g class='chart'>
<path class="link from-30007 to-40295" marker-end="url(#triangle)" d="M659.3728081611915,310.70762844103336L580.0706723556658,295.35931129127556" style="opacity: 0.1;"></path>
<path class="link from-30011 to-40933" marker-end="url(#triangle)" d="M477.3562027884702,356.1980272652945L421.934847165617,340.1731869508937" style="opacity: 0.1;"></path>
<path class="link from-30011 to-70026" marker-end="url(#triangle)" d="M477.4261949360432,355.96913684185165L444.21254730881066,345.2547939970575" style="opacity: 0.1;"></path>
<path class="link from-30011 to-40295" marker-end="url(#triangle)" d="M491.27354276777464,353.8629845206253L571.7489059714266,297.1450107795316" style="opacity: 0.1;"></path>
<path class="link from-30011 to-30625" marker-end="url(#triangle)" d="M481.81878160702547,365.5780248441499L464.49245064549734,406.4220227603738" style="opacity: 0.1;"></path>
<path class="link from-30013 to-30625" marker-end="url(#triangle)" d="M515.1380839322958,378.29957458201557L474.3400721104128,413.5931114753492" style="opacity: 0.1;"></path>
<path class="link from-30013 to-30025" marker-end="url(#triangle)" d="M515.4062960340309,369.43626070782153L482.4823507612192,337.2745666730159" style="opacity: 0.1;"></path>
<path class="link from-30013 to-40295" marker-end="url(#triangle)" d="M523.8382012213791,368.6397117737326L572.8847144332764,298.2749282815526" style="opacity: 0.1;"></path>
<path class="link from-30019 to-40295" marker-end="url(#triangle)" d="M583.7387317628005,353.10485832754017L576.1710297940484,299.06106707940756" style="opacity: 0.1;"></path>
<path class="link from-30019 to-30025" marker-end="url(#triangle)" d="M579.7153487031478,356.6976148287063L485.24678886249353,332.36572741172637" style="opacity: 0.1;"></path>
<path class="link from-30022 to-30011" marker-end="url(#triangle)" d="M506.66779690942707,282.4771122240321L487.0357733039883,350.8488515186292" style="opacity: 0.1;"></path>
<path class="link from-30022 to-70026" marker-end="url(#triangle)" d="M503.97354218805793,280.86147622057166L442.9888053395394,340.00495146533507" style="opacity: 0.1;"></path>
<path class="link from-30022 to-40295" marker-end="url(#triangle)" d="M514.2430998461055,278.1835139948903L571.0596090542163,293.29179036901" style="opacity: 0.1;"></path>
<path class="link from-30025 to-99999" marker-end="url(#triangle)" d="M466.2272483664714,336.57609992892833L451.3131412959062,348.83023620879806" style="opacity: 0.1;"></path>
<path class="link from-30025 to-30623" marker-end="url(#triangle)" d="M475.6872667561619,340.5175252929338L478.78864042701093,373.6058618898733" style="opacity: 0.1;"></path>
<path class="link from-30025 to-80024" marker-end="url(#triangle)" d="M463.8444846921006,331.1225537682441L428.18579784419563,336.00390146612756" style="opacity: 0.1;"></path>
<path class="link from-30025 to-40933" marker-end="url(#triangle)" d="M463.87164912317724,331.30901081554066L422.0894185551628,337.76461481075" style="opacity: 0.1;"></path>
<path class="link from-30025 to-40295" marker-end="url(#triangle)" d="M484.98324686020925,326.04496740525724L571.1620434192184,296.0029594847392" style="opacity: 0.1;"></path>
<path class="link from-30025 to-70026" marker-end="url(#triangle)" d="M464.5084568008574,333.6567943967288L444.0988530782412,341.72443791571834" style="opacity: 0.1;"></path>
<path class="link from-30031 to-99999" marker-end="url(#triangle)" d="M541.5807787503952,366.7164821611699L456.4549797359557,363.9556706424667" style="opacity: 0.1;"></path>
<path class="link from-30031 to-40295" marker-end="url(#triangle)" d="M550.5214825472794,360.7462878792617L573.8964762024257,298.8078482958465" style="opacity: 0.1;"></path>
<path class="link from-30037 to-99999" marker-end="url(#triangle)" d="M451.9836597151602,289.1280424264028L439.2019315082379,341.2061143274005" style="opacity: 0.1;"></path>
<path class="link from-30037 to-30025" marker-end="url(#triangle)" d="M461.51465018510805,288.79039253804797L471.31966186031616,319.2424142059911" style="opacity: 0.1;"></path>
<path class="link from-30037 to-30602" marker-end="url(#triangle)" d="M450.2245052281696,255.68162822269602L425.19562929618735,186.2042016784485" style="opacity: 0.1;"></path>
<path class="link from-30037 to-70026" marker-end="url(#triangle)" d="M452.1251647696261,289.1621490174369L440.4371904323335,338.55569363286867" style="opacity: 0.1;"></path>
<path class="link from-30037 to-30550" marker-end="url(#triangle)" d="M457.8719982499804,254.73092729688085L461.95338819780613,213.39179295879387" style="opacity: 0.1;"></path>
<path class="link from-30037 to-30093" marker-end="url(#triangle)" d="M439.44251259224785,266.96679824605496L401.8462057964833,255.32965007283377" style="opacity: 0.1;"></path>
<path class="link from-30037 to-40933" marker-end="url(#triangle)" d="M447.2021823025008,287.1686399590722L419.4228161618966,333.81167342484326" style="opacity: 0.1;"></path>
<path class="link from-30037 to-80024" marker-end="url(#triangle)" d="M444.8300367891877,285.4729969473054L417.88206564169263,317.20568125334194" style="opacity: 0.1;"></path>
<path class="link from-30037 to-30011" marker-end="url(#triangle)" d="M461.6812272094238,288.7358350934211L482.4020234928392,350.9459573481724" style="opacity: 0.1;"></path>
<path class="link from-30037 to-40295" marker-end="url(#triangle)" d="M473.3477357747717,275.35719082980654L570.9832044764855,293.62956852610336" style="opacity: 0.1;"></path>
<path class="link from-30058 to-99999" marker-end="url(#triangle)" d="M491.859238039645,404.2740007406976L452.3074884687167,376.30794260130796" style="opacity: 0.1;"></path>
<path class="link from-30058 to-30025" marker-end="url(#triangle)" d="M496.98778424509004,400.5333040847987L477.94847283985564,340.0609505441916" style="opacity: 0.1;"></path>
<path class="link from-30058 to-30623" marker-end="url(#triangle)" d="M494.27105273257126,401.87271591054025L483.5579348274174,386.5798903348015" style="opacity: 0.1;"></path>
<path class="link from-30058 to-30625" marker-end="url(#triangle)" d="M490.94843241712164,414.16855294924915L478.4297954983824,419.93827457160734" style="opacity: 0.1;"></path>
<path class="link from-30058 to-30011" marker-end="url(#triangle)" d="M497.183636067563,400.47385176975115L487.0718804883154,365.88510888169736" style="opacity: 0.1;"></path>
<path class="link from-30058 to-70026" marker-end="url(#triangle)" d="M493.2635032243823,402.68106475272504L442.76538326208646,347.5084641195328" style="opacity: 0.1;"></path>
<path class="link from-30058 to-30608" marker-end="url(#triangle)" d="M506.30239171373915,402.3530598136154L552.1419462816355,346.91311579528184" style="opacity: 0.1;"></path>
<path class="link from-30058 to-30225" marker-end="url(#triangle)" d="M499.44842405833344,400.0884846700982L496.362128938317,341.5421319392929" style="opacity: 0.1;"></path>
<path class="link from-30058 to-40098" marker-end="url(#triangle)" d="M502.5984962453579,419.5915468272439L518.4247136503021,477.3141483071652" style="opacity: 0.1;"></path>
<path class="link from-30060 to-30625" marker-end="url(#triangle)" d="M530.734318410512,402.38165369422717L479.18299029318473,421.7420075936705" style="opacity: 0.1;"></path>
<path class="link from-30060 to-30025" marker-end="url(#triangle)" d="M532.6277382878444,394.708454281312L481.934034938586,337.79822427233324" style="opacity: 0.1;"></path>
<path class="link from-30060 to-30608" marker-end="url(#triangle)" d="M539.4252858697519,393.2780765433614L554.0809318358853,347.9771517917185" style="opacity: 0.1;"></path>
<path class="link from-30060 to-40295" marker-end="url(#triangle)" d="M539.657473528658,393.35772564894546L573.9521640133083,298.82845697583355" style="opacity: 0.1;"></path>
<path class="link from-30060 to-30011" marker-end="url(#triangle)" d="M531.8006318383059,395.5843001905504L491.00853654290836,363.23574009943854" style="opacity: 0.1;"></path>
<path class="link from-30064 to-70026" marker-end="url(#triangle)" d="M489.72114212284396,260.2157758778909L441.941503053299,339.1710194084832" style="opacity: 0.1;"></path>
<path class="link from-30064 to-30025" marker-end="url(#triangle)" d="M491.06052174741166,260.7646534658503L477.19715131059485,319.0135326525521" style="opacity: 0.1;"></path>
<path class="link from-30064 to-40295" marker-end="url(#triangle)" d="M496.3974922442793,258.16391673016767L571.3258357831623,292.55116499480414" style="opacity: 0.1;"></path>
<path class="link from-30092 to-30025" marker-end="url(#triangle)" d="M528.2222124517131,421.69175917230206L480.1613558413907,339.08341272984234" style="opacity: 0.1;"></path>
<path class="link from-30092 to-30608" marker-end="url(#triangle)" d="M532.2523374595424,421.2148130734744L554.2020977420951,348.01491306307895" style="opacity: 0.1;"></path>
<path class="link from-30092 to-30623" marker-end="url(#triangle)" d="M526.9656246598942,422.7223564115542L484.8124979902376,385.4594388145361" style="opacity: 0.1;"></path>
<path class="link from-30093 to-30037" marker-end="url(#triangle)" d="M401.8462057964833,255.32965007283377L439.44251259224785,266.96679824605496" style="opacity: 0.1;"></path>
<path class="link from-30093 to-30025" marker-end="url(#triangle)" d="M399.93719657734067,258.586449380382L466.75091937953135,322.1135006579864" style="opacity: 0.1;"></path>
<path class="link from-30093 to-80024" marker-end="url(#triangle)" d="M394.3663432638724,261.1496889867106L396.9078798653657,310.11301453145904" style="opacity: 0.1;"></path>
<path class="link from-30093 to-30602" marker-end="url(#triangle)" d="M397.1286145906155,245.2421633171877L421.8274909108397,186.12006399221244" style="opacity: 0.1;"></path>
<path class="link from-30098 to-30025" marker-end="url(#triangle)" d="M374.201336355353,327.8125989012433L463.74535426771916,329.44216809795626" style="opacity: 0.1;"></path>
<path class="link from-30098 to-99999" marker-end="url(#triangle)" d="M373.6754533957186,329.76595612047066L413.990676720458,352.19890017453105" style="opacity: 0.1;"></path>
<path class="link from-30111 to-40295" marker-end="url(#triangle)" d="M560.1992675534995,197.46081514768315L574.8077010752903,289.91177145160935" style="opacity: 0.1;"></path>
<path class="link from-30116 to-70004" marker-end="url(#triangle)" d="M716.7138289622977,283.38736262941245L773.248995535512,323.21704590685886" style="opacity: 0.1;"></path>
<path class="link from-30116 to-70001" marker-end="url(#triangle)" d="M714.9186894167383,285.1150432042733L754.8189612517693,346.62402101317895" style="opacity: 0.1;"></path>
<path class="link from-30116 to-40295" marker-end="url(#triangle)" d="M704.8139918750544,280.3193581881672L580.1274418939028,293.9768026500406" style="opacity: 0.1;"></path>
<path class="link from-30116 to-41021" marker-end="url(#triangle)" d="M714.9660593673037,274.1242159286318L754.8977851695053,213.7137236694117" style="opacity: 0.1;"></path>
<path class="link from-30119 to-30011" marker-end="url(#triangle)" d="M396.0131634186043,380.0410229051293L477.271006976143,360.2265529867015" style="opacity: 0.1;"></path>
<path class="link from-30119 to-99999" marker-end="url(#triangle)" d="M395.60656022379237,378.7849993143465L412.80680807080114,371.7755393991498" style="opacity: 0.1;"></path>
<path class="link from-30119 to-70026" marker-end="url(#triangle)" d="M394.5071782811712,376.8317340029229L435.0294764441863,346.76634367194436" style="opacity: 0.1;"></path>
<path class="link from-30119 to-30625" marker-end="url(#triangle)" d="M394.5279606698113,387.458444350328L432.2932825410005,415.24993935388983" style="opacity: 0.1;"></path>
<path class="link from-30119 to-30331" marker-end="url(#triangle)" d="M386.0983870559627,391.0151829470336L373.85234783462766,479.2969201023771" style="opacity: 0.1;"></path>
<path class="link from-30119 to-40268" marker-end="url(#triangle)" d="M389.15204235097633,373.4066029691058L415.5273725533609,246.92567177974644" style="opacity: 0.1;"></path>
<path class="link from-30123 to-40295" marker-end="url(#triangle)" d="M637.9893431986678,219.0111439856392L578.4786380572227,290.9171468542794" style="opacity: 0.1;"></path>
<path class="link from-30124 to-40295" marker-end="url(#triangle)" d="M680.1713236343588,218.1613125813924L579.2666083571629,291.75488800050374" style="opacity: 0.1;"></path>
<path class="link from-30124 to-41021" marker-end="url(#triangle)" d="M692.9483087141061,213.6193492756649L753.0214536139597,210.4354040594552" style="opacity: 0.1;"></path>
<path class="link from-30128 to-40295" marker-end="url(#triangle)" d="M584.5338941496723,204.27727334198036L575.9890348135606,289.8779617106787" style="opacity: 0.1;"></path>
<path class="link from-30163 to-70004" marker-end="url(#triangle)" d="M726.5241266894878,302.1943351229344L772.4139102438335,324.6285951380549" style="opacity: 0.1;"></path>
<path class="link from-30163 to-70001" marker-end="url(#triangle)" d="M723.5655070835918,305.7614268727035L754.3001991348672,346.98509264127676" style="opacity: 0.1;"></path>
<path class="link from-30163 to-40714" marker-end="url(#triangle)" d="M713.3020917222302,289.06201738760444L695.9599005646236,254.19189353170017" style="opacity: 0.1;"></path>
<path class="link from-30163 to-30557" marker-end="url(#triangle)" d="M727.2037867977791,300.3623363081117L807.1639744736808,321.2743783281542" style="opacity: 0.1;"></path>
<path class="link from-30163 to-40295" marker-end="url(#triangle)" d="M707.8466599000961,297.6378554309507L580.1536251593867,294.5907642183086" style="opacity: 0.1;"></path>
<path class="link from-30163 to-41021" marker-end="url(#triangle)" d="M721.7288187522558,288.90234232667837L755.4867442396626,214.03842225250978" style="opacity: 0.1;"></path>
<path class="link from-30192 to-40295" marker-end="url(#triangle)" d="M647.050536427061,288.90142634470857L580.1409332774203,294.12071601806343" style="opacity: 0.1;"></path>
<path class="link from-30204 to-30593" marker-end="url(#triangle)" d="M369.59359394317613,395.7754512990436L404.27451103804066,401.0942111880722" style="opacity: 0.1;"></path>
<path class="link from-30204 to-99999" marker-end="url(#triangle)" d="M368.72098026579016,386.99122109299054L412.50652636410945,370.9980921319824" style="opacity: 0.1;"></path>
<path class="link from-30204 to-40933" marker-end="url(#triangle)" d="M365.61041054604397,381.62902712211906L412.28413733507756,342.2283093393564" style="opacity: 0.1;"></path>
<path class="link from-30218 to-70007" marker-end="url(#triangle)" d="M823.713126311294,446.5841020098937L790.3776449533333,411.98298393004194" style="opacity: 0.1;"></path>
<path class="link from-30224 to-40295" marker-end="url(#triangle)" d="M655.8254089079403,350.55822877926545L579.3216941341132,297.12878006352344" style="opacity: 0.1;"></path>
<path class="link from-30225 to-70026" marker-end="url(#triangle)" d="M487.8200959526777,334.7899698415985L444.3804137298934,342.70958400747315" style="opacity: 0.1;"></path>
<path class="link from-30225 to-40933" marker-end="url(#triangle)" d="M487.704812408797,333.86163499172403L422.14256459850736,338.2456720924301" style="opacity: 0.1;"></path>
<path class="link from-30225 to-40295" marker-end="url(#triangle)" d="M503.33569088449104,329.6982361152557L571.3725300595145,296.5083381966685" style="opacity: 0.1;"></path>
<path class="link from-30230 to-40714" marker-end="url(#triangle)" d="M666.9016053280308,199.91270848159084L689.8343888152626,242.37798766432934" style="opacity: 0.1;"></path>
<path class="link from-30230 to-40295" marker-end="url(#triangle)" d="M656.6567852690766,198.8417013223372L578.5216472770642,290.9531838531278" style="opacity: 0.1;"></path>
<path class="link from-30236 to-30331" marker-end="url(#triangle)" d="M395.7470700874935,426.8519251935992L374.96592163627577,479.58910632522776" style="opacity: 0.1;"></path>
<path class="link from-30236 to-30025" marker-end="url(#triangle)" d="M399.7929925722295,420.00411012920966L467.6977954365219,338.0527413885143" style="opacity: 0.1;"></path>
<path class="link from-30239 to-30599" marker-end="url(#triangle)" d="M504.38121094225863,129.23347815826054L532.7502175727784,239.3485284429345" style="opacity: 0.1;"></path>
<path class="link from-30242 to-40714" marker-end="url(#triangle)" d="M694.7113357075726,324.74417222385915L693.1456403090997,254.88644441627687" style="opacity: 0.1;"></path>
<path class="link from-30242 to-70001" marker-end="url(#triangle)" d="M699.9870838777005,332.1818794557587L751.0188608109297,351.3491405245947" style="opacity: 0.1;"></path>
<path class="link from-30242 to-40940" marker-end="url(#triangle)" d="M690.1063928532581,327.42956101162696L578.3806940364752,260.86353193173096" style="opacity: 0.1;"></path>
<path class="link from-30242 to-40295" marker-end="url(#triangle)" d="M689.5626052829952,328.66615761176297L579.9601322519039,295.80864184285565" style="opacity: 0.1;"></path>
<path class="link from-30242 to-70007" marker-end="url(#triangle)" d="M699.05171845659,333.7834598436052L773.4247897712228,396.1593888022069" style="opacity: 0.1;"></path>
<path class="link from-30245 to-99999" marker-end="url(#triangle)" d="M494.7836175772827,308.5558354774231L450.6782761550273,348.0905755085885" style="opacity: 0.1;"></path>
<path class="link from-30245 to-30025" marker-end="url(#triangle)" d="M495.22579886810075,309.02214997010316L482.38100640752265,321.90492756801603" style="opacity: 0.1;"></path>
<path class="link from-30245 to-30011" marker-end="url(#triangle)" d="M499.8164292949816,311.8192887453234L487.267512872753,350.9192912687345" style="opacity: 0.1;"></path>
<path class="link from-30245 to-30558" marker-end="url(#triangle)" d="M492.05138901037446,298.7990680827784L482.94348231828053,297.09720286088293" style="opacity: 0.1;"></path>
<path class="link from-30245 to-40933" marker-end="url(#triangle)" d="M492.8066774551231,305.47446459440414L421.6911679192385,336.38834411924256" style="opacity: 0.1;"></path>
<path class="link from-30245 to-70026" marker-end="url(#triangle)" d="M493.78287304843934,307.2650739787803L443.58578507191595,340.7444856389958" style="opacity: 0.1;"></path>
<path class="link from-30245 to-30608" marker-end="url(#triangle)" d="M512.3193707769655,308.00411416648956L551.2713798253037,338.7312013479459" style="opacity: 0.1;"></path>
<path class="link from-30245 to-40295" marker-end="url(#triangle)" d="M514.7374287040037,299.88877345464005L570.9224675309041,294.8902951581992" style="opacity: 0.1;"></path>
<path class="link from-30258 to-30225" marker-end="url(#triangle)" d="M504.9595294187117,232.61007600100697L496.6644598963083,325.1028802247897" style="opacity: 0.1;"></path>
<path class="link from-30258 to-40268" marker-end="url(#triangle)" d="M499.108817255105,227.29505269265206L420.52603542997906,242.02728419852897" style="opacity: 0.1;"></path>
<path class="link from-30258 to-40295" marker-end="url(#triangle)" d="M510.2273275683421,230.6648583270168L572.2215609082398,291.2476905645891" style="opacity: 0.1;"></path>
<path class="link from-30270 to-30025" marker-end="url(#triangle)" d="M502.2924673045886,349.3789695500652L483.5563047598143,335.9918413771207" style="opacity: 0.1;"></path>
<path class="link from-30270 to-99999" marker-end="url(#triangle)" d="M500.7766164155433,355.2851652853455L456.30943858217205,360.5537555487063" style="opacity: 0.1;"></path>
<path class="link from-30270 to-40933" marker-end="url(#triangle)" d="M500.83637891143985,352.8811923362131L422.0765906966713,339.55261503936487" style="opacity: 0.1;"></path>
<path class="link from-30270 to-30654" marker-end="url(#triangle)" d="M501.1266307025103,356.88707226280707L458.3130736488953,370.71020531528853" style="opacity: 0.1;"></path>
<path class="link from-30270 to-30608" marker-end="url(#triangle)" d="M517.3545282297093,352.2033892999358L550.189071323134,343.8311023077625" style="opacity: 0.1;"></path>
<path class="link from-30270 to-40295" marker-end="url(#triangle)" d="M515.443540917444,348.63434150394323L572.0937967969704,297.5770237426867" style="opacity: 0.1;"></path>
<path class="link from-30274 to-40295" marker-end="url(#triangle)" d="M570.4717908349539,169.9938010506745L575.341836820993,289.8589008580821" style="opacity: 0.1;"></path>
<path class="link from-30308 to-40295" marker-end="url(#triangle)" d="M631.6856665088073,170.87914715673764L577.4428399947873,290.2693350488269" style="opacity: 0.1;"></path>
<path class="link from-30316 to-30331" marker-end="url(#triangle)" d="M435.09762875189284,518.033241744051L377.44538291313415,486.44356087382016" style="opacity: 0.1;"></path>
<path class="link from-30316 to-30625" marker-end="url(#triangle)" d="M441.5721389549762,514.8164452279082L450.02640957609515,457.8399465604077" style="opacity: 0.1;"></path>
<path class="link from-30325 to-30599" marker-end="url(#triangle)" d="M539.1522673393399,120.98543726676421L534.0811516354637,239.20874942092928" style="opacity: 0.1;"></path>
<path class="link from-30348 to-70026" marker-end="url(#triangle)" d="M581.5901777704702,419.6142548194457L443.8490495712608,346.1118751717134" style="opacity: 0.1;"></path>
<path class="link from-30348 to-70013" marker-end="url(#triangle)" d="M603.7295298544981,425.72384371989426L716.5178551889296,431.1794011568787" style="opacity: 0.1;"></path>
<path class="link from-30550 to-30037" marker-end="url(#triangle)" d="M461.95338819780613,213.39179295879387L457.8719982499804,254.73092729688085" style="opacity: 0.1;"></path>
<path class="link from-30550 to-30025" marker-end="url(#triangle)" d="M462.96212314104235,213.39081190228208L473.5733315660057,318.7716474565355" style="opacity: 0.1;"></path>
<path class="link from-30555 to-40295" marker-end="url(#triangle)" d="M604.9328088843375,225.4512918292463L577.3421992353726,290.2250461982232" style="opacity: 0.1;"></path>
<path class="link from-30557 to-70007" marker-end="url(#triangle)" d="M809.8246683833684,326.3035582201401L786.2129958783471,392.68102847877736" style="opacity: 0.1;"></path>
<path class="link from-30557 to-41035" marker-end="url(#triangle)" d="M813.746798306819,318.963179683397L850.3097308608747,269.8240158093056" style="opacity: 0.1;"></path>
<path class="link from-30558 to-99999" marker-end="url(#triangle)" d="M452.5917228156649,314.0894270080237L441.8971838273064,342.0487355135164" style="opacity: 0.1;"></path>
<path class="link from-30558 to-30623" marker-end="url(#triangle)" d="M465.41830294060975,315.0832435316442L477.96069553070976,373.7327457900778" style="opacity: 0.1;"></path>
<path class="link from-30558 to-30025" marker-end="url(#triangle)" d="M468.74599757382873,314.099749971816L470.7780430404405,319.43265144387414" style="opacity: 0.1;"></path>
<path class="link from-30558 to-70026" marker-end="url(#triangle)" d="M451.8599256546891,313.7948008328312L441.27084568546326,338.82850451442005" style="opacity: 0.1;"></path>
<path class="link from-30558 to-30654" marker-end="url(#triangle)" d="M458.08908205071316,315.4350062869235L452.2868520918834,365.77060345108896" style="opacity: 0.1;"></path>
<path class="link from-30558 to-40933" marker-end="url(#triangle)" d="M444.9492767418444,309.2264953065285L420.44694069455113,334.59442846652826" style="opacity: 0.1;"></path>
<path class="link from-30558 to-80024" marker-end="url(#triangle)" d="M442.6310063377898,306.6126366269056L422.3759077208869,321.957146668118" style="opacity: 0.1;"></path>
<path class="link from-30558 to-30011" marker-end="url(#triangle)" d="M468.535839796351,314.178637802523L482.16112098549075,351.0305861348924" style="opacity: 0.1;"></path>
<path class="link from-30558 to-40295" marker-end="url(#triangle)" d="M483.32672908233326,293.2417866807518L570.9046887161459,294.41829270162737" style="opacity: 0.1;"></path>
<path class="link from-30558 to-30225" marker-end="url(#triangle)" d="M475.5756169384807,309.99779116600325L490.50809182522386,327.1029427210616" style="opacity: 0.1;"></path>
<path class="link from-30558 to-30270" marker-end="url(#triangle)" d="M474.72363268198535,310.70560026441115L503.92847254277626,347.66184648099966" style="opacity: 0.1;"></path>
<path class="link from-30558 to-40268" marker-end="url(#triangle)" d="M445.687780184847,275.9664035455429L419.1752873412835,245.95904242350653" style="opacity: 0.1;"></path>
<path class="link from-30561 to-30654" marker-end="url(#triangle)" d="M539.2620970805397,388.79819458501936L458.5464095453513,374.2029687128969" style="opacity: 0.1;"></path>
<path class="link from-30561 to-30608" marker-end="url(#triangle)" d="M550.825527570217,380.37307787704594L555.1146600165065,348.2112835825244" style="opacity: 0.1;"></path>
<path class="link from-30561 to-30058" marker-end="url(#triangle)" d="M539.8093821428143,394.4172620748636L509.22323682555395,406.3887572428496" style="opacity: 0.1;"></path>
<path class="link from-30561 to-70026" marker-end="url(#triangle)" d="M539.9267170021711,386.57870123066414L444.0460235476461,345.7005401884532" style="opacity: 0.1;"></path>
<path class="link from-30561 to-40295" marker-end="url(#triangle)" d="M552.1671024527081,380.6431829663139L574.3191808052005,298.94456836626034" style="opacity: 0.1;"></path>
<path class="link from-30561 to-40098" marker-end="url(#triangle)" d="M546.2003988634428,400.47594218290294L520.7428860392686,477.37454550042924" style="opacity: 0.1;"></path>
<path class="link from-30563 to-40295" marker-end="url(#triangle)" d="M663.1328685757295,269.02474370325973L579.9712242778204,293.18978156280696" style="opacity: 0.1;"></path>
<path class="link from-30584 to-40295" marker-end="url(#triangle)" d="M658.643627889787,238.22758622634558L579.3600819375735,291.8878987815958" style="opacity: 0.1;"></path>
<path class="link from-30587 to-40295" marker-end="url(#triangle)" d="M602.6784536835075,183.41450582326644L576.6278836763842,289.98737153450315" style="opacity: 0.1;"></path>
<path class="link from-30588 to-30608" marker-end="url(#triangle)" d="M563.3267022523283,429.60454721484047L556.3925947696456,348.2416784648759" style="opacity: 0.1;"></path>
<path class="link from-30588 to-30011" marker-end="url(#triangle)" d="M559.9722309075045,431.19563479831083L490.49471612178496,363.8212861098133" style="opacity: 0.1;"></path>
<path class="link from-30593 to-99999" marker-end="url(#triangle)" d="M423.91656655514157,389.58558806559506L425.8426743039115,384.446924487617" style="opacity: 0.1;"></path>
<path class="link from-30593 to-30025" marker-end="url(#triangle)" d="M427.6332331131834,391.6345457858092L468.06488962973714,338.343867297054" style="opacity: 0.1;"></path>
<path class="link from-30593 to-40933" marker-end="url(#triangle)" d="M418.2689858800289,388.6612138615221L416.7507123786421,344.2110540048407" style="opacity: 0.1;"></path>
<path class="link from-30593 to-30654" marker-end="url(#triangle)" d="M429.50953281791885,393.3320985861015L446.19028847186706,377.82370531887364" style="opacity: 0.1;"></path>
<path class="link from-30593 to-30623" marker-end="url(#triangle)" d="M432.51262938208606,398.2007923949767L472.7555636138941,383.218673998084" style="opacity: 0.1;"></path>
<path class="link from-30593 to-30011" marker-end="url(#triangle)" d="M430.8966922642494,395.07207660883915L478.40257129985014,362.773141298437" style="opacity: 0.1;"></path>
<path class="link from-30593 to-80024" marker-end="url(#triangle)" d="M414.2865047662924,389.35473162876093L407.63426081952207,368.63643213745945" style="opacity: 0.1;"></path>
<path class="link from-30593 to-70026" marker-end="url(#triangle)" d="M423.52661722152106,389.4456743581207L437.5345889896919,348.59830396054036" style="opacity: 0.1;"></path>
<path class="link from-30593 to-30225" marker-end="url(#triangle)" d="M429.6301922949629,393.4634726218979L489.82435160127983,338.84977654053046" style="opacity: 0.1;"></path>
<path class="link from-30594 to-30025" marker-end="url(#triangle)" d="M437.9481015467642,222.8878111114058L471.11453060254405,319.31071042616304" style="opacity: 0.1;"></path>
<path class="link from-30599 to-30025" marker-end="url(#triangle)" d="M531.3016744405825,247.5053637732154L480.8690216276594,320.6473711506253" style="opacity: 0.1;"></path>
<path class="link from-30599 to-30608" marker-end="url(#triangle)" d="M534.8775849967523,248.20069617639118L554.6108000700165,336.63186137437935" style="opacity: 0.1;"></path>
<path class="link from-30599 to-40295" marker-end="url(#triangle)" d="M536.77492197828,247.27601565988206L572.594644928435,290.90554885096304" style="opacity: 0.1;"></path>
<path class="link from-30602 to-30037" marker-end="url(#triangle)" d="M425.19562929618735,186.2042016784485L450.2245052281696,255.68162822269602" style="opacity: 0.1;"></path>
<path class="link from-30606 to-30060" marker-end="url(#triangle)" d="M598.0073110200955,490.3651167147292L541.1696653367907,405.7254232646196" style="opacity: 0.1;"></path>
<path class="link from-30608 to-30025" marker-end="url(#triangle)" d="M550.0776221295648,341.4649575627879L485.46019941649087,331.33315358021656" style="opacity: 0.1;"></path>
<path class="link from-30608 to-30623" marker-end="url(#triangle)" d="M550.6315507380116,345.01623622772706L485.8462782110386,377.518211599913" style="opacity: 0.1;"></path>
<path class="link from-30608 to-40295" marker-end="url(#triangle)" d="M558.125640660876,336.93052114158445L573.7750200063252,298.7600433698139" style="opacity: 0.1;"></path>
<path class="link from-30611 to-30025" marker-end="url(#triangle)" d="M487.92082829962925,432.76711983254967L476.0602576961013,340.4760903912687" style="opacity: 0.1;"></path>
<path class="link from-30611 to-30011" marker-end="url(#triangle)" d="M488.37686680743167,432.72714493328834L485.2437191720076,366.19090544874877" style="opacity: 0.1;"></path>
<path class="link from-30625 to-80024" marker-end="url(#triangle)" d="M439.97157391430983,408.2142770452943L414.06993046790535,365.69344514969026" style="opacity: 0.1;"></path>
<path class="link from-30625 to-99999" marker-end="url(#triangle)" d="M446.3171702826418,405.3970400981513L440.2488228853234,384.95198554838754" style="opacity: 0.1;"></path>
<path class="link from-30625 to-30623" marker-end="url(#triangle)" d="M466.10855664160795,407.17160920010224L476.23462813290604,387.1069921549204" style="opacity: 0.1;"></path>
<path class="link from-30625 to-30629" marker-end="url(#triangle)" d="M464.5553678188981,455.966825169202L491.8476050023396,519.8520104776416" style="opacity: 0.1;"></path>
<path class="link from-30625 to-30654" marker-end="url(#triangle)" d="M452.8171762914232,404.3091421866719L451.77291264007084,380.11413057459515" style="opacity: 0.1;"></path>
<path class="link from-30625 to-40933" marker-end="url(#triangle)" d="M443.8899860109019,406.2455283712545L418.6562387819383,343.80668823814807" style="opacity: 0.1;"></path>
<path class="link from-30628 to-40933" marker-end="url(#triangle)" d="M324.70797612861884,301.59080264050965L411.37019507203485,336.52694122894695" style="opacity: 1;"></path>
<path class="link from-30631 to-99999" marker-end="url(#triangle)" d="M414.1644156369561,461.80220356555856L429.37093839156626,385.45235904846106" style="opacity: 1;"></path>
<path class="link from-30635 to-40989" marker-end="url(#triangle)" d="M638.0324270587696,405.8839262660215L766.6021319789386,300.79384442977005" style="opacity: 1;"></path>
<path class="link from-30635 to-30625" marker-end="url(#triangle)" d="M630.1250408957453,409.2698578124704L480.6954366489386,427.88034846738077" style="opacity: 1;"></path>
<path class="link from-40019 to-40295" marker-end="url(#triangle)" d="M639.2165199790849,372.8520716258442L578.4465830866801,298.06998723756186" style="opacity: 0.1;"></path>
<path class="link from-40045 to-40295" marker-end="url(#triangle)" d="M629.8825025556594,194.5450885741426L577.7395276751712,290.41717645275094" style="opacity: 0.1;"></path>
<path class="link from-40069 to-41021" marker-end="url(#triangle)" d="M768.329547609066,132.1087232271539L757.8029008207479,206.05919868420852" style="opacity: 0.1;"></path>
<path class="link from-40094 to-30331" marker-end="url(#triangle)" d="M326.08484531318936,505.4484469721147L368.75961374595266,486.113969507333" style="opacity: 0.1;"></path>
<path class="link from-40275 to-40295" marker-end="url(#triangle)" d="M639.2882310424162,332.83823438581237L579.4929809921736,296.86482782836487" style="opacity: 0.1;"></path>
<path class="link from-40404 to-99999" marker-end="url(#triangle)" d="M476.7306731717763,299.608387338834L446.47964141436813,344.4315367357135" style="opacity: 0.1;"></path>
<path class="link from-40404 to-30025" marker-end="url(#triangle)" d="M480.2126127391552,301.05033002123275L476.7476801258946,318.9165052522239" style="opacity: 0.1;"></path>
<path class="link from-40404 to-80024" marker-end="url(#triangle)" d="M473.8397493045339,296.5088137963017L424.43702799531843,325.0610326036771" style="opacity: 0.1;"></path>
<path class="link from-40404 to-70026" marker-end="url(#triangle)" d="M476.0051242096811,299.0662735094546L442.562040525408,339.6111764397616" style="opacity: 0.1;"></path>
<path class="link from-40404 to-30636" marker-end="url(#triangle)" d="M475.730375093166,284.74410796390384L404.4671836098156,204.8027477588649" style="opacity: 0.1;"></path>
<path class="link from-40404 to-30608" marker-end="url(#triangle)" d="M489.7944381990135,297.1181592976484L551.0359918885899,339.051244781891" style="opacity: 0.1;"></path>
<path class="link from-40404 to-30011" marker-end="url(#triangle)" d="M482.4148781358882,301.2141897718931L484.53888454269685,350.5520959823229" style="opacity: 0.1;"></path>
<path class="link from-40404 to-40295" marker-end="url(#triangle)" d="M491.44068449763677,292.0589750298242L570.9061879429293,294.34728574255263" style="opacity: 0.1;"></path>
<path class="link from-40404 to-30623" marker-end="url(#triangle)" d="M481.73828716218844,301.2190353991371L479.6610099251509,373.57760606370897" style="opacity: 0.1;"></path>
<path class="link from-40550 to-40295" marker-end="url(#triangle)" d="M542.9780919093819,190.5064693560491L574.1476776472306,290.0663549079983" style="opacity: 0.1;"></path>
<path class="link from-40712 to-99999" marker-end="url(#triangle)" d="M438.01118756399376,401.8079186212441L436.2587548339092,385.75513588333297" style="opacity: 0.1;"></path>
<path class="link from-40712 to-30025" marker-end="url(#triangle)" d="M445.62072489760976,402.8377684275311L470.63835371193096,339.794902262152" style="opacity: 0.1;"></path>
<path class="link from-40712 to-80024" marker-end="url(#triangle)" d="M432.2536670898371,403.5816846583682L412.5544026532592,366.55724673115344" style="opacity: 0.1;"></path>
<path class="link from-40712 to-30011" marker-end="url(#triangle)" d="M449.3971875691308,404.9712944886305L480.1339988862842,364.5999960093239" style="opacity: 0.1;"></path>
<path class="link from-40712 to-70026" marker-end="url(#triangle)" d="M439.63145645796783,401.71415220356795L439.2681434348885,348.8811687830294" style="opacity: 0.1;"></path>
<path class="link from-40712 to-30058" marker-end="url(#triangle)" d="M455.55457678425984,415.6471457133973L490.11527393507083,411.2608400132748" style="opacity: 0.1;"></path>
<path class="link from-40712 to-40098" marker-end="url(#triangle)" d="M452.20904053713576,427.58613700565036L516.3507064436524,478.6814841578668" style="opacity: 0.1;"></path>
<path class="link from-40712 to-30623" marker-end="url(#triangle)" d="M451.41444856968155,406.79930776246607L474.220113107661,385.5928082409375" style="opacity: 0.1;"></path>
<path class="link from-40714 to-40295" marker-end="url(#triangle)" d="M686.8044346644681,250.67125250434265L579.8334046803484,292.7860071562852" style="opacity: 0.1;"></path>
<path class="link from-40714 to-41021" marker-end="url(#triangle)" d="M698.7228155593557,244.84302179150606L753.600968989767,212.3510691568914" style="opacity: 0.1;"></path>
<path class="link from-40745 to-99999" marker-end="url(#triangle)" d="M513.7462437821061,334.35403175348404L455.1196219431121,355.52250100280156" style="opacity: 0.1;"></path>
<path class="link from-40745 to-70026" marker-end="url(#triangle)" d="M513.4948184257067,333.33648822643573L444.4155425954896,342.92844220256586" style="opacity: 0.1;"></path>
<path class="link from-40745 to-40295" marker-end="url(#triangle)" d="M522.6676098844837,329.8441008633543L571.6852066300933,297.0522538985621" style="opacity: 0.1;"></path>
<path class="link from-40751 to-70007" marker-end="url(#triangle)" d="M760.6016176620977,473.51893950020195L778.8758856381396,414.7093891588419" style="opacity: 0.1;"></path>
<path class="link from-40756 to-70007" marker-end="url(#triangle)" d="M843.2163128270225,401.8266013336391L793.9278788314168,403.27894548394414" style="opacity: 0.1;"></path>
<path class="link from-40786 to-70001" marker-end="url(#triangle)" d="M690.6045028902989,367.7640788065713L750.5652197617204,356.5419936817179" style="opacity: 0.1;"></path>
<path class="link from-40786 to-40295" marker-end="url(#triangle)" d="M681.0633215934741,365.7843507628677L579.3621524545165,297.06988535052363" style="opacity: 0.1;"></path>
<path class="link from-40786 to-70013" marker-end="url(#triangle)" d="M688.0181918132439,373.31869024638684L718.7037079440591,427.6336124576836" style="opacity: 0.1;"></path>
<path class="link from-40789 to-70001" marker-end="url(#triangle)" d="M834.5223515643949,350.98028644111304L769.7789851735015,354.266768939858" style="opacity: 0.1;"></path>
<path class="link from-40815 to-30013" marker-end="url(#triangle)" d="M443.36255603492134,304.79391695561253L515.2283129039182,369.6258484051232" style="opacity: 0.1;"></path>
<path class="link from-40815 to-80023" marker-end="url(#triangle)" d="M446.57761629181914,297.73592408356654L519.6949256231749,306.6178210128146" style="opacity: 0.1;"></path>
<path class="link from-40815 to-80024" marker-end="url(#triangle)" d="M425.7590223679154,306.1929588875262L417.28456565886074,316.71142118041996" style="opacity: 0.1;"></path>
<path class="link from-40815 to-99999" marker-end="url(#triangle)" d="M433.81682261931496,309.03661455305564L433.80631643035275,340.5527500894824" style="opacity: 0.1;"></path>
<path class="link from-40847 to-40268" marker-end="url(#triangle)" d="M351.0453741531348,250.39188256584276L412.20403615075014,243.28904424052308" style="opacity: 1;"></path>
<path class="link from-40847 to-40933" marker-end="url(#triangle)" d="M348.8601900879529,255.78457466320054L413.01885514674575,334.2865458575564" style="opacity: 1;"></path>
<path class="link from-40940 to-40268" marker-end="url(#triangle)" d="M563.7624038890109,256.12082044320056L420.5810540549241,243.1822328918633" style="opacity: 0.1;"></path>
<path class="link from-40989 to-41051" marker-end="url(#triangle)" d="M792.9302041097209,274.66732947508274L816.9181758733774,245.77586756185906" style="opacity: 0.1;"></path>
<path class="link from-40991 to-40295" marker-end="url(#triangle)" d="M631.0035216601083,248.68399621242528L579.0965051072187,291.5357739100638" style="opacity: 0.1;"></path>
<path class="link from-41023 to-70007" marker-end="url(#triangle)" d="M791.7936876999845,469.6661446619741L783.9699185153772,415.1147806122547" style="opacity: 0.1;"></path>
<path class="link from-41049 to-40989" marker-end="url(#triangle)" d="M815.1097797044387,210.38354231240112L788.4388434550101,271.9075154257729" style="opacity: 0.1;"></path>
<path class="link from-41049 to-41035" marker-end="url(#triangle)" d="M821.498692094594,209.60207041394597L850.1646055746044,247.11701322906887" style="opacity: 0.1;"></path>
<path class="link from-41051 to-40989" marker-end="url(#triangle)" d="M816.9181758733774,245.77586756185906L792.9302041097209,274.66732947508274" style="opacity: 0.1;"></path>
<path class="link from-70001 to-70007" marker-end="url(#triangle)" d="M764.1101041107638,363.58403496359404L777.5138247456504,393.0515410855357" style="opacity: 0.1;"></path>
<path class="link from-70001 to-40989" marker-end="url(#triangle)" d="M763.0367183337454,345.5192977715445L775.376379573071,306.75641185375315" style="opacity: 0.1;"></path>
<path class="link from-70004 to-70007" marker-end="url(#triangle)" d="M781.7759071146211,339.48523694869033L782.2227018448443,392.0099158326809" style="opacity: 0.1;"></path>
<path class="link from-70006 to-40295" marker-end="url(#triangle)" d="M598.8496434910599,162.28231117648812L576.3331197171012,289.92541578057103" style="opacity: 0.1;"></path>
<path class="link from-70007 to-70001" marker-end="url(#triangle)" d="M777.5138247456504,393.0515410855357L764.1101041107638,363.58403496359404" style="opacity: 0.1;"></path>
<path class="link from-70013 to-70007" marker-end="url(#triangle)" d="M724.7543941302221,429.61336093615216L771.7387511734273,408.3992024114845" style="opacity: 0.1;"></path>
<path class="link from-70013 to-70001" marker-end="url(#triangle)" d="M722.7911162248062,427.5504801362505L755.673548308434,363.3870505572069" style="opacity: 0.1;"></path>
<path class="link from-80012 to-40933" marker-end="url(#triangle)" d="M345.0911818393143,346.8415406546854L411.0010473988979,339.2585197577827" style="opacity: 1;"></path>
<path class="link from-80012 to-70026" marker-end="url(#triangle)" d="M345.1181507463801,347.1952008955732L434.00275563773613,343.8452661569031" style="opacity: 1;"></path>
<path class="link from-80021 to-80024" marker-end="url(#triangle)" d="M391.8790799284137,281.28420627258885L395.12406989460703,310.25906701964107" style="opacity: 0.1;"></path>
<path class="link from-80021 to-30025" marker-end="url(#triangle)" d="M395.327477373901,279.13319572321467L465.4523984817187,323.77444954321203" style="opacity: 0.1;"></path>
<path class="link from-80021 to-70026" marker-end="url(#triangle)" d="M394.09167664487717,280.4366106096499L436.19094627717925,339.3894775173945" style="opacity: 0.1;"></path>
<path class="link from-80021 to-30636" marker-end="url(#triangle)" d="M391.8138316331827,271.9175627542692L398.18429000000015,206.85166117152076" style="opacity: 0.1;"></path>
<path class="link from-80023 to-30608" marker-end="url(#triangle)" d="M529.9875371470649,312.1305130818131L552.0637951738493,337.90615682085166" style="opacity: 0.1;"></path>
<path class="link from-80023 to-30058" marker-end="url(#triangle)" d="M524.3780672965274,313.44593503560304L502.4060137729087,400.37761660880636" style="opacity: 0.1;"></path>
<path class="link from-80023 to-40295" marker-end="url(#triangle)" d="M531.9753921556073,305.7978526484274L571.0529362820013,295.64367206709284" style="opacity: 0.1;"></path>
<path class="link from-80026 to-99999" marker-end="url(#triangle)" d="M388.13748083965277,306.52935030892684L419.57967376010083,345.56693502604116" style="opacity: 0.1;"></path>
<path class="link from-80026 to-30025" marker-end="url(#triangle)" d="M390.92621888144987,302.4808315479995L464.2764248450075,326.2706798954589" style="opacity: 0.1;"></path>
<path class="link from-80026 to-80024" marker-end="url(#triangle)" d="M385.8704305853108,307.84326365384567L387.5452613972541,312.1298268389223" style="opacity: 0.1;"></path>
<path class="link from-80026 to-30654" marker-end="url(#triangle)" d="M388.63428656891637,306.09684860916525L446.5314549139399,367.6772914825315" style="opacity: 0.1;"></path>
<path class="link from-80026 to-40933" marker-end="url(#triangle)" d="M388.39472498523776,306.3137554981019L412.8827123046355,334.4014772075931" style="opacity: 0.1;"></path>
<path class="link from-80026 to-40268" marker-end="url(#triangle)" d="M387.1126397760946,292.4110520761724L414.2468467822402,246.42995559050163" style="opacity: 0.1;"></path>
<path class="link from-99999 to-80024" marker-end="url(#triangle)" d="M414.837055031472,350.7992076505828L423.55774604168727,356.51206821155046" style="opacity: 0.1;"></path>
<path class="link from-99999 to-30625" marker-end="url(#triangle)" d="M440.2488228853234,384.95198554838754L446.3171702826418,405.3970400981513" style="opacity: 0.1;"></path><circle r="6.201093749994102" class="node pacid-30007 category-labor category-labor" transform="translate(665.4609239788796,311.8859363323048)" style="opacity: 0.1;"></circle><circle r="7.827358253130424" class="node pacid-30011 category-labor pro-dfl category-labor" transform="translate(484.8755420072473,358.3722110054163)" style="opacity: 0.1;"></circle><circle r="6.550751264564025" class="node pacid-30013 category-labor category-labor" transform="translate(520.0923039882699,374.0137787670973)" style="opacity: 0.1;"></circle><circle r="4.849097322909282" class="node pacid-30019 category-labor pro-dfl category-labor" transform="translate(584.4111855842314,357.90710266795946)" style="opacity: 0.1;"></circle><circle r="6.097310886445923" class="node pacid-30022 category-labor pro-dfl category-labor" transform="translate(508.350561563465,276.61660856264837)" style="opacity: 0.1;"></circle><circle r="10.924257460364107" class="node pacid-30025 category-labor pro-dfl category-labor" transform="translate(474.6678031946924,329.6409405758842)" style="opacity: 0.1;"></circle><circle r="6.6102176420875285" class="node pacid-30031 category-labor category-labor" transform="translate(548.187522675477,366.9307529808352)" style="opacity: 0.1;"></circle><circle r="17.49297743929363" class="node pacid-30037 category-labor pro-dfl category-labor" transform="translate(456.15328250970197,272.13926655988223)" style="opacity: 0.1;"></circle><circle r="9.935226293901698" class="node pacid-30058 category-labor pro-dfl category-labor" transform="translate(499.97143740764966,410.00993509568985)" style="opacity: 0.1;"></circle><circle r="6.986485810766452" class="node pacid-30060 category-labor pro-dfl category-labor" transform="translate(537.2747749546974,399.92535318784314)" style="opacity: 0.1;"></circle><circle r="4.6799415082101765" class="node pacid-30064 category-labor category-labor" transform="translate(492.14409207512256,256.2118820170322)" style="opacity: 0.1;"></circle><circle r="5.100766508120001" class="node pacid-30092 category-labor pro-dfl category-labor" transform="translate(530.7872681960088,426.1006488283282)" style="opacity: 0.1;"></circle><circle r="8.27924586237165" class="node pacid-30093 category-labor to-pacs category-labor" transform="translate(393.9371706893235,252.88157415013185)" style="opacity: 0.1;"></circle><circle r="4.173511061042525" class="node pacid-30098 category-labor category-labor" transform="translate(370.02851622768867,327.73665972292633)" style="opacity: 0.1;"></circle><circle r="4.260726392592928" class="node pacid-30111 category-biz category-biz" transform="translate(559.534268962802,193.2523039778146)" style="opacity: 0.1;"></circle><circle r="6.568870286055093" class="node pacid-30116 category-lawyers category-lawyers" transform="translate(711.3438074193473,279.6041199114169)" style="opacity: 0.1;"></circle><circle r="8.94082884267716" class="node pacid-30119 category-labor pro-dfl category-labor" transform="translate(387.3268552233643,382.15915187461025)" style="opacity: 0.1;"></circle><circle r="4.0794330881511245" class="node pacid-30123 category-labor category-labor" transform="translate(640.5903174023715,215.8684210401077)" style="opacity: 0.1;"></circle><circle r="7.072626747855084" class="node pacid-30124 category-biz category-biz" transform="translate(685.8855950178444,213.99368115930707)" style="opacity: 0.1;"></circle><circle r="4.398357829696922" class="node pacid-30128 category-labor category-labor" transform="translate(584.9707771699462,199.90066679984608)" style="opacity: 0.1;"></circle><circle r="9.840057111656662" class="node pacid-30163 category-lawyers category-lawyers" transform="translate(717.6839166206402,297.8725982152423)" style="opacity: 0.1;"></circle><circle r="4.831227495088928" class="node pacid-30192 category-labor to-candidates category-labor" transform="translate(651.8671321493665,288.5257073577355)" style="opacity: 0.1;"></circle><circle r="17.75738321326104" class="node pacid-30204 category-labor to-pacs category-labor" transform="translate(352.041425667491,393.0836029740747)" style="opacity: 0.1;"></circle><circle r="4.6645290400506445" class="node pacid-30218 category-biz category-biz" transform="translate(826.9494382408069,449.94328587809264)" style="opacity: 0.1;"></circle><circle r="4.608852708503066" class="node pacid-30224 category-biz category-biz" transform="translate(659.6039835303311,353.19714846574715)" style="opacity: 0.1;"></circle><circle r="8.241812927712186" class="node pacid-30225 category-lawyers pro-dfl category-lawyers" transform="translate(495.9282607951821,333.3117468468579)" style="opacity: 0.1;"></circle><circle r="9.130413069938982" class="node pacid-30230 category-lawyers category-lawyers" transform="translate(662.5630749649796,191.87892997352907)" style="opacity: 0.1;"></circle><circle r="4.027216496000969" class="node pacid-30236 category-labor to-pacs category-labor" transform="translate(397.22350624120855,423.1051120157552)" style="opacity: 0.1;"></circle><circle r="4.458941639716097" class="node pacid-30239 category-labor to-candidates pro-dfl category-labor" transform="translate(503.26877616347406,124.91553311352635)" style="opacity: 0.1;"></circle><circle r="5.503866694435551" class="node pacid-30242 category-lawyers category-lawyers" transform="translate(694.8346608639458,330.2466570712642)" style="opacity: 0.1;"></circle><circle r="11.463080223129266" class="node pacid-30245 category-labor category-labor" transform="translate(503.3194443654511,300.90456961847633)" style="opacity: 0.1;"></circle><circle r="6.547702597513032" class="node pacid-30258 category-lawyers category-lawyers" transform="translate(505.54440228697626,226.08854757329564)" style="opacity: 0.1;"></circle><circle r="8.449283371732943" class="node pacid-30270 category-labor pro-dfl category-labor" transform="translate(509.1672108508931,354.2910251959621)" style="opacity: 0.1;"></circle><circle r="5.937030114281563" class="node pacid-30274 category-biz category-biz" transform="translate(570.2307717668879,164.06166514640574)" style="opacity: 0.1;"></circle><circle r="5.765570919517699" class="node pacid-30308 category-labor pro-dfl category-labor" transform="translate(634.0705496791585,165.62994337980496)" style="opacity: 0.1;"></circle><circle r="6.324281571192525" class="node pacid-30316 category-labor category-labor" transform="translate(440.64389421419725,521.0722344741138)" style="opacity: 0.1;"></circle><circle r="5.207259423810323" class="node pacid-30325 category-labor pro-dfl category-labor" transform="translate(539.3754243030227,115.78296173328773)" style="opacity: 0.1;"></circle><circle r="4.858212016515138" class="node pacid-30331 category-labor pro-dfl category-labor" transform="translate(373.1848304357609,484.10905523344127)" style="opacity: 0.1;"></circle><circle r="11.769505055785764" class="node pacid-30348 category-indian pro-dfl category-indian" transform="translate(591.9737689180411,425.15521900794704)" style="opacity: 0.1;"></circle><circle r="5.083349387427211" class="node pacid-30550 category-labor to-pacs category-labor" transform="translate(462.4528361983438,208.33303889386687)" style="opacity: 0.1;"></circle><circle r="10.158804911033773" class="node pacid-30555 category-indian category-indian" transform="translate(608.9138775725003,216.1050407454922)" style="opacity: 0.1;"></circle><circle r="4.2078602208297875" class="node pacid-30557 category-biz to-pacs category-biz" transform="translate(811.2349145679607,322.33905404724726)" style="opacity: 0.1;"></circle><circle r="22.646392253612504" class="node pacid-30558 category-labor pro-dfl category-labor" transform="translate(460.682380019476,292.9375867071208)" style="opacity: 0.1;"></circle><circle r="10.359337401536493" class="node pacid-30561 category-labor pro-dfl category-labor" transform="translate(549.456118805495,390.64150477866895)" style="opacity: 0.1;"></circle><circle r="4.321401010316119" class="node pacid-30563 category-indian pro-dfl category-indian" transform="translate(667.2826245634818,267.81891123808276)" style="opacity: 0.1;"></circle><circle r="4.023171201193039" class="node pacid-30584 category-lawyers category-lawyers" transform="translate(661.9754208394002,235.97257796582477)" style="opacity: 0.1;"></circle><circle r="4" class="node pacid-30587 category-biz category-biz" transform="translate(603.6282462651072,179.5289049621462)" style="opacity: 0.1;"></circle><circle r="5.299554565778677" class="node pacid-30588 category-labor pro-dfl category-labor" transform="translate(563.776722649363,434.8849601000151)" style="opacity: 0.1;"></circle><circle r="14.664548687248594" class="node pacid-30593 category-labor category-labor" transform="translate(418.76958743270586,403.31721557707)" style="opacity: 0.1;"></circle><circle r="6.504718731055302" class="node pacid-30594 category-labor pro-dfl category-labor" transform="translate(435.83234778770526,216.73679885315352)" style="opacity: 0.1;"></circle><circle r="4.552707635870057" class="node pacid-30599 category-labor pro-dfl category-labor" transform="translate(533.8860454711903,243.7572745008175)" style="opacity: 0.1;"></circle><circle r="4.6495658270098525" class="node pacid-30602 category-labor to-pacs category-labor" transform="translate(423.6197831979557,181.8298249852057)" style="opacity: 0.1;"></circle><circle r="4.045543112008059" class="node pacid-30606 category-labor to-pacs category-labor" transform="translate(600.2626576112275,493.72366265382027)" style="opacity: 0.1;"></circle><circle r="5.886186625961573" class="node pacid-30608 category-labor pro-dfl category-labor" transform="translate(555.8927595458438,342.37675240015045)" style="opacity: 0.1;"></circle><circle r="5.670200074414491" class="node pacid-30611 category-labor pro-dfl category-labor" transform="translate(488.6435772504073,438.39106887553)" style="opacity: 0.1;"></circle><circle r="7.149552035216077" class="node pacid-30623 category-labor designated-ie pro-dfl category-labor" transform="translate(479.455844381804,380.7242137487639)" style="opacity: 0.1;"></circle><circle r="26.923715818917724" class="node pacid-30625 category-prodfl designated-ie to-pacs pro-dfl category-prodfl" transform="translate(453.9781307842363,431.2078160975445)" style="opacity: 0.8;"></circle><circle r="5.854516991571993" class="node pacid-30628 category-issue designated-ie pro-dfl category-issue" transform="translate(319.27807382293895,299.4018462326802)" style="opacity: 0.8;"></circle><circle r="6.268464511493387" class="node pacid-30629 category-prodfl designated-ie pro-dfl category-prodfl" transform="translate(494.3102307196577,525.6164811305512)" style="opacity: 0.1;"></circle><circle r="5.445307560103773" class="node pacid-30631 category-issue designated-ie to-pacs category-issue" transform="translate(413.1007704632341,467.14261865883935)" style="opacity: 0.8;"></circle><circle r="4.476058869466991" class="node pacid-30635 category-issue designated-ie category-issue" transform="translate(634.5667841784439,408.71666741709436)" style="opacity: 0.8;"></circle><circle r="8.235861918756752" class="node pacid-30636 category-prodfl designated-ie pro-dfl category-prodfl" transform="translate(398.9868077388629,198.65499191970645)" style="opacity: 0.1;"></circle><circle r="7.198788944673733" class="node pacid-30654 category-labor designated-ie pro-dfl category-labor" transform="translate(451.4624998269085,372.92203726628907)" style="opacity: 0.1;"></circle><circle r="4.30420516130417" class="node pacid-40019 category-biz category-biz" transform="translate(641.9309754277645,376.1924179683259)" style="opacity: 0.1;"></circle><circle r="5.058833971109839" class="node pacid-40045 category-labor pro-dfl category-labor" transform="translate(632.2995435865517,190.10102356536547)" style="opacity: 0.1;"></circle><circle r="4.048317909473525" class="node pacid-40069 category-biz to-candidates category-biz" transform="translate(768.9000634097451,128.10080735761028)" style="opacity: 0.1;"></circle><circle r="4.226121786451333" class="node pacid-40094 category-labor to-pacs category-labor" transform="translate(322.2353828774224,507.1925066928634)" style="opacity: 0.1;"></circle><circle r="4.0058455002393" class="node pacid-40098 category-biz category-biz" transform="translate(519.4839337941207,481.17741775916005)" style="opacity: 0.1;"></circle><circle r="4.2111113007171515" class="node pacid-40268 category-prodfl to-candidates pro-dfl category-prodfl" transform="translate(416.38703179460737,242.80323992755442)" style="opacity: 0.8;"></circle><circle r="4.436648959904598" class="node pacid-40275 category-labor category-labor" transform="translate(643.0899235461094,335.1253697339687)" style="opacity: 0.1;"></circle><circle r="4.6253350381045575" class="node pacid-40295 category-prodfl to-candidates pro-dfl category-prodfl" transform="translate(575.529606449733,294.4804229862603)" style="opacity: 0.1;"></circle><circle r="9.435542049032335" class="node pacid-40404 category-labor category-labor" transform="translate(482.00905211385634,291.78737912359327)" style="opacity: 0.1;"></circle><circle r="14.448969101834555" class="node pacid-40550 category-indian pro-dfl category-indian" transform="translate(538.6611188893094,176.71747185624022)" style="opacity: 0.1;"></circle><circle r="15.940357556069358" class="node pacid-40712 category-labor category-labor" transform="translate(439.74106985081306,417.65413287857024)" style="opacity: 0.1;"></circle><circle r="6.654705027125961" class="node pacid-40714 category-biz category-biz" transform="translate(692.996528314996,248.23341017532562)" style="opacity: 0.1;"></circle><circle r="5.035407235803272" class="node pacid-40745 category-labor category-labor" transform="translate(518.4823738940834,332.6439447402584)" style="opacity: 0.1;"></circle><circle r="5.530521939443748" class="node pacid-40751 category-biz category-biz" transform="translate(758.9604890311668,478.800356898913)" style="opacity: 0.1;"></circle><circle r="5.740300992043267" class="node pacid-40756 category-biz category-biz" transform="translate(848.9541234081455,401.6575297085638)" style="opacity: 0.1;"></circle><circle r="5.266913731050605" class="node pacid-40786 category-lawyers category-lawyers" transform="translate(685.4274787866683,368.7329965950118)" style="opacity: 0.1;"></circle><circle r="4.186737304621509" class="node pacid-40789 category-biz category-biz" transform="translate(838.7037051857859,350.76803387743263)" style="opacity: 0.1;"></circle><circle r="12.850283301620161" class="node pacid-40815 category-labor to-pacs category-labor" transform="translate(433.8211063772943,296.1863319654502)" style="opacity: 0.1;"></circle><circle r="6.0615261450548354" class="node pacid-40847 category-issue pro-dfl category-issue" transform="translate(345.02431803534154,251.09115535493729)" style="opacity: 0.8;"></circle><circle r="5.595326665156422" class="node pacid-40933 category-prodfl designated-ie pro-dfl category-prodfl" transform="translate(416.55970553103634,338.6189884764355)" style="opacity: 0.8;"></circle><circle r="7.880381963777754" class="node pacid-40940 category-biz category-biz" transform="translate(571.6108066064251,256.8300416219022)" style="opacity: 0.1;"></circle><circle r="18.631974639988783" class="node pacid-40989 category-prorpm designated-ie pro-rpm category-prorpm" transform="translate(781.0281643749728,289.0023191554997)" style="opacity: 0.8;"></circle><circle r="4.2837925592404735" class="node pacid-40991 category-biz category-biz" transform="translate(634.3070345521741,245.9567849513457)" style="opacity: 0.1;"></circle><circle r="4.196000188444252" class="node pacid-41021 category-prorpm pro-rpm category-prorpm" transform="translate(757.2115726541635,210.2133229698827)" style="opacity: 0.1;"></circle><circle r="4.8304406894878325" class="node pacid-41023 category-biz category-biz" transform="translate(792.4794536312528,474.44765931134737)" style="opacity: 0.1;"></circle><circle r="14.219777395712144" class="node pacid-41035 category-prorpm designated-ie pro-rpm category-prorpm" transform="translate(858.798232316712,258.4157989364611)" style="opacity: 0.1;"></circle><circle r="6.357783938006119" class="node pacid-41049 category-biz designated-ie to-pacs category-biz" transform="translate(817.6385238303382,204.55028681070246)" style="opacity: 0.1;"></circle><circle r="13.918730833989482" class="node pacid-41051 category-prorpm designated-ie to-pacs pro-rpm category-prorpm" transform="translate(825.8094120758923,235.06713342471014)" style="opacity: 0.1;"></circle><circle r="9.695855463367948" class="node pacid-70001 category-biz to-pacs category-biz" transform="translate(760.0955975127838,354.7583140331942)" style="opacity: 0.1;"></circle><circle r="10.323118567710331" class="node pacid-70004 category-biz pro-rpm category-biz" transform="translate(781.6880979511462,329.16249184315683)" style="opacity: 0.1;"></circle><circle r="8.156278302185445" class="node pacid-70006 category-biz pro-rpm category-biz" transform="translate(600.2665522715403,154.25004840373853)" style="opacity: 0.1;"></circle><circle r="11.611446802101135" class="node pacid-70007 category-biz pro-rpm category-biz" transform="translate(782.321469617755,403.62094256441566)" style="opacity: 0.1;"></circle><circle r="4.311790896479532" class="node pacid-70013 category-biz to-pacs category-biz" transform="translate(720.8246108890844,431.3877184008806)" style="opacity: 0.1;"></circle><circle r="5.233115117383077" class="node pacid-70026 category-prodfl pro-dfl category-prodfl" transform="translate(439.2321580750151,343.6481773932354)" style="opacity: 0.8;"></circle><circle r="4.614832398007994" class="node pacid-80012 category-issue pro-dfl category-issue" transform="translate(340.50659238229713,347.3690039920951)" style="opacity: 0.8;"></circle><circle r="4.709155354180395" class="node pacid-80021 category-labor to-pacs category-labor" transform="translate(391.35496275654657,276.6043082672943)" style="opacity: 0.1;"></circle><circle r="6.2637506915771946" class="node pacid-80023 category-labor pro-dfl category-labor" transform="translate(525.9129673521959,307.37315523181115)" style="opacity: 0.1;"></circle><circle r="30" class="node pacid-80024 category-prodfl designated-ie pro-dfl category-prodfl" transform="translate(398.4629946005112,340.0726810543116)" style="opacity: 0.1;"></circle><circle r="8.608584468696437" class="node pacid-80026 category-labor to-pacs category-labor" transform="translate(382.73755630241317,299.8249829601907)" style="opacity: 0.1;"></circle><circle r="22.668132198992076" class="node pacid-99999 category-prodfl to-pacs pro-dfl category-prodfl" transform="translate(433.7987598037862,363.2208810289396)" style="opacity: 0.8;"></circle></g>
      </svg>
    </div>
    <div class='mobile legend-target'>
      <svg width='100%' height='1'>
        <g class="annotation"><line class="link" x1="56" y1="60" x2="80" y2="10" marker-end="url(#triangle)" style="opacity: 0.1;"></line><line class="leader" x1="66" y1="40" x2="90" y2="40"></line><text x="96" y="38">Donation</text><text x="96" y="50">to PAC</text><circle class="node" cx="40" cy="90" r="35.144208604054135" style="opacity: 0.1;"></circle><circle class="node" cx="40" cy="120" r="4.969008711003831" style="opacity: 0.1;"></circle><line class="leader" x1="76" y1="90" x2="90" y2="90"></line><line class="leader" x1="46" y1="120" x2="90" y2="120"></line><text x="96" y="88">$10 million in</text><text x="96" y="100">total spending</text><text x="96" y="124">$10 thousand</text><rect class="color pro-dfl" x="20" y="140" width="40" height="20"></rect><rect class="color pro-rpm" x="20" y="170" width="40" height="20"></rect><rect class="color pro-other" x="20" y="200" width="40" height="20"></rect><line class="leader" x1="60" y1="150" x2="90" y2="150"></line><text x="96" y="148">Donations lean toward</text><text x="96" y="160">Democrat groups</text><line class="leader" x1="60" y1="180" x2="90" y2="180"></line><text x="96" y="184">Republican</text><line class="leader" x1="60" y1="210" x2="90" y2="210"></line><text x="96" y="214">Donations don't lean</text></g>
      </svg>
    </div>
    <div class='clear'></div>
    <div class='mobile infobar'>
      <div class='node-info-target'>
        <div class='help'>Touch a PAC bubble for more information.</div>
      </div>
    </div>
  </div>

  <div class='notes'>Data from last three election cycles (2006-2012). PACs that spent less than $50,000 in this period are not included.</div>
  <div class='notes'>PACs identified as partisan have given at least 70 percent of their spent money to that party&rsquo;s candidates, as independent expenditures supporting the party or to the party itself.</div>
  <div class='notes'>Source: Star Tribune analysis of Minnesota Campaign Finance and Disclosure Board data</div>
</div>


<script src="lib/d3.v3.min.js" type="text/javascript" charset="utf-8"></script>
<script src="lib/queue.v1.min.js" type="text/javascript" charset="utf-8"></script>
<script src="lib/underscore-min.js" type="text/javascript" charset="utf-8"></script>
<script src="js/base.js" type="text/javascript" charset="utf-8"></script>

<?php readfile('http://www.startribune.com/templates/vf?vid=236194001&sosp=/politics'); ?>

