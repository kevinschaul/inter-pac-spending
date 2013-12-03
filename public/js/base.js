var pacdag = {

  height: 500,
  width: 800,
  margin: {
    top: 20,
    right: 20,
    bottom: 20,
    left: 30
  },

  init: function() {
    var self = this;
    _.bindAll(this, 'handleData', 'tick', 'link');

    queue()
      .defer(d3.csv, 'pacs.csv')
      .defer(d3.json, 'inter-pac-donations.json')
      .await(self.handleData)

    self.svg = d3.select('#target').append('svg')
      .attr('width', self.width + self.margin.left + self.margin.right)
      .attr('height', self.height + self.margin.top + self.margin.bottom)
      .append('g')
        .attr('transform', 'translate(' + self.margin.left + ',' + self.margin.top + ')');

    self.defs = self.svg.append('defs')

    return this;
  },

  handleData: function(error, pacSummary, interPacDonations) {
    var self = this;

    console.log(pacSummary);
    console.log(pacSummary[0]);
    console.log(interPacDonations);
    console.log(interPacDonations[0]);

    _.each(pacSummary, function(d) {
      d.spent = +d.totspend;
      d.spentToPac = +d.topac;
      d.received = +d.receivedtot;
      d.receivedFromPac = +d.frompac;

      d.spentToPacPercent = d.spent > 0 ? 100 * d.spentToPac / d.spent : 0;
      d.receivedFromPacPercent = d.received > 0 ? 100 * d.receivedFromPac / d.received : 0;
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

    self.xAxis = d3.svg.axis()
      .scale(self.x)
      .orient('bottom')
      .tickSize(self.height)
      .tickPadding(10)
      .ticks(5)

    self.yAxis = d3.svg.axis()
      .scale(self.y)
      .orient('left')
      .tickSize(self.width)
      .tickPadding(10)
      .ticks(5)

    self.axis = self.svg.append('g')
      .attr('class', 'axis')

    self.axis.append('g')
      .call(self.xAxis);

    self.axis.append('g')
      .attr('transform', 'translate(' + self.width + ',0)')
      .call(self.yAxis);

    self.pacs = self.svg.selectAll('circle.pac')
      .data(pacSummary)
      .enter().append('circle')
        .attr('class', 'pac')
        .attr('cx', function(d) { return self.x(d.spentToPacPercent); })
        .attr('cy', function(d) { return self.y(d.receivedFromPacPercent); })
        .attr('r', function(d) { return self.r(d.spent); })
        .on('click', function(d) { console.log(d); })

    /*
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
    */
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

