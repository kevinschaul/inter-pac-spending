var pacdag = {

  height: 500,
  width: 800,

  nodeOpacityInitial: 0.4,
  linkOpacityInitial: 0.1,
  nodeOpacitySelected: 1,
  linkOpacitySelected: 1,

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

    self.triangle = self.defs.append('marker')
      .attr('id', 'triangle')
      .attr('viewBox', '0 0 10 10')
      .attr('refX', 0)
      .attr('refY', 5)
      .attr('markerWidth', 4)
      .attr('markerHeight', 3)
      .attr('orient', 'auto')
      .append('g')
        .attr('transform', 'translate(-30, 0)')

    self.triangle.append('path')
      .attr('class', 'triangle outer')
      .attr('d', 'M0,0L10,5L0,10z')

    self.triangle.append('path')
      .attr('class', 'triangle inner')
      .attr('d', 'M2,2L8,5L2,8z')

    self.svg.append('path')
      .attr('d', 'M50,50L200,100')
      .attr('marker-end', 'url(#triangle)')

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
      .range([3, 20])

    //self.draw();
  },

  draw: function() {
    var self = this;

    self.force = d3.layout.force()
      .nodes(d3.values(self.nodes))
      .links(self.links)
      .size([self.width - 100, self.height + 50])
      .charge(-100)
      .linkDistance(40)
      .on('tick', self.tick)
      .start();

    self.path = self.svg.selectAll('path')
      .data(self.force.links())
      .enter().append('path')
        .attr('class', function(d) {
          var s = 'link';
          s += ' from-' + d.srcpac.ComID;
          s += ' to-' + d.dstpac.ComID;
          return s;
        })
        .style('opacity', self.linkOpacityInitial)
        .attr('marker-end', 'url(#triangle)')

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

