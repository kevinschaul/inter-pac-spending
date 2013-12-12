var pacdag = {

  height: 500,
  width: 960,

  nodeOpacityInitial: 0.4,
  linkOpacityInitial: 0.1,
  nodeOpacitySelected: 1,
  linkOpacitySelected: 1,
  nodeOpacityNotSelected: 0.1,

  init: function() {
    var self = this;
    _.bindAll(this, 'handleData', 'tick');

    queue()
      .defer(d3.csv, 'pacs.csv')
      .defer(d3.json, 'inter-pac-donations.json')
      .await(self.handleData);

    self.svg = d3.select('#target').append('svg')
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
      d.receivedspend = +d.receivedspend;
      d.topac = +d.topac;

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

    self.draw();
  },

  draw: function() {
    var self = this;

    self.force = d3.layout.force()
      .nodes(_.sortBy(self.nodes, function(d) {
         return d.totspend;
      }))
      .links(self.links)
      .size([self.width - 100, self.height + 30])
      .charge(-100)
      .linkDistance(60)
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
          console.log(Math.round(self.r(d.dstpac.totspend)));
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
          return s;
        })
        .style('opacity', self.nodeOpacityInitial)
        .on('mouseover', function(d) {
          console.log(d);
          console.log(d.pac.Committee);

          d3.selectAll('.node')
            .style('opacity', self.nodeOpacityNotSelected)

          d3.select(this)
            .style('opacity', self.nodeOpacitySelected)

          var s = '.link.from-' + d.pac.ComID + ', .link.to-' + d.pac.ComID;
          d3.selectAll(s)
            .style('opacity', self.linkOpacitySelected)
            .each(function(d) {
              d3.selectAll('.node.pacid-' + d.src + ', .node.pacid-' + d.dst)
                .style('opacity', self.nodeOpacitySelected)
            })
        })
        .on('mouseout', function(d) {
          d3.selectAll('.node')
            .style('opacity', self.nodeOpacityInitial)

          d3.select(this)
            .style('opacity', self.nodeOpacityInitial)

          var s = '.link.from-' + d.pac.ComID + ', .link.to-' + d.pac.ComID;
          d3.selectAll(s)
            .style('opacity', self.linkOpacityInitial)
            .each(function(d) {
              d3.selectAll('.node.pacid-' + d.src + ', .node.pacid-' + d.dst)
                .style('opacity', self.nodeOpacityInitial)
            })
        })
        .call(self.force.drag);
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

