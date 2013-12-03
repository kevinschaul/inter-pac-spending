var pacdag = {

  height: 500,
  width: 800,

  init: function() {
    var self = this;
    _.bindAll(this, 'handleData', 'tick', 'link');

    d3.json('inter-pac-donations.json', self.handleData);

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

  handleData: function(error, data) {
    var self = this;

    self.links = data;
    self.nodes = {};

    // Find nodes
    _.each(self.links, function(link) {
      // http://bl.ocks.org/mbostock/1153292
      link.source = self.nodes[link.src]
          || (self.nodes[link.src] = {id: link.src, name: link.srcname, amt: 0});
      link.target = self.nodes[link.dst]
          || (self.nodes[link.dst] = {id: link.dst, name: link.dstname, amt: 0});

      self.nodes[link.dst].amt += +link.amt;
    });

    self.draw();
  },

  draw: function() {
    var self = this;

    self.r = d3.scale.sqrt()
      .domain([0, d3.max(d3.values(self.nodes), function(d) { return d.amt; })])
      .range([4, 20])

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
        .attr('r', function(d) { return self.r(d.amt); })
        .on('click', function(d) { console.log(d); })
        .call(self.force.drag);
  },

  tick: function() {
    var self = this;

    self.path.attr('d', self.link);
    self.circle.attr('transform', self.transform);
  },

  link: function(d) {
    var self = this;

    // TODO don't overlap circles
    var r = self.r(d.target.amt);
    return 'M' + d.source.x + ',' + d.source.y + 'L' + d.target.x + ',' + d.target.y;
  },

  transform: function(d) {
    return 'translate(' + d.x + ',' + d.y + ')';
  }
};

var p = pacdag.init();

