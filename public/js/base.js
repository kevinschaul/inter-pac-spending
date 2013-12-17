var pacdag = {

  height: 600,
  width: 960,

  nodeOpacityInitial: 0.6,
  linkOpacityInitial: 0.1,
  nodeOpacitySelected: 0.8,
  linkOpacitySelected: 0.8,
  nodeOpacityNotSelected: 0.1,
  linkOpacityNotSelected: 0.1,

  stateActive: false,

  nodeInfoTemplate: _.template(d3.select('#node-info-template').html()),
  nodeInfoTarget: d3.select('#node-info-target'),

  formatDollar: d3.format('$,.2f'),

  init: function() {
    var self = this;
    _.bindAll(this, 'handleData', 'tick');

    queue()
      .defer(d3.csv, 'pacs.csv')
      .defer(d3.json, 'inter-pac-donations.json')
      .await(self.handleData);

    self.nodeInfoInitial = self.nodeInfoTarget.html();

    self.svg = d3.select('#graph').append('svg')
      .attr('width', self.width)
      .attr('height', self.height)

    self.defs = self.svg.append('defs')

    var i;
    for (i = 0; i <= 100; i++) {
      var triangle = self.defs.append('marker')
        .attr('id', 'triangle-' + i)
        .attr('viewBox', '0 0 10 10')
        .attr('refX', 0)
        .attr('refY', 5)
        .attr('markerWidth', 4)
        .attr('markerHeight', 3)
        .attr('orient', 'auto')
        .append('g')
          .attr('transform', 'translate(' + (-(i + 14)) + ', 0)')

      triangle.append('rect')
        .attr('class', 'underlay')
        .attr('x', 0)
        .attr('width', 20 + (i))
        .attr('y', 2)
        .attr('height', 6)

      triangle.append('path')
        .attr('class', 'triangle outer')
        .attr('d', 'M2,1L10,5L2,9z')

      triangle.append('path')
        .attr('class', 'triangle inner')
        .attr('d', 'M2,2L8,5L2,8z')
    }

    self.annotation = self.svg.append('g')
      .attr('class', 'annotation')
      .attr('transform', 'translate(0, 340)')

    return this;
  },

  handleData: function(error, pacs, interPacDonations) {
    var self = this;

    self.pacsById = {};
    _.each(pacs, function(d) {
      d.totspend = +d.totspend;
      d.receivedtot = +d.receivedtot;
      d.topac = +d.topac;
      d.endcash2012 = +d.endcash2012;
      d.candall = +d.candall;

      d.ieprodfl = +d.ieprodfl;
      d.ieprorpm = +d.ieprorpm;
      d.ieother = +d.ieother;

      d.candall = +d.candall;
      d.canddfl = +d.canddfl;
      d.candrpm = +d.candrpm;

      d.partyall = +d.partyall;
      d.partydfl = +d.partydfl;
      d.partyrpm = +d.partyrpm;

      d.dfltot = d.ieprodfl + d.canddfl + d.partydfl;
      d.rpmtot = d.ieprorpm + d.candrpm + d.partyrpm;

      if (d.dfltot / d.totspend >= .75 || d.cat2 == 'prodfl') {
        d.party = 'dfl';
      }
      if (d.rpmtot / d.totspend >= .75 || d.cat2 == 'prorpm') {
        d.party = 'rpm';
      }

      if (d.candall >= (d.totspend / 2)) {
        d.toCandidates = true;
      }
      if (d.topac >= (d.totspend / 2)) {
        d.toPacs = true;
      }
      d.IEdesignator = d.IEdesignator === '1' ? true : false;

      d.totspendFormatted = self.formatDollar(d.totspend);
      d.totreceivedFormatted = self.formatDollar(d.receivedtot);
      d.topacFormatted = self.formatDollar(d.topac);
      d.endcash2012Formatted = self.formatDollar(d.endcash2012);

      self.pacsById[d.ComID] = d;
    });

    _.each(interPacDonations, function(d) {
      d.amt = +d.amt;

      d.srcpac = self.pacsById[d.src];
      d.dstpac = self.pacsById[d.dst];
    });

    var minSpent = 50000;
    self.links = _.filter(interPacDonations, function(d) {
      return (d.srcpac && d.dstpac)
        && (d.srcpac.totspend >= minSpent && d.dstpac.totspend >= minSpent);
    });
    self.nodes = {};

    _.each(self.links, function(link) {
      // http://bl.ocks.org/mbostock/1153292
      link.source = self.nodes[link.src] || (self.nodes[link.src] = {id: link.src, pac: link.srcpac});
      link.target = self.nodes[link.dst] || (self.nodes[link.dst] = {id: link.dst, pac: link.dstpac});
    });

    self.r = d3.scale.sqrt()
      .domain(d3.extent(d3.values(self.nodes), function(d) {
        return d.pac.totspend;
      }))
      .range([4, 30])

    self.go();
  },

  go: function() {
    var self = this;

    self.draw();
    self.activateButtons();

    self.activateState('issue');
  },

  draw: function() {
    var self = this;

    self.force = d3.layout.force()
      .nodes(_.sortBy(self.nodes, function(d) {
         return d.totspend;
      }))
      .links(self.links)
      .size([self.width + 200, self.height])
      .charge(-300)
      .linkDistance(60)
      .gravity(0.3)
      .on('tick', self.tick)
      .start();

    self.path = self.svg.selectAll('path.link')
      .data(self.force.links())
      .enter().append('path')
        .attr('class', function(d) {
          var s = 'link';
          s += ' from-' + d.srcpac.ComID;
          s += ' to-' + d.dstpac.ComID;
          return s;
        })
        .style('opacity', self.linkOpacityInitial)
        .attr('marker-end', function(d) {
          return 'url(#triangle-' + Math.round(self.r(d.dstpac.totspend)) + ')'
        })

    self.circle = self.svg.selectAll('circle')
      .data(self.force.nodes())
      .enter().append('circle')
        .attr('r', function(d) {
          return self.r(d.pac.totspend);
        })
        .attr('class', function(d) {
          var s = 'node'
          s += ' pacid-' + d.pac.ComID;
          s += ' category-' + d.pac.cat2;
          if (d.pac.IEdesignator) {
            s += ' designated-ie';
          }
          if (d.pac.toCandidates) {
            s += ' to-candidates';
          }
          if (d.pac.toPacs) {
            s += ' to-pacs';
          }
          if (d.pac.party) {
            s += ' pro-' + d.pac.party;
          }
          s += ' category-' + d.pac.cat2;
          return s;
        })
        .style('opacity', self.nodeOpacityInitial)
        .on('mouseover', function(d) {
          self.unselectNodes();
          self.deactivateLinks();
          self.activateNode(d.pac);
          self.activateNodeLinks(d.pac);
        })
        .on('mouseout', function(d) {
          self.deactivateNode(d.pac);
          if (self.stateActive) {
            self.activateState(self.stateActive);
          }
        })
        .on('click', function(d) {
          console.log(d.pac);
        })
        .call(self.force.drag);

    self.annotation.append('line')
      .attr('class', 'link')
      .attr('x1', 56)
      .attr('y1', 60)
      .attr('x2', 80)
      .attr('y2', 10)
      .attr('marker-end', 'url(#triangle-0)')

    self.annotation.append('line')
      .attr('class', 'leader')
      .attr('x1', 66)
      .attr('y1', 40)
      .attr('x2', 90)
      .attr('y2', 40)

    self.annotation.append('text')
      .attr('x', 96)
      .attr('y', 38)
      .text('Donation')

    self.annotation.append('text')
      .attr('x', 96)
      .attr('y', 50)
      .text('to PAC')

    self.annotation.append('circle')
      .attr('class', 'node')
      .attr('cx', 40)
      .attr('cy', 90)
      .attr('r', self.r(10000000))

    self.annotation.append('circle')
      .attr('class', 'node')
      .attr('cx', 40)
      .attr('cy', 120)
      .attr('r', self.r(100000))

    self.annotation.append('line')
      .attr('class', 'leader')
      .attr('x1', 76)
      .attr('y1', 90)
      .attr('x2', 90)
      .attr('y2', 90)

    self.annotation.append('line')
      .attr('class', 'leader')
      .attr('x1', 46)
      .attr('y1', 120)
      .attr('x2', 90)
      .attr('y2', 120)

    self.annotation.append('text')
      .attr('x', 96)
      .attr('y', 88)
      .text('$10 million in')

    self.annotation.append('text')
      .attr('x', 96)
      .attr('y', 100)
      .text('total PAC spending')

    self.annotation.append('text')
      .attr('x', 96)
      .attr('y', 124)
      .text('$10 thousand')

    self.annotation.append('rect')
      .attr('class', 'color pro-dfl')
      .attr('x', 20)
      .attr('y', 140)
      .attr('width', 40)
      .attr('height', 20)

    self.annotation.append('rect')
      .attr('class', 'color pro-rpm')
      .attr('x', 20)
      .attr('y', 170)
      .attr('width', 40)
      .attr('height', 20)

    self.annotation.append('rect')
      .attr('class', 'color pro-other')
      .attr('x', 20)
      .attr('y', 200)
      .attr('width', 40)
      .attr('height', 20)

    self.annotation.append('line')
      .attr('class', 'leader')
      .attr('x1', 60)
      .attr('y1', 150)
      .attr('x2', 90)
      .attr('y2', 150)

    self.annotation.append('text')
      .attr('x', 96)
      .attr('y', 148)
      .text('Donations lean toward')

    self.annotation.append('text')
      .attr('x', 96)
      .attr('y', 160)
      .text('Democrat groups')

    self.annotation.append('line')
      .attr('class', 'leader')
      .attr('x1', 60)
      .attr('y1', 180)
      .attr('x2', 90)
      .attr('y2', 180)

    self.annotation.append('text')
      .attr('x', 96)
      .attr('y', 184)
      .text('Republican')

    self.annotation.append('line')
      .attr('class', 'leader')
      .attr('x1', 60)
      .attr('y1', 210)
      .attr('x2', 90)
      .attr('y2', 210)

    self.annotation.append('text')
      .attr('x', 96)
      .attr('y', 214)
      .text('Donations don\'t lean')
  },

  activateButtons: function() {
    var self = this;

    self.buttons = {},

    d3.selectAll('.button')
      .each(function() {
        var thisd3 = d3.select(this);
        var showState = thisd3.attr('data-show')

        self.buttons[showState] = thisd3;
      })
      .on('click', function() {
        var thisd3 = d3.select(this);
        var showState = thisd3.attr('data-show')

        // If the button clicked on is active, deactivate it and return.
        if (self.stateActive === showState) {
          self.deactivateState();
        } else {

          // Otherwise, deactivate any state ...
          if (self.stateActive) {
            self.deactivateState();
          }

          // ... and activate the state of the button clicked.
          self.activateState(showState);
        }
      })
  },

  activateState: function(state) {
    var self = this;

    self.stateActive = state;
    self.buttons[state].classed('active', true);

    self.unselectNodes();

    d3.selectAll('.node.category-' + state)
      .each(function(d) {
        self.activateNode(d.pac);
        self.activateNodeLinks(d.pac);
      })

    self.nodeInfoTarget.html(self.nodeInfoInitial);
  },

  deactivateState: function() {
    var self = this;

    self.stateActive = false;

    d3.selectAll('.button.active')
      .classed('active', false)

    d3.selectAll('.node')
      .style('opacity', self.nodeOpacityInitial)

    d3.selectAll('.link')
      .style('opacity', self.linkOpacityInitial);
  },

  unselectNodes: function() {
    var self = this;

    d3.selectAll('.node')
      .style('opacity', self.nodeOpacityNotSelected)

    d3.selectAll('.link')
      .style('opacity', self.linkOpacityNotSelected)
  },

  activateNode: function(pac) {
    var self = this;

    self.nodeInfoTarget.html(self.nodeInfoTemplate({pac: pac}));

    d3.select('.node.pacid-' + pac.ComID)
      .style('opacity', self.nodeOpacitySelected)
  },

  activateNodeLinks: function(pac) {
    var self = this;

    var s = '.link.from-' + pac.ComID + ', .link.to-' + pac.ComID;
    d3.selectAll(s)
      .style('opacity', self.linkOpacitySelected)
      .each(function(d) {
        d3.selectAll('.node.pacid-' + d.src + ', .node.pacid-' + d.dst)
          .style('opacity', self.nodeOpacitySelected)
      })
  },

  deactivateNode: function(pac) {
    var self = this;

    self.nodeInfoTarget.html(self.nodeInfoInitial);

    d3.selectAll('.node')
      .style('opacity', self.nodeOpacityInitial)

    d3.select('.node.pacid-' + pac.ComID)
      .style('opacity', self.nodeOpacityInitial)

    var s = '.link.from-' + pac.ComID + ', .link.to-' + pac.ComID;
    d3.selectAll(s)
      .style('opacity', self.linkOpacityInitial)
      .each(function(d) {
        d3.selectAll('.node.pacid-' + d.src + ', .node.pacid-' + d.dst)
          .style('opacity', self.nodeOpacityInitial)
      })
  },

  deactivateLinks: function() {
    var self = this;

    d3.selectAll('.link')
      .style('opacity', self.linkOpacityInitial)
  },

  tick: function() {
    var self = this;

    self.path.attr('d', self.link);
    self.circle.attr('transform', self.transform);
  },

  link: function(d) {
    return 'M' + d.source.x + ',' + d.source.y + 'L' + d.target.x + ',' + d.target.y;
  },

  transform: function(d) {
    return 'translate(' + d.x + ',' + d.y + ')';
  }
};

var p = pacdag.init();

