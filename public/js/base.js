var pacdag = {

  height: 500,
  width: 800,

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
      link.source = self.nodes[link.src] || (self.nodes[link.src] = {id: link.src});
      link.target = self.nodes[link.dst] || (self.nodes[link.dst] = {id: link.dst});
    });

    self.draw();
  },

  draw: function() {
    var self = this;

    self.force = d3.layout.force()
      .nodes(d3.values(self.nodes))
      .links(self.links)
      .size([self.width, self.height])
      .charge(-100)
      .linkDistance(50)
      .on('tick', self.tick)
      .start();

    self.path = self.svg.selectAll('path')
      .data(self.force.links())
      .enter().append('path')
        .attr('marker-end', 'url(#triangle)')

    self.circle = self.svg.selectAll('circle')
      .data(self.force.nodes())
      .enter().append('circle')
        .attr('r', 6)
        .on('click', function(d) { console.log(d); })
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

