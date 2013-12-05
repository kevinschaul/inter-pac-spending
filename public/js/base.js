var pacdag = {

  height: 500,
  width: 500,
  margin: {
    top: 20,
    right: 20,
    bottom: 60,
    left: 70
  },

  activePacs: [],
  stickyActive: false,
  textHovers: [],

  // TODO Fix decimal
  formatDollar: d3.format('$,'),

  init: function() {
    var self = this;
    _.bindAll(this, 'handleData', 'activatePac', 'deactivatePac');

    queue()
      .defer(d3.csv, 'pacs.csv')
      .defer(d3.json, 'inter-pac-donations.json')
      .await(self.handleData)

    self.svg = d3.select('#chart-target').append('svg')
      .attr('width', self.width + self.margin.left + self.margin.right)
      .attr('height', self.height + self.margin.top + self.margin.bottom)
      .append('g')
        .attr('transform', 'translate(' + self.margin.left + ',' + self.margin.top + ')')

    self.defs = self.svg.append('defs')

    self.legend = d3.select('#legend-target').append('svg')
      .attr('width', 360)
      .attr('height', 135)

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
    self.drawLinks();
    self.drawLegend();
    self.setTextHovers();

    self.activatePac('80024');
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
      .range([1, 10])

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
      .tickFormat(function(d) { return d + '%'; })
      .ticks(5)

    self.yAxis = d3.svg.axis()
      .scale(self.y)
      .orient('left')
      .tickSize(self.width)
      .tickPadding(20)
      .tickFormat(function(d) { return d + '%'; })
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

    self.links = self.svg.append('g')
    self.pacs = self.svg.append('g')

  },

  prepHighlights: function() {
    var self = this;

    self.feeders = self.highlights.append('g')
      .attr('class', 'feeders')

    self.feeders.append('rect')
      .attr('x', self.x(60))
      .attr('width', self.x(100) - self.x(60))
      .attr('y', 0)
      .attr('height', self.height)

    self.receivers = self.highlights.append('g')
      .attr('class', 'receivers')

    self.receivers.append('rect')
      .attr('x', 0)
      .attr('width', self.width)
      .attr('y', 0)
      .attr('height', self.y(60) - self.y(100))
  },

  drawChart: function() {
    var self = this;

    self.pacs.selectAll('circle.pac')
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
          self.stickyActive = false;
          self.deactivateTextHovers();
          self.activatePac(d.ComID);
        })
        .on('click', function(d) {
          self.stickyActive = true;
          self.deactivateTextHovers();
          self.activatePac(d.ComID);
        })
        .on('mouseout', function(d) {
          if (!self.stickyActive) {
            self.deactivateAllPacs();
            self.deactivateTextHovers();
          }
        })

  },

  activatePac: function(id) {
    var self = this;

    self.deactivateAllPacs();
    self.activePacs.push(id);

    var d = self.pacSummaryById[id];
    var thisd3 = d3.select('.pac#comid-' + id)
    thisd3.classed('active', true)

    var pac = {
      name: d.Committee,
      receivedTotal: self.formatDollar(d.received),
      spentTotal: self.formatDollar(d.spent)
    };

    self.tooltip
      .html(self.tooltipTemplate(pac))

    self.showLinks(id);

    if (_.indexOf(self.textHovers, id) >= 0) {
      d3.select('.pac-hover.pacid-' + id).classed('active', true);
    }
  },

  deactivatePac: function(id, skipTootip) {
    var self = this;

    d3.select('.pac#comid-' + id)
      .classed('active', false)

    self.hideLinks(id);
  },

  deactivateAllPacs: function() {
    var self = this;

    while (self.activePacs.length > 0) {
      self.deactivatePac(self.activePacs.pop());
    }
  },

  showLinks: function(id) {
    var self = this;

    d3.selectAll('.to-' + id)
      .style('display', 'block')
      .classed('link-to', true)

    d3.selectAll('.from-' + id)
      .style('display', 'block')
      .classed('link-from', true)
  },

  hideLinks: function(id) {
    var self = this;

    d3.selectAll('.to-' + id)
      .style('display', 'none')
      .classed('link-to', false)

      d3.selectAll('.from-' + id)
      .style('display', 'none')
      .classed('link-from', false)
  },

  drawLinks: function() {
    var self = this;

    self.links.selectAll('path')
      .data(self.interPacDonations)
      .enter().append('path')
        .attr('class', function(d) {
          var s = 'link';
          var srcCircle = d3.select('#comid-' + d.src);
          var dstCircle = d3.select('#comid-' + d.dst);
          if (srcCircle.classed('storefront')) {
            s += ' from-storefront';
          }
          if (srcCircle.classed('masked-spender')) {
            s += ' from-masked-spender';
          }
          if (dstCircle.classed('storefront')) {
            s += ' to-storefront';
          }
          if (dstCircle.classed('masked-spender')) {
            s += ' to-masked-spender';
          }
          s += ' from-' + d.src;
          s += ' to-' + d.dst;
          return s;
        })
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
        .style('stroke-width', function(d) {
          return self.w(d.amt);
        })
  },

  drawAnnotations: function() {
    var self = this;

    self.annotations = self.svg.append('g')
      .attr('class', 'annotations')

    self.annotations.append('text')
      .attr('x', -self.y(50))
      .attr('y', -58)
      .attr('transform', 'rotate(270)')
      .text('Percent of donations received from other PACs')

    self.annotations.append('text')
      .attr('x', self.x(50))
      .attr('y', 550)
      .text('Percent of donations sent to other PACs')

  },

  drawLegend: function() {
    var self = this;

    self.legend.append('path')
      .attr('class', 'link link-from')
      .attr('d', 'M5,10L66,10')

    self.legend.append('text')
      .attr('x', 80)
      .attr('y', 13)
      .text('Donation from PAC')

    self.legend.append('path')
      .attr('class', 'link link-to')
      .attr('d', 'M5,30L66,30')

    self.legend.append('text')
      .attr('x', 80)
      .attr('y', 33)
      .text('Donation to PAC')

    self.legend.append('circle')
      .attr('class', 'pac')
      .attr('cx', 30)
      .attr('cy', 70)
      .attr('r', self.r(10000000))

    self.legend.append('circle')
      .attr('class', 'pac')
      .attr('cx', 30)
      .attr('cy', 88)
      .attr('r', self.r(10000))

    self.legend.append('line')
      .attr('x1', 53)
      .attr('x2', 70)
      .attr('y1', 70)
      .attr('y2', 70)

    self.legend.append('line')
      .attr('x1', 35)
      .attr('x2', 70)
      .attr('y1', 88)
      .attr('y2', 88)

    self.legend.append('text')
      .attr('x', 80)
      .attr('y', 73)
      .text('$10 million spent')

    self.legend.append('text')
      .attr('x', 80)
      .attr('y', 91)
      .text('$10,000 spent')
  },

  deactivateTextHovers: function() {
    var self = this;

    d3.selectAll('.pac-hover.active')
      .classed('active', false);
  },

  setTextHovers: function() {
    var self = this;

    d3.selectAll('.pac-hover')
      .each(function(d) {
        var thisd3 = d3.select(this);
        var id = thisd3.attr('data-pacid');
        self.textHovers.push(id);
      })
      .on('click', function(d) {

        self.deactivateAllPacs();
        var thisd3 = d3.select(this);
        var id = thisd3.attr('data-pacid');
        self.activatePac(id);

        self.deactivateTextHovers();

        thisd3.classed('active', true);
      })
  }
};

var p = pacdag.init();

