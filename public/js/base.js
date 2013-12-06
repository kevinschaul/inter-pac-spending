var pacdag = {

  height: 400,
  width: 960,
  margin: {
    top: 20,
    right: 20,
    bottom: 20,
    left: 20
  },

  formatDollar: d3.format('$,.2f'),

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
        .attr('transform', 'translate(' + self.margin.left + ',' + self.margin.top + ')')

    self.defs = self.svg.append('defs')

    return this;
  },

  go: function() {
    var self = this;

    self.prepChart();
    self.drawChart();
    self.drawLinks();
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

      if (+d.todem > +d.torep) {
        d.lean = 'd';
      } else if (+d.torep > +d.todem) {
        d.lean = 'r';
      }

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

      d.percentOfTotalSpending = self.pacSummaryById[d.src].spent > 0 ? d.amt / self.pacSummaryById[d.src].spent : 0;
    });

    self.r = d3.scale.sqrt()
      .domain([0, d3.max(pacSummary, function(d) { return d.spent; })])
      .range([4, 20])

    self.y = d3.scale.linear()
      .domain([0, d3.max(self.interPacDonations, function(d) { return d.amt; })])
      .range([0, 100])

    self.go();
  },

  prepChart: function() {
    var self = this;

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

  drawChart: function() {
    var self = this;

    self.xSoFar = 0;

    self.pacs.selectAll('circle.pac')
      .data(_.sortBy(self.pacSummary, function(d) { return -d.spent; }))
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
          if (d.lean) {
            s += ' lean-' + d.lean;
          }
          return s;
        })
        .attr('r', function(d) { return self.r(d.spent); })
        .attr('cx', function(d) {
          self.xSoFar += self.r(d.spent);
          var ret = self.xSoFar;
          self.xSoFar += self.r(d.spent);
          d.cx = ret;
          return ret;
        })
        .attr('cy', self.height / 2)
        .on('mouseover', function(d) {
          d3.selectAll('path.from-' + d.ComID)
            .classed('active', true)
          self.fillLinks(d.ComID);
        })
        .on('mouseout', function(d) {
          d3.selectAll('path.from-' + d.ComID)
            .classed('active', false)
          self.unfillLinks(d.ComID);
        })
        .on('click', function(d) {
          console.log(d);
        })
  },

  drawLinks: function() {
    var self = this;

    var enter = self.links.selectAll('path')
      .data(self.interPacDonations)
      .enter()

    enter.append('path')
      .attr('class', function(d) {
        var s = 'link';
        var srcCircle = d3.select('#comid-' + d.src);
        var dstCircle = d3.select('#comid-' + d.dst);
        s += ' from-' + d.src;
        s += ' to-' + d.dst;
        return s;
      })
      .attr('d', function(d) {
        var src = d.source;
        var dst = d.target;
        return [
          'M',
          src.cx,
          self.height / 2,

          'Q',

          (src.cx + dst.cx) / 2,
          0,

          dst.cx,
          self.height / 2,
        ].join(' ');
      })
      .attr('stroke-dasharray', function(d) {
        d.pathLength = this.getTotalLength();
        return d.pathLength + ' ' + d.pathLength;
      })
      .attr('stroke-dashoffset', function(d) {
        return d.pathLength;
      })
  },

  fillLinks: function(id) {
    var self = this;

    d3.selectAll('path.from-' + id)
      .classed('active', true)
      .classed('active-from', true)
      .transition()
        .duration(400)
        .attr('stroke-dashoffset', 0)

    d3.selectAll('path.to-' + id)
      .classed('active', true)
      .classed('active-to', true)
      .transition()
        .duration(400)
        .attr('stroke-dashoffset', 0)
  },

  unfillLinks: function(id) {
    var self = this;

    d3.selectAll('path.from-' + id)
      .classed('active', false)
      .classed('active-from', false)
      .transition()
        .duration(200)
        .attr('stroke-dashoffset', function(d) {
          return d.pathLength;
        })

    d3.selectAll('path.to-' + id)
      .classed('active', false)
      .classed('active-to', false)
      .transition()
        .duration(200)
        .attr('stroke-dashoffset', function(d) {
          return d.pathLength;
        })
  },

};

var p = pacdag.init();

