GENERATED_FILES = \

LIBRARY_FILES = \
	public/lib/d3.v3.min.js \
	public/lib/underscore-min.js \
	public/lib/queue.v1.min.js \
	public/inter-pac-donations.json \
	public/pacs.csv

all: $(GENERATED_FILES) $(LIBRARY_FILES)

clean:
	rm -rf build
	rm -rf $(GENERATED_FILES) $(LIBRARY_FILES)

public/lib/d3.v3.js:
	mkdir -p public/lib
	curl -o $@ http://d3js.org/d3.v3.js

public/lib/d3.v3.min.js:
	mkdir -p public/lib
	curl -o $@ http://d3js.org/d3.v3.min.js

public/lib/underscore-min.js:
	mkdir -p public/lib
	curl -o $@ http://underscorejs.org/underscore-min.js

public/lib/queue.v1.min.js:
	mkdir -p public/lib
	curl -o $@ http://d3js.org/queue.v1.min.js

public/inter-pac-donations.json: data/workspace/pacout.csv data/workspace/create_dag_data.py
	./data/workspace/create_dag_data.py data/workspace/pacout.csv $@

data/workspace/pacs-joined.csv: data/workspace/pacs.csv data/workspace/pac-categories.csv data/workspace/pacref.csv data/workspace/pacs-spending.csv
	csvjoin -c 1 data/workspace/pacs.csv data/workspace/pacref.csv data/workspace/pac-categories.csv data/workspace/pacs-spending.csv > $@

public/pacs.csv: data/workspace/pacs-joined.csv
	csvcut -c 1,2,6,10,14,15,21,22,23,24,25,26,27,29,32,33,39,41,42,43,44,45,46,47,48,49 $< > $@

