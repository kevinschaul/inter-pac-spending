#!/usr/bin/env python

import csv
import sys

import json

DATAFILE = 'pacout.csv'
OUTFILE = 'inter-pac-donations.json'

# `data` will contain one item for each source in the graph.
data = []

def main():
    with open(DATAFILE) as datafile:
        datacsv = csv.DictReader(datafile)
        for row in datacsv:
            data.append({
                'src': row['DonorID'],
                'dst': row['RecipID'],
                # TODO Make sure I know what this value is.
                # The value we want is the percent of this pac's money
                # donated to the src pac.
                'pct': (float(row['pctgiventopacs']) / 100) * (float(row['pctgiventoall']) / 100) * 100
            })

    with open(OUTFILE, 'w') as outfile:
        print json.dumps(data, indent=4)
        outfile.write(json.dumps(data))

if __name__ == '__main__':
    main()

