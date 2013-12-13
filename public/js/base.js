var pacdag = {

  height: 600,
  width: 560,

  nodeOpacityInitial: 0.4,
  linkOpacityInitial: 0.1,
  nodeOpacitySelected: 1,
  linkOpacitySelected: 1,
  nodeOpacityNotSelected: 0.1,

  stateActive: false,

  nodeInfoTemplate: _.template(d3.select('#node-info-template').html()),
  nodeInfoTarget: d3.select('#node-info-target'),

  showWrapperTemplate: _.template(d3.select('#show-wrapper-template').html()),
  showWrapperDFLTarget: d3.select('#show-wrapper-dfl-target'),
  showWrapperRPMTarget: d3.select('#show-wrapper-rpm-target'),

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
        .attr('d', 'M0,0L10,5L0,10z')

      triangle.append('path')
        .attr('class', 'triangle inner')
        .attr('d', 'M2,2L8,5L2,8z')
    }

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

      d.ieprodflReadable = self.formatDollar(d.ieprodfl);
      d.canddflReadable = self.formatDollar(d.canddfl);
      d.partydflReadable = self.formatDollar(d.partydfl);

      d.ieprorpmReadable = self.formatDollar(d.ieprorpm);
      d.candrpmReadable = self.formatDollar(d.candrpm);
      d.partyrpmReadable = self.formatDollar(d.partyrpm);

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

    self.sortedByCategory = {
      ie: {
        categoryReadable: 'Independent Expenditures',
        dfl: _.sortBy(pacs, function(d) { return -d.ieprodfl; }).splice(0, 5),
        rpm: _.sortBy(pacs, function(d) { return -d.ieprorpm; }).splice(0, 5),
      },
      candidate: {
        categoryReadable: 'To Candidates',
        dfl: _.sortBy(pacs, function(d) { return -d.canddfl; }).splice(0, 5),
        rpm: _.sortBy(pacs, function(d) { return -d.candrpm; }).splice(0, 5),
      },
      party: {
        categoryReadable: 'To Parties',
        dfl: _.sortBy(pacs, function(d) { return -d.partydfl; }).splice(0, 5),
        rpm: _.sortBy(pacs, function(d) { return -d.partyrpm; }).splice(0, 5),
      }
    };

    self.showWrapperDFLTarget.html(
      self.showWrapperTemplate({
        party: 'dfl',
        partyReadable: 'DFL',
        amountsReadable: {
          ie: 'ieprodflReadable',
          candidate: 'canddflReadable',
          party: 'partydflReadable'
        },
        sortedByCategory: self.sortedByCategory
      })
    );

    self.showWrapperRPMTarget.html(
      self.showWrapperTemplate({
        party: 'rpm',
        partyReadable: 'Republican',
        amountsReadable: {
          ie: 'ieprorpmReadable',
          candidate: 'candrpmReadable',
          party: 'partyrpmReadable'
        },
        sortedByCategory: self.sortedByCategory
      })
    );

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
  },

  draw: function() {
    var self = this;

    self.force = d3.layout.force()
      .nodes(_.sortBy(self.nodes, function(d) {
         return d.totspend;
      }))
      .links(self.links)
      .size([self.width, self.height])
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

    _.each(self.sortedByCategory, function(d, category) {
      _.each(d.dfl, function(d) {
        d3.select('.node.pacid-' + d.ComID)
          .classed('category-' + category, true)
          .classed('party-dfl', true)
      });
      _.each(d.rpm, function(d) {
        d3.select('.node.pacid-' + d.ComID)
          .classed('category-' + category, true)
          .classed('party-rpm', true)
      });
    });
  },

  activateButtons: function() {
    var self = this;

    self.buttons = {},

    d3.selectAll('.button')
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
          self.buttons[showState] = thisd3;
          self.activateState(showState);
        }
      })
  },

  activateState: function(state) {
    var self = this;

    self.stateActive = state;
    self.buttons[state].classed('active', true);

    if (state === 'ie') {
      d3.selectAll('.node.category-ie')
        .each(function(d) {
          self.activateNode(d.pac);
        })
    } else if (state === 'candidate') {
      d3.selectAll('.node.category-candidate')
        .each(function(d) {
          self.activateNode(d.pac);
        })
    } else if (state === 'party') {
      d3.selectAll('.node.category-party')
        .each(function(d) {
          self.activateNode(d.pac);
        })
    }
    self.nodeInfoTarget.html(self.nodeInfoInitial);
  },

  deactivateState: function() {
    var self = this;

    self.stateActive = false;

    d3.selectAll('.button.active')
      .classed('active', false)

    d3.selectAll('.node')
      .style('opacity', self.nodeOpacityInitial)
  },

  unselectNodes: function() {
    var self = this;

    d3.selectAll('.node')
      .style('opacity', self.nodeOpacityNotSelected)
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

    //self.nodeInfoTarget.html(self.nodeInfoInitial);

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

