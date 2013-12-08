var pacdag = {

  CUTOFF: 0.01,
  formatDollar: d3.format('$,.2f'),

  init: function() {
    var self = this;
    _.bindAll(this, 'handleData');

    queue()
      .defer(d3.csv, 'pacs.csv')
      .defer(d3.json, 'inter-pac-donations.json')
      .await(self.handleData)

    return this;
  },

 go: function() {
    var self = this;

    self.prepCalculatePayments();
  },

  handleData: function(error, pacSummary, interPacDonations) {
    var self = this;

    self.pacSummary = _.filter(pacSummary, function(d) {
      return (+d.totspend >= 500000) && (+d.topac > 0 || +d.frompac > 0);
    });

    self.pacSummaryById = {};
    _.each(self.pacSummary, function(d) {
      self.pacSummaryById[d.ComID] = d;
    });

    self.interPacDonations = _.filter(interPacDonations, function(d) {
      if (self.pacSummaryById[d.src] && self.pacSummaryById[d.dst]) {
        return true;
      }
      return false;
    });

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

    _.each(self.interPacDonations, function(d) {
      d.amt = +d.amt;
      d.source = self.pacSummaryById[d.src];
      d.target = self.pacSummaryById[d.dst];

      if (self.pacSummaryById[d.src]) {
        d.percentOfTotalSpending = self.pacSummaryById[d.src].spent > 0 ? d.amt / self.pacSummaryById[d.src].spent : 0;
      }
    });

    self.go();
  },

  prepCalculatePayments: function() {
    var self = this;

    self.sentenceResultTemplate = _.template(
      d3.select('#sentence-results-template').html()
    );
    self.sentenceResultTarget = d3.select('#sentence-results-target');

    self.sentenceAmount = d3.select('.sentence input')

    self.sentenceSelect = d3.select('.sentence select')

    self.sentenceSelect.selectAll('option')
      .data(self.pacSummary)
      .enter().append('option')
        .attr('value', function(d) {
          return d.ComID;
        })
        .text(function(d) {
          return d.Committee;
        })
    $('.combobox').combobox();

    self.sentenceGo = d3.select('.sentence button')
      .on('click', function() {
        var amount = self.sentenceAmount.node().value;
        amount = 100;
        var pacid = self.sentenceSelect.node().value.toString();

        self.calculatePayments(amount, pacid);
        self.sentenceResultTarget.html(
          self.sentenceResultTemplate({
            amounts: _.sortBy(self.amounts, function(d) {
              return -d.amount;
            })
          })
        );
      });
  },

  calculatePayments: function(amount, src) {
    var self = this;

    self.initialAmount = amount;
    self.amounts = {};
    self._calculatePayments(amount, src);

    _.each(self.amounts, function(d) {
      console.log(d);
      d.amountFormatted = self.formatDollar(d.amount);
      d.pac = self.pacSummaryById[d.pacid];
      d.pacName = d.pac.Committee;
      console.log(d);
    });
  },

  _calculatePayments: function(amount, src) {
    var self = this;

    // Sanity check. If this happens, something is wrong.
    if (amount > self.initialAmount) {
      console.log('Skipping amount: ', amount);
      return;
    }

    // We will subtract from this value each time we recurse.
    // In the end, this value will tell how much the `src` pac
    // spend directly, which we must add to `amounts`.
    var total = amount;

    // Find the donations from `src`.
    var donationsFromSrc = _.filter(self.interPacDonations, function(d) {
      return d.src === src;
    });

    // If the amount is greater than the cutoff, recursively find the payments
    // of the `dst` pac.
    if (amount >= self.CUTOFF) {
      _.each(donationsFromSrc, function(d) {
        // `a` is the amount donated specifically to this pac.
        var a = amount * d.percentOfTotalSpending;
        // Subtract the amount doanted to this pac from the total donations
        total -= a;
        self._calculatePayments(a, d.dst);
      });
    }

    // If the total is greater than 0.01 after all payments have been subtracted,
    // add this pac to `amounts`. The pac spent this money directly.
    if (total >= 0.01) {
      if (!self.amounts[src]) {
        self.amounts[src] = {
          pacid: src,
          amount: 0
        }
      }
      self.amounts[src].amount += total;
    }
  }
};

var p = pacdag.init();

