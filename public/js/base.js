var pacdag = {

  height: 500,
  width: 760,
  margin: {
    top: 20,
    right: 100,
    bottom: 50,
    left: 100
  },

  // TODO Fix decimal
  formatDollar: d3.format('$,'),

  init: function() {
    var self = this;
    _.bindAll(this, 'handleData');

    queue()
      .defer(d3.csv, 'pacs.csv')
      .defer(d3.json, 'inter-pac-donations.json')
      .await(self.handleData)

    self.svg = d3.select('#chart-target').append('svg')
      .attr('width', self.width + self.margin.left + self.margin.right)
      .attr('height', self.height + self.margin.top + self.margin.bottom)
      .append('g')
        .attr('transform', 'translate(' + self.margin.left + ',' + self.margin.top + ')');

    self.defs = self.svg.append('defs')

    d3.selectAll('.stage')
      .on('click', function() {
        var stage = d3.select(this).attr('data-stage');
        self.setStage(stage);
      });

    self.setStage(1);

    return this;
  },

  setStage: function(stage) {
    d3.selectAll('.stage')
      .classed('active', false);
    d3.select('.stage-' + stage)
      .classed('active', true);
  },

  go: function() {
    var self = this;

    self.prepTooltip();
    self.prepChart();
    self.prepHighlights();
    self.drawAnnotations();
    self.drawChart();
  },

  handleData: function(error, pacSummary, interPacDonations) {
    var self = this;

    self.pacSummary = pacSummary;
    self.interPacDonations = interPacDonations;

    _.each(self.pacSummary, function(d) {
      d.spent = +d.totspend;
      d.spentToPac = +d.topac;
      d.received = +d.receivedtot;
      d.receivedFromPac = +d.frompac;

      d.spentToPacPercent = d.spent > 0 ? 100 * d.spentToPac / d.spent : 0;
      d.receivedFromPacPercent = d.received > 0 ? 100 * d.receivedFromPac / d.received : 0;
    });

    self.pacSummaryById = {};
    _.each(self.pacSummary, function(d) {
      self.pacSummaryById[d.ComID] = d;
    });

    _.each(self.interPacDonations, function(d) {
      d.amt = +d.amt;
      d.source = self.pacSummaryById[d.src];
      d.target = self.pacSummaryById[d.dst];
    });

    self.x = d3.scale.linear()
      .domain([0, 100])
      .range([0, self.width])

    self.y = d3.scale.linear()
      .domain([0, 100])
      .range([self.height, 0])

    self.r = d3.scale.sqrt()
      .domain([0, d3.max(pacSummary, function(d) { return d.spent; })])
      .range([4, 20])

    self.w = d3.scale.linear()
      .domain([0, d3.max(self.interPacDonations, function(d) { return d.amt; })])
      .range([0.1, 3])

    self.go();
  },

  prepTooltip: function() {
    var self = this;

    this.tooltipTemplate = _.template(d3.select('#tooltip-template').html());
    this.tooltip = d3.select('#tooltip-target');
  },

  prepChart: function() {
    var self = this;

    self.highlights = self.svg.append('g')
      .attr('class', 'highlights')

    self.xAxis = d3.svg.axis()
      .scale(self.x)
      .orient('bottom')
      .tickSize(self.height - 1)
      .tickPadding(20)
      .ticks(5)

    self.yAxis = d3.svg.axis()
      .scale(self.y)
      .orient('left')
      .tickSize(self.width)
      .tickPadding(20)
      .ticks(5)

    self.axis = self.svg.append('g')
      .attr('class', 'axis')

    self.axis.append('g')
      .call(self.xAxis);

    self.axis.append('g')
      .attr('transform', 'translate(' + (self.width + 1) + ',0)')
      .call(self.yAxis);

    self.defs.append('marker')
      .attr('id', 'triangle')
      .attr('viewBox', '0 -5 10 10')
      .attr('refX', 15)
      .attr('refY', -1.5)
      .attr('markerWidth', 6)
      .attr('markerHeight', 6)
      .attr('orient', 'auto')
      .append('path')
        .attr('d', 'M0,-5L10,0L0,5');

  },

  prepHighlights: function() {
    var self = this;

    self.storefronts = self.highlights.append('g')
      .attr('class', 'storefronts')

    self.storefronts.append('rect')
      .attr('x', self.x(60))
      .attr('width', self.x(100) - self.x(60))
      .attr('y', 0)
      .attr('height', self.height)

    self.maskedSpenders = self.highlights.append('g')
      .attr('class', 'masked-spenders')

    self.maskedSpenders.append('rect')
      .attr('x', 0)
      .attr('width', self.width)
      .attr('y', 0)
      .attr('height', self.y(60) - self.y(100))
  },

  drawChart: function() {
    var self = this;

    self.pacs = self.svg.selectAll('circle.pac')
      .data(self.pacSummary)
      .enter().append('circle')
        .attr('id', function(d) {
          return 'comid-' + d.ComID;
        })
        .attr('class', function(d) {
          var s = 'pac';
          if (d.spentToPacPercent >= 60) {
            s += ' storefront';
          }
          if (d.receivedFromPacPercent >= 60) {
            s += ' masked-spender';
          }
          return s;
        })
        .attr('cx', function(d) { return self.x(d.spentToPacPercent); })
        .attr('cy', function(d) { return self.y(d.receivedFromPacPercent); })
        .attr('r', function(d) { return self.r(d.spent); })
        .on('click', function(d) { console.log(d); })
        .on('mouseover', function(d) {
          var thisd3 = d3.select(this)

          thisd3.classed('active', true)

          console.log(d);
          console.log(this);

          var pac = {
            name: d.Committee,
            receivedTotal: self.formatDollar(d.received),
            spentTotal: self.formatDollar(d.spent)
          };

          console.log(thisd3.attr('cy'));
          console.log(thisd3.attr('cx'));

          var offset = 10;
          var r = parseInt(thisd3.attr('r'));

          var top = (parseInt(thisd3.attr('cy')) + self.margin.top
              + r + offset)  + 'px';

          var left = (parseInt(thisd3.attr('cx')) + self.margin.left
              + r + offset) + 'px';
          console.log(left);

          self.tooltip
            .html(self.tooltipTemplate(pac))
            .style('top', top)
            .style('left', left)
            .style('display', 'block')
        })
        .on('mouseout', function(d) {
          d3.select(this)
            .classed('active', false)

          self.tooltip
            .style('display', 'none')
        })
  },

  drawLinks: function() {
    var self = this;

    self.path = self.svg.selectAll('path')
      .data(self.interPacDonations)
      .enter().append('path')
        .attr('class', function(d) {
          var s = 'donation';
          var srcCircle = d3.select('#comid-' + d.src);
          var dstCircle = d3.select('#comid-' + d.dst);
          if (srcCircle.classed('storefront')) {
            s += ' from-storefront';
          }
          if (srcCircle.classed('masked-spender')) {
            s += ' from-masked-spender';
          }
          if (dstCircle.classed('storefront')) {
            s += ' from-storefront';
          }
          if (dstCircle.classed('masked-spender')) {
            s += ' from-masked-spender';
          }
          return s;
        })
        .attr('d', function(d) {
          var src = d.source;
          return [
            'M',
            self.x(src.spentToPacPercent),
            ',',
            self.y(src.receivedFromPacPercent),
            'L',
            self.x(src.spentToPacPercent),
            ',',
            self.y(src.receivedFromPacPercent),
          ].join('');
        })
        .style('stroke-width', function(d) {
          return self.w(d.amt);
        })

    self.path
      .attr('marker-end', 'url(#triangle)')
      .transition()
        .duration(5000)
        .attr('d', function(d) {
          var src = d.source;
          var dst = d.target;
          return [
            'M',
            self.x(src.spentToPacPercent),
            ',',
            self.y(src.receivedFromPacPercent),
            'L',
            self.x(dst.spentToPacPercent),
            ',',
            self.y(dst.receivedFromPacPercent),
          ].join('');
        })
  },

  drawAnnotations: function() {
    var self = this;

    self.annotations = self.svg.append('g')
      .attr('class', 'annotations')

    self.annotations.append('text')
      .attr('x', -self.y(50))
      .attr('y', -50)
      .attr('transform', 'rotate(270)')
      .text('Receiver PACs →')

    self.annotations.append('text')
      .attr('x', self.x(50))
      .attr('y', 550)
      .text('Feeder PACs →')

  }
};

var p = pacdag.init();

