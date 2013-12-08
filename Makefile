GENERATED_FILES = \

LIBRARY_FILES = \
	public/lib/d3.v3.min.js \
	public/lib/underscore-min.js \
	public/lib/queue.v1.min.js \
	public/lib/jquery-1.10.2.min.js \
	public/lib/bootstrap-combobox.js \
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

public/lib/jquery-1.10.2.min.js:
	mkdir -p public/lib
	curl -o $@ http://code.jquery.com/jquery-1.10.2.min.js

build/bootstrap-combobox:
	mkdir -p build
	git clone https://github.com/danielfarrell/bootstrap-combobox.git $@

public/lib/bootstrap-combobox.js: build/bootstrap-combobox
	mkdir -p public/lib
	cp build/bootstrap-combobox/js/bootstrap-combobox.js $@

public/inter-pac-donations.json: data/workspace/pacout.csv data/workspace/create_dag_data.py
	./data/workspace/create_dag_data.py data/workspace/pacout.csv $@

public/pacs.csv: data/workspace/pacs.csv
	csvcut -v -c 1,2,6,10,14,15 $_ > $@

