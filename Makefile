GENERATED_FILES = \

LIBRARY_FILES = \
	public/lib/d3.v3.min.js \
	public/lib/underscore-min.js \
	public/inter-pac-donations.json

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

public/inter-pac-donations.json: data/workspace/pacout.csv data/workspace/create_dag_data.py
	./data/workspace/create_dag_data.py data/workspace/pacout.csv $@

